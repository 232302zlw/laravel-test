<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\Goods as GoodsModel;
use app\index\model\History;
use think\captcha\Captcha;
use app\index\model\Comment;
use app\admin\model\Admin;
use app\index\model\Comment_replay;

class Goods extends Common
{
   /**
    * 展示商品详情
    * @return type
    */
    public function index()
   {
        $id = input('id',0,'intval');
       // echo $id;
        if( !$id ){
            $this->error('没有此记录','Index/index');
        }
        $where =['is_up'=>1];
        $data = GoodsModel::getGoodsByid($id,$where);  
        if( $data['goods_imgs']){
            $data['goods_imgs'] = explode('|', trim($data['goods_imgs'],'|'));
        }
        //dump($data);
        if(!$data){
            $this->error('没有此记录','Index/index');
        } 
        
        
        //获取评论信息
        $comment = Comment::where('goods_id',$id)->where('status',1)->order('add_time','desc')->select();
       
        //根据评论信息获取回复信息
        if( $comment ){
            foreach( $comment as $k=>$v){
               $replay =  Comment_replay::where('c_id',$v['c_id'])->find();
               //获取管理员名字
               $replay['admin_name'] =Admin::where('admin_id',$replay['re_user_id'])->value('admin_name');
               $comment[$k]['replay'] = $replay;
            }
        }
        
        //添加浏览记录
        $this->addhistory($id); 
       // dump($data);
        $this->assign('data', $data);
        $this->assign('comment', $comment);
        
        return view();
    }
    /**
     * 思路
     * 登录前
     *   前查询cookie 内有无浏览记录
     *   有：取出其值赋给$history， 合并新的浏览记录并存入cookie
     *   无：$history=[],合并新的浏览记录并存入cookie
     * 登录后
     *   db
     *   先根据条件user_id 和商品id查询此人之前有无浏览此记录
     *   有 更新时间
     *   无 添加一条
     * 开始未登录后来登录了
     *      同步登录前的浏览记录
     * @param type $id
     */
    public function addhistory($id){
        $user = $this->checkLogin();      
       // dump(session("userInfo"));
        if( !$user){
            //cookie
            $this->addCookiehistory($id);
        }else{ 
           //db
            $this->adddbhistory($id);
        }
    }
     
    /**
     * 登录前添加cookie存储浏览记录
     * @param type $id
     */
    private function addCookiehistory($id){
        
        //dump(cookie('history'));
        $history = json_decode(cookie('history'),true)?:[];
        //dump($history);
        $arr['goods_'.$id] = [
            'goods_id'=>$id,
            'time'=>time()
        ];
        //dump($arr);die;
        $array = array_merge($history, $arr);
      //dump($array);
        $array = json_encode($array);
        cookie('history',$array);
    }
    
    /**
     * 登录后浏览记录添加到数据库
     * @param type $id
     */
    private function adddbhistory($id){
        $where = [
            'user_id'=>session('userInfo')['user_id'],
            'goods_id'=>$id
        ];
        $data = History::getHistory($where);
       //  dump($data);
        if($data){
            //更新
            History::where('h_id',$data['h_id'])->update(['time'=>time() ]);
        }else{
            //add 添加
            $data=[
                'user_id'=>session('userInfo')['user_id'],
                'goods_id'=>$id,
                'time'=>time()
            ];
            History::create($data);
        }  
    }
    
    
    public function addComment(){
        $post = input('post.');
        
        //验证验证码是否正确
        $captcha = new Captcha();
        if( !$captcha->check($post['code']))
        {
            echo json_encode(['code'=>'00001','msg'=>'验证失败']);die;
        }
        //入库
       
        $array = [
            'user_id'=>session('userInfo')['user_id']??'',
            'user_name'=>session('userInfo')['account']??'匿名用户',
            'add_time'=>time()
        ];
        
        $data = array_merge($array,$post);
        
        $res = Comment::create($data);
        
        if($res){
            echo json_encode(['code'=>'00000','msg'=>'评论成功！请等待管理员审核']);die;
        }
        
        
    }
  
}
