<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Admin extends Common
{
    /**
     * 管理员列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $admin_name=input('param.admin_name');
        $where=[
            ['admin_name','like',"%{$admin_name}%"],
        ];
        $adminc=model('Admin')->where($where)->paginate(2,false,['query'=>['admin_name'=>$admin_name]]);
        $this->assign('admin_name',$admin_name);
        $this->assign('admins',$adminc);
        return $this->fetch();
        
    }

    /**
     * 管理员添加视图
     *
     * @return \think\Response
     */
    public function create()
    {

        return $this->fetch();
    }

    /**
     * 管理员添加
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save()
    {
        // dump(input('post.'));
        $data=input('post.');
        // dump($data);
        // dump($data);
        // return $data;
        // $valitate=new \app\admin\validate\Admin;
        // if(!$valitate->check($data))
        // {
        //     $this->error($valitate->getError());
        // }
        $validate=validate('Admin');
        if(!$validate->check($data))
        {
            $msg=$validate->getError();
            echo  json_encode(['msg'=>$msg,'code'=>0]);die;
        }
        $res=model('Admin')->save($data);
        // dump(1111);die;
        if($res)
        { 
            //$this->success('添加成功','index');
            // return 1;
            echo json_encode(['msg'=>'添加成功','code'=>1]);die;
        }else{
            //$this->error('添加失败');
            // return 2;
            echo json_encode(['msg'=>'添加失败','code'=>0]);die;
        }
    }



    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit()
    {
        $data=model('Admin')->get(input('param.admin_id'));
        $this->assign('admin',$data);
        return $this->fetch();
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update()
    {
        $data=input('post.');
        //验证  管理员名称非空 唯一性 手机号格式 邮箱格式
        $validate=validate('Admin');
        //验证场景
        $res=$validate->scene('edit')->check($data);
        if(empty($res)){
            echo json_encode(['font'=>$validate->getError(),'code'=>2]);exit;
        }

        //执行修改
        $admin_model=model('Admin');
        $where=[
            ['admin_id','=',$data['admin_id']]
        ];
        $res=$admin_model->where($where)->update($data);//返回结果 受影响的行数  1   0   语法有错误 false
        if($res===false){
            echo json_encode(['font'=>'修改失败','code'=>2]);exit;
        }else{
            echo json_encode(['font'=>'修改成功','code'=>1]);
        }
    }


    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete()
    {


        $res=model('Admin')->destroy(input('param.admin_id'));
        if($res)
        {
        //     $this->success('删除成功','index');
        echo 1;
        }else{
        //     $this->error('删除失败');
        echo 2;
        }
    }
}
