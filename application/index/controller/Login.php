<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\History;
use app\index\model\Car;
use app\index\model\User;
class Login extends Controller
{
    /**
     * 显示登录的视图
     */
    public function login(){
        $refer = input('refer','');
        $this->assign('refer', $refer);
        return $this->fetch();
    }
    public function doLogin(){
        $name = input('name','');
        $pwd = input('pwd','');
        
        $reg='/^\w+@\w+\.com$/';
        if( preg_match($reg, $name) ){
            $field = 'user_email';
        }else{
            $field = 'user_tel';
        }
        $user = User::where([$field=>$name])->find();
        if(!$user){
            echo json_encode(['code'=>'00001','msg'=>'没有此用户']);die;
        }
        if( time()-$user['last_error_time']>3600){
            $user['error_num'] = 0;
            $user['last_error_time'] = 0;
            User::where('user_id',$user['user_id'])->update($user->toArray());
        }
        
        //密码相等
        if($user['user_pwd']== md5($pwd)){
           // echo $user['error_num'];die;
            if( $user['error_num']>=4  && time()-$user['last_error_time']<3600){
                
                 $min = 60-floor((time()-$user['last_error_time'])/60);
                 echo json_encode(['code'=>'00000','msg'=>'账户已被锁定还有'.$min.'分解锁']);die;
            }
            $user['error_num'] = 0;
            $user['last_error_time'] = 0;
            User::where('user_id',$user['user_id'])->update($user->toArray());
            session('userInfo',['user_id'=>$user['user_id'],'account'=>$name]);
            //同步浏览记录
            $this->asyncHistory();
            //同步购物车
            $this->asyncCar();
            echo json_encode(['code'=>'00000','msg'=>'登录成功']);die;
        }else{
            //密码错误
            if($user['error_num']>=4){
                 //User::where('user_id',$user['user_id'])->update($user->toArray());
                 echo json_encode(['code'=>'00002','msg'=>'账户已锁定']);die;
            }else{ 
                $user['error_num'] = $user['error_num']+1;
                $user['last_error_time'] = time();
                User::where('user_id',$user['user_id'])->update($user->toArray());
                $num = 5-$user['error_num'];
                echo json_encode(['code'=>'00002','msg'=>'密码错误！还有'.$num.'次机会']);die;
            }
        } 
    }
    
    
    /** 执行登录 */
    public function loginDo(){
        $account=input('post.account');
        $user_pwd=input('post.user_pwd');
        $remember=input('post.remember');//字符串 true  false

        //根据账号在数据库中进行查询
        //用或者关系   区分开
        if(substr_count($account,'@')>0){
            $where=[
                ['user_email','=',$account]
            ];
        }else{
            $where=[
                ['user_tel','=',$account]
            ];
        }
        $user_model=model('User');
        $userInfo=$user_model->where($where)->find();//这个账号的所有信息
        if(!empty($userInfo)){
            //提取出所需变量
            $time=time(); $error_num=$userInfo['error_num']; $last_error_time=$userInfo['last_error_time'];
            $updateWhere=[
                ['user_id','=',$userInfo['user_id']]
            ];
            if(md5($user_pwd)==$userInfo['user_pwd']){
                //echo '登录成功';
                //不允许登录的情况
                if($error_num>=3&&$time-$last_error_time<3600){
                    $mins=60-floor(($time-$last_error_time)/60);
                    fail( '账号已锁定，请于'.$mins.'分钟后登录');
                }
                //清零
                $res=$user_model->where($updateWhere)->update(['error_num'=>0,'last_error_time'=>null]);
                //判断是否记住账号密码10天
                if($remember=='true'){
                    $t=60*60*24*10;
                    cookie('rememberInfo',['account'=>$account,'user_pwd'=>$user_pwd],$t);
                }

                //把用户id  用户账号存入session中
                session("userInfo",['user_id'=>$userInfo['user_id'],'account'=>$account]);
                //同步浏览记录
                $this->asyncHistory();
                //同步购物车
                $this->asyncCar();
                successly('登录成功');
            }else{
                //密码错误
                if($time-$last_error_time>3600){
                    $res=$user_model->where($updateWhere)->update(['error_num'=>1,'last_error_time'=>$time]);
                    if($res){
                        fail('密码错误，您还有2次机会');
                    }
                }else{
                    if($error_num>=3){
                        //锁定
                        $mins=60-floor(($time-$last_error_time)/60);
                        fail('账号已锁定，请于'.$mins.'分钟后登录');
                    }else{
                        //累加
                        $error_num=$error_num+1;
                        $res=$user_model->where($updateWhere)->update(['error_num'=>$error_num,'last_error_time'=>$time]);
                        if($res){
                            fail('密码错误，您还有'.(3-$error_num).'次机会');
                        }
                    }

                }
            }
        }else{
            fail('账号错误');
        }
    }
    /**
     * 同步购物车
     * @return type
     */
    public function asyncCar(){ 
        $car = json_decode(cookie('car'),true)?:[];
       // dump($car);die;
        if( !$car)  return;
        foreach( $car as $key=>$v){
            $where = [
                'user_id'=>session('userInfo')['user_id'],
                'goods_id'=>$v['goods_id']
            ];
           $res = Car::getCarByWhere($where);
           if( $res ){
               //更新
               $res['buy_number'] = $res['buy_number']+$v['buy_number'];  
               $result = Car::where('car_id',$res['car_id'])->update($res);
           }else{
               //添加
               $arr = [
                   'user_id'=>session('userInfo')['user_id'],
                   'c_time'=>time()
               ];
               $data = array_merge($v,$arr); 
               $result = Car::create($data);
           } 
        }
        if( $result ){
            cookie('car', null);
        } 
    }
    
    
    /**
     * 同步浏览记录
     * @return type
     */
   public function asyncHistory(){
       $cookie = json_decode(cookie('history'),true);
       if( !$cookie ){
           return ;
       }
       foreach( $cookie as $key=>$val){
            $where = [
             'user_id'=>session('userInfo')['user_id'],
             'goods_id'=>$val['goods_id']
           ];

           $res = History::getHistory($where);
           if($res){
             //更新
             History::where('h_id',$res['h_id'])->update(['time'=>time() ]);
          }else{
             //add 添加
             $data=[
                 'user_id'=>session('userInfo')['user_id'],
                 'goods_id'=>$val['goods_id'],
                 'time'=>time()
             ];
             History::create($data);
         } 
       }
       cookie('history',null);
   }

   /** 注册的视图 */
    public function register(){
        return $this->fetch();
    }

    /** 发送邮件 */
    public function sendEmail(){
        //⑤控制器接收到邮箱
        $user_email=input('post.user_email');

        //控制器验证 邮箱是否为空 格式是否正确
        $reg='/^\w+@\w+\.com$/';
        if(empty($user_email)){
            fail('邮箱必填');
        }else if(!preg_match($reg,$user_email)){
            fail('邮箱格式有误');
        }

        $code=createCode();

        $subject='注册成功';
        $body="您的验证码是:".$code.',打死不能说。五分钟内输入有效';
        $res=sendEmail($user_email,$subject,$body);

        if($res){
            $emailInfo=[
                'account'=>$user_email,
                'code'=>$code,
                'send_time'=>time()
            ];
            cookie('emailInfo',$emailInfo);
            successly('发送成功');
        }else{
            fail('发送失败');
        }
    }

    /** 执行注册 */
    public function registerDo(){
        //接受数据
        $data=input('post.');

        //验证
        $validate=validate('User');
        $res=$validate->check($data);//返回值为bool true  false
        if(empty($res)){
            fail($validate->getError());
        }


        //入库
        $user_model=model('User');
        $data['user_pwd']=md5($data['user_pwd']);
        $res=$user_model->allowField(true)->save($data);//数组中和数据库中一致的字段入库 不一致的过滤
        if($res){
            successly('注册成功');
        }else{
            fail('注册失败');
        }
    }


    public function test(){
       print_r( cookie('rememberInfo'));
    }
    
    public function logout(){
        session('userInfo',null);
        $this->redirect('Index/index');
    }
}
