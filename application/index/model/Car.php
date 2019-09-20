<?php
namespace app\index\model;
use think\Model;
class Car extends Model
{
    protected $pk = "car_id";
    //根据where条件获取单条记录
    public static function getCarByWhere($where){
       $data = self::where($where)->find();
       if($data) $data = $data->toArray();
       return $data;
    }
    //根据where条件获取多条记录
    public static function getMoreCarByWhere($where,$order=[]){
       $data = self::where($where)->order($order)->select();
       //echo self::getLastsql();
       if($data) $data = $data->toArray();
       return $data;
    }
    //计算商品总价
    public static function getTotal($user_id){
        $sql = "select sum(goods_price*buy_number) as total FROM shop_car where user_id=$user_id";
        $res = \Db::query($sql);
       // dump($res);die;
        if($res)   return $res[0]['total'];
    }
    //计算商品总价
    public static function getTotalMoney($user_id,$goods_id){
        $sql = "select sum(goods_price*buy_number) as total FROM shop_car where user_id=$user_id and goods_id in($goods_id)";
        $res = \Db::query($sql);
       // dump($res);die;
        if($res)   return $res[0]['total'];
    }
    
    
}
