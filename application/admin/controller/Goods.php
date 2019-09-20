<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Goods extends Common
{
    /** 商品添加的视图 */
    public function create(){
        //查询分类 作为下拉菜单的值
        $cateInfo=$this->getCateInfo();
        //查询品牌 作为下拉菜单值
        $brand_model=model('Brand');
        $brandInfo=$brand_model->select();

        $this->assign('cateInfo',$cateInfo);
        $this->assign('brandInfo',$brandInfo);
        return $this->fetch();
    }
    //文件上传
    public function upload(){
        $path=[];//用来存储 单图 多图的路径
       //单文件上传
        $file = request()->file('img');//接受单文件数据
        if(!empty($file)){
            $info = $file->move( './upload/goods_img');//移动
            if($info){
                $path['goods_img']= $info->getSaveName();//获取单文件上传路径 存入$path第一部分
                //20190522/0ee.jpg
            }else{
                fail($file->getError());
            }
        }


        //多文件上传
        $files = request()->file('imgs');//接受多文件信息   3

        $str="";
        //循环三张图片 一张一张进行上传
        if(!empty($files)){
            foreach($files as $v){
                $info = $v->move( "./upload/goods_imgs");//三张图片中的每一张图片 进行移动
                if($info){
                    $str.=$info->getSaveName().'|';//获取每一张图片的路径  把三张图片路径拼接成一个字符串
                }else{
                    fail($file->getError());
                }
            }

            $path['goods_imgs']=$str;//把三张图片的路径$str  存入$path第二部分
        }
        echo json_encode(['msg'=>'上传成功','code'=>1,'path'=>$path]);
    }

    /** 商品添加 */
    public function add(){
        $data=input('post.');
        //验证

        //入库
        $goods_model=model('Goods');
        $res=$goods_model->save($data);
        if($res){
            successly('添加成功');
        }else{
            fail('添加失败');
        }
    }

    //商品列表展示
    public function index(){
        //获取第一页数据  需要商品表、分类表、品牌表三表联查
        $goods_model=model('Goods');
        $goodsInfo=$goods_model
            ->field("g.*,brand_name,cate_name")
            ->alias('g')
            ->join("brand b","g.brand_id=b.brand_id")
            ->join("category c","g.cate_id=c.cate_id")
            ->page(1,2)
            ->select();
        //循环处理 商品中的商品相册
        foreach($goodsInfo as $k=>$v){
            $str=rtrim($v['goods_imgs'],'|');//去除商品相册的右侧的|
           $goodsInfo[$k]['goods_imgs']=explode('|',$str);//根据|切割成一维数组
        }

        //获取页码
        $count=$goods_model
            ->alias('g')
            ->join("brand b","g.brand_id=b.brand_id")
            ->join("category c","g.cate_id=c.cate_id")
            ->count();
        $obj=new \page\AjaxPage();//实例化分页类
        $str=$obj->ajaxpager(1,$count,2);//获取页码

        //查询所有品牌 作为下拉菜单的值--条件之一
        $brandInfo=model('Brand')->select();

        $this->assign('brandInfo',$brandInfo);
        $this->assign('goodsInfo',$goodsInfo);
        $this->assign('str',$str);
        return $this->fetch();
    }

    /**获取商品数据 */
    public function getGoodsInfo(){
        //接受页码
        //$p=input('post.p',1);
        $p=input('post.p');
        $goods_name=input('post.goods_name');
        $price1=input('post.price1',0,'intval');
        $price2=input('post.price2',0,'intval');
        $brand_id=input('post.brand_id');


        //处理条件
        $where=[];
        if(!empty($goods_name)){
            $where[]=['goods_name','like',"%$goods_name%"];
        }


        if(!empty($price1)&&!empty($price2)){
            $where[]=['goods_price','>=',$price1];
            $where[]=['goods_price','<=',$price2];
        }
        if(!empty($price1)&&empty($price2)){
            $where[]=['goods_price','>=',$price1];
        }
        if(empty($price1)&&!empty($price2)){
            $where[]=['goods_price','<=',$price2];
        }
        if(!empty($brand_id)){
            $where[]=['b.brand_id','=',$brand_id];
        }


        //根据页码获取对应的数据 注意改变$p
        $goods_model=model('Goods');
        $goodsInfo=$goods_model
            ->field("g.*,brand_name,cate_name")
            ->alias('g')
            ->join("brand b","g.brand_id=b.brand_id")
            ->join("category c","g.cate_id=c.cate_id")
            ->where($where)
            ->page($p,2)
            ->select();
        foreach($goodsInfo as $k=>$v){
            $str=rtrim($v['goods_imgs'],'|');
            $goodsInfo[$k]['goods_imgs']=explode('|',$str);
        }

        //重新获取页码
        $count=$goods_model
            ->alias('g')
            ->join("brand b","g.brand_id=b.brand_id")
            ->join("category c","g.cate_id=c.cate_id")
            ->where($where)
            ->count();
        $obj=new \page\AjaxPage();
        $str=$obj->ajaxpager($p,$count,2);

        //把新数据 新页码 显示到一个新的视图页面中
        $this->assign('goodsInfo',$goodsInfo);
        $this->assign('str',$str);

        $this->view->engine->layout(false);//临时关闭layout 不要头部和左侧
        echo $this->fetch('goods');//将新的表格返回给ajax  替换掉旧表格数据

    }

    /** 修改 */
    public function edit(){
        //接受商品id  根据商品id查询一条要修改的数据 作为默认值
        $goods_id=input('get.goods_id');
        $goods_model=model('Goods');
        $where=[
            ['goods_id','=',$goods_id]
        ];
        $goodsInfo=$goods_model->where($where)->find();
        $str=rtrim($goodsInfo['goods_imgs'],'|');
        $goodsInfo['g_imgs']=explode('|',$str);



        //查询所有分类 作为下拉菜单的值
        $cateInfo=$this->getCateInfo();

        //查询所有品牌 作为下拉菜单的值
        $brandInfo=model('Brand')->select();

        $this->assign('cateInfo',$cateInfo);
        $this->assign('brandInfo',$brandInfo);
        $this->assign('goodsInfo',$goodsInfo);
        return $this->fetch();

    }

    /** 执行修改 */
    public function update(){
        $data=input('post.');
        $goods_model=model('Goods');
        $where=[
            ['goods_id','=',$data['goods_id']]
        ];
        $res=$goods_model->where($where)->update($data);
        if($res===false){
            fail('修改失败');
        }else{
            successly('修改成功');
        }
    }
}
