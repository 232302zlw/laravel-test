<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\User_address;
use app\index\model\Region;
use app\index\model\Collect;

class Member extends Common
{
    /**
     * 收货地址管理
     *
     * @return \think\Response
     */
    public function address()
    {
        $goods_id =  input('goods_id','');
        $this->view->engine->layout(false);
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
        //获取顶级地区
        $region = model('region');
        $top = $region->getTop();
        //dump($top);
        
        $this->assign('top', $top);
        $this->assign('goods_id', $goods_id);
        $this->assign('addresslist', $addresslist);
        return view();
    }
    
    public function getName( $region_id ){
        return model('region')->where('region_id',$region_id)->value('region_name');
    }
    /**
     * 设置默认收货地址
     * 1：更新接收的id 设为默认地址
     * 2：更新当前用户其他的收货地址 为0
     * 
     * 
     */
    public function changeSelet(){
        $address_id = input('post.address_id');
        
        if(!$address_id){
            return ;
        }
        // 启动事务
        User_address::startTrans();
        try {
            User_address::where(['user_id'=>session('userInfo')['user_id']])->update(['is_default'=>0]);
            User_address::where('address_id',$address_id)->update(['is_default'=>1]);
            // 提交事务
            User_address::commit();
       } catch (\Exception $e) {
       // 回滚事务
            User_address::rollback();
       }   
       echo 1; 
        
    }

    /**
     * 添加收藏
     * 1：判断是否登录 没有登录 返回错误提示
     * 2：接收值
     * 3：判断是否已经收藏过 收藏过返回提示语
     * 4：添加入库
     *
     * @return \think\Response
     */
    public function addcollect()
    {
        //1：判断是否登录 没有登录 返回错误提示
        if(!$this->checkLogin()){
            echo json_encode(['code'=>'00001','msg'=>'未登录']);die;
        }
        //2：接收值
        $goods_id = input('post.goods_id');
        //echo $goods_id;
        //dump($goods_id);
        //3：判断是否已经收藏过 收藏过返回提示语
        $where = [
            'goods_id'=>$goods_id,
            'user_id'=>session('userInfo')['user_id']
            ];
       $count = Collect::where($where)->count();
       if($count){
           echo json_encode(['code'=>'00002','msg'=>'已收藏']);die;
       }
       //4：添加入库
       $where['c_time'] = time();
       $res = Collect::create($where);
       if( $res){
           echo json_encode(['code'=>'00000','msg'=>'收藏成功']);die;
       }
       
        
    }

    /**
     * 我的收藏列表展示
     * @return \think\Response
     */
    public function collect()
    {
        $where['user_id'] = session('userInfo')['user_id'];
        
        $data =  \Db::table('shop_collect c')->field('collect_id,g.goods_id,goods_name,goods_price,goods_img')->join('goods g','c.goods_id=g.goods_id')->where($where)->order('c_time','desc')->paginate(config('pageSize'));
        
        $this->assign('data', $data);
        return view();
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
