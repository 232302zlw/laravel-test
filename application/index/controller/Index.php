<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\Goods;
use app\index\model\Category;

class Index extends Common
{
    // 显示前台首页
    public function index()
    {
       // dump(session('userInfo'));

    	//获取1楼数据
        $cate_id = 1;
        $data = $this->getfloor($cate_id);
        
        
        //热门商品
        $hot_data = Goods::where(['is_hot'=>1,'is_up'=>1])->limit(15)->select();
      //  dump($hot_data);
        
        $this->assign('hot_data', $hot_data);
        $this->assign('first_cate', $data['first_cate']);
        $this->assign('second_cate', $data['second_cate']);
        $this->assign('goods', $data['goods']);
        return view();
        
    }
    
    public function getfloor( $cate_id ){
        $first_cate = Category::get($cate_id);
       //根据一级获取二级分类
        $second_cate = Category::where(['pid'=>$cate_id,'is_nav_show'=>1])->select();
        //echo Category::getLastsql();
        //dump($second_cate);
        //符合当前所有分类的商品   时间倒叙
        //查询当前大类下的所有子类
        $allcate = Category::all()->toArray();
        //获取分类1下的所有子类
        $allcate =  getCateInfo($allcate, $cate_id);
        //dump($allcate);
        //只取其cate_id 这一列数据
        $cateids = array_column( $allcate,'cate_id');
        //把1追加进去 组合成当前所有分类
        array_unshift( $cateids,$cate_id);
        //逗号拼接数组成 1,2,3,4样式
        $ids = implode( $cateids,',');
        //dump($ids);
        //根据获取的所有分类子类获取商品
        $goods = Goods::where('cate_id','in',$ids)->select();
       // dump($goods);  
        return ['first_cate'=>$first_cate,'second_cate'=>$second_cate,'goods'=>$goods];
    }
    
    /**
     * ajax 获取楼层数据
     * @return type
     */
    public function ajaxgetFloor(){
        //接收数据
        $cate_id = input('post.cate_id');
        $floor_num = input('post.floor_num')?input('post.floor_num')+1:1;
        
        $where[]=[
            ['pid','=',0],
            ['cate_id','>',$cate_id]
        ];
        $cate_id = Category::where($where)->value('cate_id');
       // echo Category::getLastsql();
        //print_r($data);
        $data = $this->getfloor( $cate_id );
        $this->view->engine->layout(false);
        $this->assign('floor_num', $floor_num);
        $this->assign('first_cate', $data['first_cate']);
        $this->assign('second_cate', $data['second_cate']);
        $this->assign('goods', $data['goods']);
        return view('ajaxfloor');
        
    }
    
    
}
