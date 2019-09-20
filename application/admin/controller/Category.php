<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Category extends Common
{
    /** 分类列表 */
    public function index(){
        $info=$this->getCateInfo();
        $this->assign('info',$info);
        return $this->fetch();

    }

    /** 分类添加的视图 */
    public function create(){
        $info=$this->getCateInfo();
        $this->assign('info',$info);
        return $this->fetch();
    }

    /** 添加分类 */
    public function add(){
        $data=input('post.');//接受数据
        //验证

        //入库
        $cate_model=model('Category');
        $res=$cate_model->save($data);
        if($res){
            successly('添加成功');
        }else{
            fail('添加失败');
        }
    }

    /** 即点即改 */
    public function changeValue(){
        $field=input('post.field');
        $cate_id=input('post.cate_id');
        $value=input('post.value');

        $cate_model=model('Category');
        $where=[
            ['cate_id','=',$cate_id]
        ];
        $info=[
            $field=>$value
        ];
        $res=$cate_model->where($where)->update($info);//0  1   false
        if($res===false){
            fail('操作失败');
        }else{
            successly('');
        }

    }

    /** 修改 */
    public function edit(){
        $cate_id=input('get.cate_id');

        //根据分类id  查询要修改的一条数据
        $cate_model=model('Category');
        $where=[
            ['cate_id','=',$cate_id]
        ];
        $cateInfo=$cate_model->where($where)->find();

        //查询所有分类信息 作为下拉菜单的值
        $info=$this->getCateInfo();
        $this->assign('info',$info);
        $this->assign('cateInfo',$cateInfo);
        return $this->fetch();

    }

    /** 执行修改 */
    public function update(){
        //接受数据
        $data=input('post.');

        //验证


        //执行修改
        $where=[
            ['cate_id','=',$data['cate_id']]
        ];
        $res=model('Category')->where($where)->update($data);
        if($res){
            successly('修改成功');
        }else{
            fail('修改失败');
        }

    }

    /** 删除 */
    public function delete(){
        $cate_id=input('get.cate_id');//33


        $where=[
            ['cate_id','=',$cate_id]
        ];
        $cate_model=model('Category');
        //查询当前分类下是否有子类
        $delWhere=[
            ['pid','=',$cate_id]
        ];
        $count=$cate_model->where($delWhere)->count();
        if($count>0){
            $this->error('此分类下有子类不能删除',url('index'));exit;
        }

        //查询此分类下是否有商品  只需要在商品表中根据分类id 进行查询
        $goods_model=model('Goods');
        $cou=$goods_model->where($where)->count();
        if($cou>0){
            $this->error('此分类下有商品不能删除',url('index'));exit;
        }


        $res=$cate_model->where($where)->delete();//删除
        if($res){
            $this->success('删除成功',url('index'));
        }else{
            $this->error('删除失败',url('index'));exit;
        }
    }
}
