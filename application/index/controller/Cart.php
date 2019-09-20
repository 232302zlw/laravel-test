<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\Goods;
use app\index\model\Car;
class Cart extends Common
{
    /**
     * 添加购物车
     * 登录前
     *  cookie
     *     //根据商品id查询有无此商品没有则提示没有此商品或者已下架
     *     //判断库存  小于购买数量则提示库存不足
     *     //先得到cookie('car')的之
     *     //判断cookie内是否已有此商品的记录 有则更新无则添加
     * 
     * 登录后
     *    db
     *     //根据商品id查询有无此商品没有则提示没有此商品或者已下架
     *     //判断库存  小于购买数量则提示库存不足
     *     //根据用户id和商品id查询购物车表
     *     //判断是否已有此商品的记录 有则更新无则添加
     * 开始未登录后来登录了
     *    同步购物车记录
     * @return \think\Response
     */
    public function addcar()
    {
        $buy_number = input('post.buy_number',0,'intval');
        $goods_id = input('post.goods_id');

        if(!$this->checkLogin()){
            //cookie
            $this->addCookieCar($buy_number,$goods_id);  
        }else{
            //db
            $this->adddbCar($buy_number,$goods_id);  
        }  
    }

    /**
     * 登录前购物车记录存入cookie
     *   //根据商品id查询有无此商品没有则提示没有此商品或者已下架
     *     //判断库存  小于购买数量则提示库存不足
     *     //先得到cookie('car')的之
     *     //判断cookie内是否已有此商品的记录 有则更新无则添加
     * @return \think\Response
     */
    public function addCookieCar($buy_number,$goods_id)
    {
        //判断商品是否存在
        $where = ['is_up'=>1];
        $goods = Goods::getGoodsByid($goods_id,$where);
        if(!$goods){
            echo json_encode(['code'=>'00001','msg'=>'商品已下架或发生未知错误']);die;
        }
        //判断库存
        if($goods['goods_number']<$buy_number){
            echo json_encode(['code'=>'00001','msg'=>'库存不足']);die;
        }
        $car = json_decode(cookie('car'),true)?:[];
       // dump($car);
        //如果购物车内已有此商品则更新数量
        if(array_key_exists('car_'.$goods_id, $car)){
            //更新数量
            $car['car_'.$goods_id]['buy_number'] = $car['car_'.$goods_id]['buy_number']+$buy_number;
        }else{
            //购物车内没有则新增一条
            //dump($goods);
            $array['car_'.$goods_id] = [
                'goods_id'=>$goods_id,
                'goods_img'=>$goods['goods_img'],
                'goods_name'=>$goods['goods_name'],
                'goods_price'=>$goods['goods_price'],
                'buy_number'=>$buy_number,
                'c_time'=>time(),
            ];
           // dump($array);
            $car = array_merge($car,$array);
        }
        
        $data = json_encode($car);
        cookie('car',$data);
        echo json_encode(['code'=>'00000','msg'=>'success']);die;
    }

    /**
     * 登录后购物车记录存入数据库
     *     //根据商品id查询有无此商品没有则提示没有此商品或者已下架
     *     //判断库存  小于购买数量则提示库存不足
     *     //根据用户id和商品id查询购物车表
     *     //判断是否已有此商品的记录 有则更新无则添加
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function adddbCar($buy_number,$goods_id)
    {
        //判断商品是否存在
        $where = ['is_up'=>1];
        $goods = Goods::getGoodsByid($goods_id,$where);
        if(!$goods){
            echo json_encode(['code'=>'00001','msg'=>'商品已下架或发生未知错误']);die;
        } 
        //判断库存
        if($goods['goods_number']<$buy_number){
            echo json_encode(['code'=>'00001','msg'=>'库存不足']);die;
        }
        //判断购物车内是否已有此商品
        $where=[
           'user_id'=>session('userInfo')['user_id'],
           'goods_id'=>$goods_id,
        ];
        $car = Car::getCarByWhere($where);
        if( $car ){
            //更新
            $car['buy_number'] = $car['buy_number']+$buy_number;   
            $res = Car::where('car_id',$car['car_id'])->update($car);  
        }else{
            //添加
            $array = [   
                'user_id' => session('userInfo')['user_id'],
                'goods_id' => $goods_id,
                'goods_name' => $goods['goods_name'],
                'goods_price' => $goods['goods_price'],
                'goods_img' => $goods['goods_img'],
                'buy_number' => $buy_number,
                'c_time' => time(),

            ];
            $res = Car::create($array); 
        }
        if($res){
           echo json_encode(['code'=>'00000','msg'=>'success']);die;
        }
    }

    /**
     * 思路
     * 登录前
     *    cookie取值
     * 登录后
     *    db取值
     * @return unknown
     */
    public function lists()
    {
        $goods_id = input('goods_id','');
        $goods_id = explode( ',',$goods_id);
        //dump($goods_id);
        if(!$this->checkLogin()){
            //cookie
           $data = json_decode(cookie('car'),true)?:[];
           array_multisort(array_column($data, 'c_time'), SORT_DESC, $data);//多维数组排序
        }else{
            //db
            $where = [
                'user_id'=>session('userInfo')['user_id']
            ];
           $data = Car::getMoreCarByWhere($where,['c_time'=>'desc']) ;
        }
        //计算总价格
        $total = 0;
//        foreach( $data as $key=>$val){
//                $total+=$val['goods_price']*$val['buy_number'];
//        }
        //dump($data);
        $this->assign('data', $data);
        $this->assign('goods_id', $goods_id);
        $this->assign('total', number_format($total, 2, '.', ''));
        return view();
    }
    /**
     * ajax 更改购买数量和计算总价钱
     * @return \think\Response
     */
    public function changeNumgettotalprice()
    {
        $goods_id = input('post.goods_id');
        $buy_number = input('post.buy_number');
        $goods_id_select = input('post.goods_id_select');
        $total = 0;
        //判断库存 如果库存不足则购买数量自动更改为最大库存
        $where = ['is_up'=>1];
        $goods = Goods::getGoodsByid($goods_id,$where);
        if($goods['goods_number']<$buy_number){
            $buy_number = $goods['goods_number'];
        }
        if( !$this->checkLogin()){
            //cookie 更改数量
            $cookieCar = json_decode(cookie('car'),true)??[];
            $cookieCar['car_'.$goods_id]['buy_number'] = $buy_number;
           //计算商品总价
//            foreach( $cookieCar as $key=>$val){
//                $total+=$val['goods_price']*$val['buy_number'];
//            }
            cookie('car', json_encode($cookieCar));
            $total = $this->getCookiemoney($goods_id_select);
        }else{
            //db 更改数量
            $where = [
                'user_id'=>session('userInfo')['user_id'],
                'goods_id'=>$goods_id
            ];
            $data = Car::getCarByWhere($where);        
            $data['buy_number'] = $buy_number;
            $res = Car::where('car_id',$data['car_id'])->update($data);
            //$total =  Car::getTotal(session('userInfo')['user_id']); 
            $total = $this->getDBmoney($goods_id_select);
        }
        
        echo json_encode(['buy_number'=>$buy_number,'total'=>number_format($total, 2, '.', '')]);die;
    }

    /**
     * ajax获取总价钱
     * @return \think\Response
     */
    public function getMoney()
    {
        $goods_id = input('post.goods_id');
        if(!$goods_id){
            return number_format(0, 2, '.', '');
        }
        if($this->checkLogin()){
            //db
            $money = $this->getDBmoney($goods_id);
        }else{
            //cookie
            $money = $this->getCookiemoney($goods_id);
        }
        return number_format($money, 2, '.', '');
    }

    /**
     * 从数据库内计算总价钱
     * @return \think\Response
     */
    public function getDBmoney($goods_id)
    {
        $user_id = session('userInfo')['user_id'];
        $goods_id = implode(',', $goods_id);
        
        $res = Car::getTotalMoney($user_id, $goods_id);
        return $res??0;
        
    }
    /**
     * cookie内计算总价钱
     * @return \think\Response
     */
    public function getCookiemoney($goods_id)
    {
       $car = json_decode(cookie('car'),true)?:[];
       if( !$car || !$goods_id){
         return number_format(0, 2, '.', '');
       }
       $total = 0;
       
       foreach($goods_id as $v ){ 
           $total+=$car['car_'.$v]['goods_price']*intval($car['car_'.$v]['buy_number']);
       }
       return   $total;
    }
    
    /**
     * 删除功能
     * 登录前删除cookie 
     * 登录后删除db
     * @return type
     */
    public function delete(){
        
        $goods_id = input('post.goods_id');
        if( !$goods_id ){
            return;
        }
        if( !$this->checkLogin()){
           $this->deleteCookieCar($goods_id);
        }else{
           $this->deleteDBCar($goods_id);
        }
       
    }
    /**
     * 删除cookie内的购买记录
     * @param type $goods_id
     */
    public function deleteCookieCar( $goods_id){
        $car = json_decode(cookie('car'),true)?:[];
      // dump(is_array($goods_id));die;
        if( is_array($goods_id)){
            //批删
            foreach( $goods_id as $v ){
                unset($car['car_'.$v]);
            } 
        }else{
           //单删
            unset($car['car_'.$goods_id]);
        }
       // dump($car);die;
        cookie('car', json_encode($car));
        echo json_encode(['code'=>'00000','msg'=>'删除成功']);die;
    } 
    /**
     * 删除数据库记录
     * @param type $goods_id
     */
    public function deleteDBCar( $goods_id ){
        
        $where[]=[
            ['user_id','=',session('userInfo')['user_id']],
            ['goods_id','in',$goods_id]
        ];
        $res = Car::where($where)->delete();
        if( $res ){
            echo json_encode(['code'=>'00000','msg'=>'删除成功']);die;
        }  
    }
   
    public function checkout(){
        return $this->checkLogin();
    }
    
    
    
}
