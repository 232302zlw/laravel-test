<?php
namespace app\index\model;
use think\Model;

class Goods extends Model
{
    protected $pk="goods_id";
    
    public static function getGoodsByCateid($where,$query=[],$order=''){
        $pagesize = config('app.pageSize');
       // dump($query);
        $data= self::where($where)->order($order)->paginate($pagesize,false,['query'=>$query]);
        //echo self::getLastsql();
        return $data;
    }
    //根据id获取商品信息
    public static function getGoodsByid($id,$where=[],$field='*'){    
        return self::field($field)->where($where)->get($id);
    }
 
    //根据id获取多条商品信息 where in
    public function getMulGoods($ids,$field='*'){
        $data = self::field($field)->order('goods_id', $ids)->all($ids);
       // echo self::getLastsql();
        return $data;
    }
    
    
}
