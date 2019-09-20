<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\User_address;
use app\index\model\Order_info;
use app\index\model\Order_goods;
use app\index\model\Region;
use app\index\model\Car;
use think\facade\Env;
use Log;

class Order extends Common
{
    public function __construct() {
        parent::__construct();
        if(!$this->checkLogin()){
            $this->redirect('Login/login');
        }
    }
    /**
     * 确认订单
     *
     * @return \think\Response
     */
    public function index()
    {
        //判断有无收货地址 
        $address = User_address::where(['user_id'=>session('userInfo')['user_id']])->count();
        if( !$address ){
           // echo 123;
            $this->redirect('Order/address');
        }
        
        $goods_id = input('goods_id');
        if(!$goods_id){
            $this->error('请选择商品','Index/index');
        }
        $where[] = [
            ['user_id','=', session('userInfo')['user_id']],
            ['goods_id','in',$goods_id]
        ];
        $goods = Car::where($where)->select();
        $total = 0;
        foreach( $goods as $key=>$val){
            $total +=$val['buy_number'] * $val['goods_price'];
        } 
        
        //收货地址列表
        $addresslist = User_address::where(['user_id'=>session('userInfo')['user_id']])->select();
        if( $addresslist ){
            foreach( $addresslist as $key=>$v){
                //dump($val);
                $addresslist[$key]['province'] = $this->getName($v['province']);
                $addresslist[$key]['city'] = $this->getName($v['city']);
                $addresslist[$key]['district'] = $this->getName($v['district']);
            }
        }
        //dump($addresslist);
        $this->assign('goods', $goods);
        $this->assign('goods_id', $goods_id);
        $this->assign('addresslist', $addresslist);
        $this->assign('total', number_format($total,2,'.',''));
        return view(); 
    }
    public function getName( $region_id ){
        return model('region')->where('region_id',$region_id)->value('region_name');
    }
    /**
     * 添加收货地址
     *
     * @return \think\Response
     */
    public function address()
    {
        //获取顶级地区
        $region = model('region');
        $top = $region->getTop();
        //dump($top);
        
        $this->assign('top', $top);
        return view();
    }
    /**
     * 获取子集地址
     */
    public function getSonAddress(){
        $parent_id = input('post.parent_id');
        
        if(!$parent_id){
            return;
        }
        $where = ['parent_id'=>$parent_id];
        $data = model('region')->getSon($where);
        echo json_encode(['code'=>'00000','data'=>$data]);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function saveaddress()
    {
        $post = input('post.');
        $goods_id = input('goods_id','');
        
        $post['user_id'] = session('userInfo')['user_id'];
        $res = User_address::create($post);
        if($res){
            $this->redirect('Order/index',['goods_id'=>$goods_id]);
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function confirmOrder()
    {
        $post = input('post.');
        
        // 启动事务
        User_address::startTrans();
        try {
        
            // dump($post);
             //根据地址id查询数据
             $address = User_address::find($post['address']);
            // dump($address);
             $shipp_data = ['1'=>'申通快递','2'=>'城际快递','3'=>'邮局平邮'];
             $pay_data = ['1'=>'余额支付','2'=>'银行亏款/转账','3'=>'货到付款','4'=>'支付宝'];

             //商品信息
             $where[] = [
                 ['user_id','=', session('userInfo')['user_id']],
                 ['goods_id','in',$post['goods_id']]
             ];
             $goods = Car::where($where)->select();
             $total = 0;
             foreach( $goods as $key=>$val){
                 $total +=$val['buy_number'] * $val['goods_price'];
             } 
            // dump($goods);
             $array = [
                 'user_id' => session('userInfo')['user_id'],
                 'order_sn' => createOrderSn(),
                 'postscript' => $post['postscript'],
                 'shipping_id' => $post['shipping_id'],
                 'shipping_name' => $shipp_data[$post['shipping_id']],
                 'pay_id' => $post['pay_id'],
                 'pay_name' => $pay_data[$post['pay_id']],
                 'goods_amount'=>$total,
                 'order_amount'=>$total,
                 'add_time'=>time()  
             ];
             $order_info = array_merge($array,$address->toArray());
     //        dump($order_info);die;
             $Order_info = new Order_info;
             $order_id =$Order_info->strict(false)->insertGetId($order_info);
            // dump($order_id);die;
             if(!$order_id){
                 throw new \Exception('添加订单数据失败！');
             }
             //订单商品表入库
             foreach( $goods as $key=>$val ){
                 $goods[$key]['order_id'] = $order_id;
             }
             $order_goods = new Order_goods;
             $res =$order_goods->strict(false)->insertAll($goods->toArray());
             if(!$res){
                 throw new \Exception('添加订单商品数据失败！');
             }
             
             //删除购物车商品信息
             $carres = Car::where($where)->delete();
             if(!$carres){
                 throw new \Exception('删除购物车数据失败！');
             }
             // 提交事务
            User_address::commit();
        } catch (\Exception $e) {
        // 回滚事务
            User_address::rollback();
        }
        
        if($res){
                 $this->redirect('Order/orderpay',['id'=>$order_id]);
         }
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function orderpay($id)
    {
        $data = Order_info::field('order_id,order_sn,shipping_name,pay_name,order_amount')->find($id);
        //dump($data);
        $this->assign('data', $data);
        return view();
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function pay($id)
    {
        //根据订单id 查询订单号和订单金额
        $data = Order_info::field('order_id,order_sn,order_amount')->find($id);
        
        $config = config('alipay.');
       
        require_once Env::get('extend_path').'alipay/pagepay/service/AlipayTradeService.php';
        require_once Env::get('extend_path').'alipay/pagepay/buildermodel/AlipayTradePagePayContentBuilder.php';

        //商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no = trim($data['order_sn']);

        //订单名称，必填
        $subject = '1901商城';

        //付款金额，必填
        $total_amount = trim($data['order_amount']);

        //商品描述，可空
        $body = '';

	//构造参数
	$payRequestBuilder = new \AlipayTradePagePayContentBuilder();
	$payRequestBuilder->setBody($body);
	$payRequestBuilder->setSubject($subject);
	$payRequestBuilder->setTotalAmount($total_amount);
	$payRequestBuilder->setOutTradeNo($out_trade_no);

	$aop = new \AlipayTradeService($config);

	/**
	 * pagePay 电脑网站支付请求
	 * @param $builder 业务参数，使用buildmodel中的对象生成。
	 * @param $return_url 同步跳转地址，公网可以访问
	 * @param $notify_url 异步通知地址，公网可以访问
	 * @return $response 支付宝返回的信息
 	*/
	$response = $aop->pagePay($payRequestBuilder,config('alipay.return_url'),config('alipay.notify_url'));

	//输出表单
	var_dump($response);
        
        
        
    }

    /**
     * 支付宝同步跳转
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function returnpay()
    {

        $config = config('alipay.');
        require_once Env::get('extend_path').'alipay/pagepay/service/AlipayTradeService.php';


        $arr=$_GET;
        //dump($arr);
        $alipaySevice = new \AlipayTradeService($config); 
        $result = $alipaySevice->check($arr);
      
        /* 实际验证过程建议商户添加以下校验。
        1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
        2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
        3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
        4、验证app_id是否为该商户本身。
        */

        if($result) {//验证成功
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                //请在这里加上商户的业务逻辑程序代码

                //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
            //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

                //商户订单号
                $where['order_sn'] = htmlspecialchars($_GET['out_trade_no']);
                $where['order_amount'] = htmlspecialchars($_GET['total_amount']);
                 //支付宝交易号
                $trade_no = htmlspecialchars($_GET['trade_no']);
                //验证1、2
                $count =  Order_info::where($where)->count();
//                dump($count);
                if(!$count){
                    echo "根据订单号:".$where['order_sn']."和订单金额".$where['order_amount']."没有查询到此订单，验证失败！支付宝交易号：".$trade_no;die;
                }
                //验证3
                if( config('alipay.seller_id') !=htmlspecialchars($_GET['seller_id'])){
                    echo "商户id不匹配，验证失败！支付宝交易号：".$trade_no;die;
                }

               //验证4
                if( config('alipay.app_id') !=htmlspecialchars($_GET['app_id'])){
                    echo "app_id不匹配，验证失败！支付宝交易号：".$trade_no;die;
                }

                $this->redirect('Order/myorder');

                //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——

                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }
        else {
            //验证失败
            echo "验证失败";die;
        }
    }

    
    public function myorder(){
        
        $order = Order_info::field('order_sn,order_status,add_time,order_amount')->where('user_id',session('userInfo')['user_id'])->order('add_time','desc')->select();
       // dump($order);die;
        $this->assign('order', $order);
        return view();
    }
    
    
    
}
