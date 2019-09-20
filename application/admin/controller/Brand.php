<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Brand extends Common
{

    /** 显示品牌添加的视图 */
    public function create(){

        return $this->fetch();
    }

    /** 品牌列表展示 */
    public function index(){
        //查询数据
        $brand_model=model('Brand');
        $p=1;
        $page_num=3;
        $brandInfo=$brand_model->page($p,$page_num)->select();

        //把页码做出来1   2   3
        $count=$brand_model->count();
        $obj=new \page\AjaxPage();
        $str=$obj->ajaxpager($p,$count,$page_num);

        //分配数据
        $this->assign('brandInfo',$brandInfo);
        $this->assign('str',$str);
        return $this->fetch();
    }

    /** 获取品牌数据 */
    public function getBrandInfo(){
        //接受页码  根据页码查询对应的数据
        $p=input('post.p',1,'intval');
        $brand_name=input('post.brand_name');
        $brand_url=input('post.brand_url');


        //处理条件
        $where=[];
        if(!empty($brand_name)){
            $where[]=['brand_name','like',"%{$brand_name}%"];
        }
        if(!empty($brand_url)){
            $where[]=['brand_url','like',"%{$brand_url}%"];
        }



        //重新获取数据
        $brand_model=model('Brand');
        $page_num=3;
        $brandInfo=$brand_model->page($p,$page_num)->where($where)->select();

        //重新获取页码
        $count=$brand_model->where($where)->count();
        $obj=new \page\AjaxPage();
        $str=$obj->ajaxpager($p,$count,$page_num);

        //把layout关闭
        $this->view->engine->layout(false);
        $this->assign('brandInfo',$brandInfo);
        $this->assign('str',$str);
        echo $this->fetch('table');
    }
    /** 品牌添加 */
    public function brandAdd(){
       //接受数据
        $data=input('post.');

        //验证
        $validate=validate('Brand');

        $res=$validate->check($data);//true  false
        if(empty($res)){
            fail($validate->getError());
        }

        //入库
        $brand_model=model('Brand');
        $res=$brand_model->save($data);
        if($res){
            successly('添加成功');
        }else{
            fail('添加失败');
        }

    }

    public function changeValue(){
        $value=input('post.value');
        $field=input('post.field');
        $brand_id=input('post.brand_id');

        //修改
        $where=[
            ['brand_id','=',$brand_id],
        ];
        $data=[$field=>$value];
        $brand_model=model('Brand');
        $res=$brand_model->where($where)->update($data);

        if($res){
            echo 'ok';
        }else{
            echo 'no';
        }
    }

}
