<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\Category;
use app\index\model\Goods;
use app\index\model\Brand;
use app\index\model\History;

class Lists extends Common
{
    /**
     * 商品列表
     * @return \think\Response
     */
    public function index()
    {  
        $brand_id = input('brand_id')??'';
        $price = input('price')??'';
        $field = input('field')?:0;
        $order = input('orderby')?:0;
      // echo $field;die;
        $where = [];
        if($brand_id){
            $where[] = ['brand_id','=',$brand_id];
        }
        if( $price ){
           $arr =  explode( '-',$price);
           $start = intval($arr[0]);
           $end = isset($arr[1])?intval($arr[1]):'';
           $where[] = ['goods_price','>=',$start];
           if( $end ) $where[] = ['goods_price','<=',$end];
        }
        $orderby = [];
        if( $field==3){
            $where[] = ['is_new','=',1];
        }else{
     
            $fieldarr = ['goods_id','goods_number','goods_price'];
            $orderarr = ['asc','desc'];

            $orderby[$fieldarr[$field]] = $orderarr[$order];
        }
        //接收顶级分类id
        $cid = input('cid',0,'intval');
        //获取分类子类cate_id
        $ids = $this->getSoncate($cid);
        //获取品牌
        $brand = $this->getBrand($ids);
        $maxmoney = Goods::where('cate_id','in',$ids)->field('max(goods_price) as price')->find();
        //获取价格区间
        $pricestr = $this->getPriceStr($maxmoney['price']);  
        //获取默认商品 
        $where[] =[
            ['cate_id','in',$ids],
            ['is_up','=',1]
        ];
       $query = ['brand_id'=>$brand_id,'price'=>$price,'field'=>$field,'orderby'=>$order];
      // print_r($query);
       $goods = Goods::getGoodsByCateid($where,$query,$orderby);
       //浏览历史记录
       $history = $this->getHistory();
      // dump($history);
       // echo Goods::getLastsql();
        $this->assign('cid', $cid);
        $this->assign('query', $query);
        $this->assign('history', $history);
        $this->assign('goods', $goods);
        $this->assign('pricestr', $pricestr);
        $this->assign('brand', $brand);
        return view('lists/lists');
    }
    /**
     * 获取浏览历史记录
     * @return type
     */
    public function getHistory() {
        
        if( !$this->checkLogin()){ 
           return $this->getcookieHistory();   
        }else{
            return $this->getdbHistory();
        }
    }
    /**
     * 登录前从cookie内获取
     * @return type
     */
    public function getcookieHistory(){
        
        $history = json_decode(cookie('history'),true)?:[];
//        dump($history);
        if( $history ){
            //多维数组排序
            array_multisort(array_column($history,'time'),SORT_DESC,$history);
//            dump($history);die;
            $ids = array_column($history, 'goods_id');
            $Goods = model('goods');
            $data = $Goods->getMulGoods($ids,'goods_img,goods_price,goods_name,goods_id');
            return $data;
        }  
    }
    /**
     * 登录后从db内获取
     * @return type
     */
    public function getdbHistory(){
       
        $where = [
            'user_id'=>session('userInfo')['user_id'],
        ];
        $res = History::where($where)->order('time','desc')->limit(5)->select()->toArray();
      // echo History::getLastsql();
       // dump($res);
        if(!$res){
           return; 
        }
        $ids = array_column($res, 'goods_id');
      // dump($ids);
       
        $Goods = model('goods');
        $data = $Goods->getMulGoods($ids,'goods_img,goods_price,goods_name,goods_id');
        //dump($data);
        return $data;
    }
    

    /**
     * 根据顶级分类id获取所有子类cate_id
     * @param type $cid
     * @return type
     */
    private function getSoncate($cid) {
        //获取所有分类
        $allcate = Category::all()->toArray();
        //获取分类1下的所有子类
        $allcate =  getCateInfo($allcate, $cid);
        //只取其cate_id 这一列数据
        $cateids = array_column( $allcate,'cate_id');
        
        //把1追加进去 组合成当前所有分类
        array_unshift( $cateids,$cid);
        //dump($cateids);die;
        //逗号拼接数组成 1,2,3,4样式
        $ids = implode( $cateids,',');
        return $ids;
    }
    /**
     * 获取商品品牌
     * @param type $cid
     * @return type
     */
    private function getBrand($ids){

        //根据获取的所有分类子类获取品牌id
        $brandids = Goods::where('cate_id','in',$ids)->column('brand_id');
        $brandids = array_unique($brandids);
        
        $brand = Brand::where('brand_id','in',$brandids)->where('is_show',1)->select();
        //dump($brand);
        return $brand;
    }
    /**
     * 获取价格区间
     * @param type $maxmoeny
     * @return string
     */
    private function getPriceStr($maxmoeny) {
       $avg = $maxmoeny/6;
        $pricestr = [];
        for( $i=0;$i<6 ;$i++){
            $start = $i*$avg;
            $end = ($i+1) * $avg;
            $pricestr[] = number_format($start,2 ,'.', '').'-'.number_format($end,2, '.', '');
        }
        $pricestr[] =$maxmoeny.'以上';
        
        return $pricestr;
        
    }
    
    
    
}
