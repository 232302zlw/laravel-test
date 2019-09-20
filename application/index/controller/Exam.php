<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\Goods;
use app\index\model\Car;

class Exam extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
       $goods =  Goods::all();
       $this->view->engine->layout(false);
       $this->assign('goods', $goods);
       return view();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function addCar()
    {
        $goods_id = input('post.goods_id');
        $buy_number = 1;
        
        //根据商品id 查询有无此商品
        $where = ['is_up'=>1,'goods_id'=>$goods_id];
        $goods = Goods::where($where)->find();
        if( !$goods ){
            echo json_encode(['code'=>'00001','msg'=>'商品已下架或者发生未知错误']) ;die;
        }
        
        if( !$this->checkLogin() ){
            echo json_encode(['code'=>'00002','msg'=>'未登录']) ;die;
        }
        if($goods['goods_number'] < $buy_number){
           echo json_encode(['code'=>'00001','msg'=>'库存不足']) ;die;
        }
        
        $where = [
            'user_id' => session('userInfo')['user_id'],
            'goods_id' => $goods_id,
        ];
        $car = Car::where($where)->find();
       
        if( $car ){
            //update
            $car['buy_number'] = $car['buy_number']+$buy_number;
            $res = Car::where($where)->update($car->toArray());
           
        }else{
               
            //添加购物车
            $array =[
                'user_id' => session('userInfo')['user_id'],
                'goods_id' => $goods_id,
                'goods_name' => $goods['goods_name'],
                'goods_price' => $goods['goods_price'],
                'goods_img' => $goods['goods_img'],
                'buy_number' => $buy_number,
                'c_time' => time()
                ];

            $res = Car::create($array);
        }
        if($res){
            echo json_encode(['code'=>'00000','msg'=>'成功']) ;die;
        }

        
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function checkLogin()
    {
        if(!session('userInfo')){
            return false;
        }
        return true;
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function carlist()
    {
        if(!$this->checkLogin()){
            $this->redirect('Login/login');
        }
        $car = Car::where(['user_id'=>session('userInfo')['user_id']])->order('c_time','desc')->select();
//        echo Car::getLastsql();
         $this->view->engine->layout(false);
        $this->assign('car', $car);
        return view();
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
