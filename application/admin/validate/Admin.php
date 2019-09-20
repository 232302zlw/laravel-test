<?php

namespace app\admin\validate;

use think\Validate;

class Admin extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'admin_name'=>'require|checkName',
        'admin_pwd'=>'require',
        'admin_email'=>'require|email',
        'admin_tel'=>'require|mobile',
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'admin_name.require'=>'用户名不能为空',
        'admin_pwd.require'=>'密码不能为空',
        'admin_email.require'=>'邮箱不能为空',
        'admin_email.email'=>'必须是邮箱的格式',
        'admin_tel.require'=>'电话不能为空',
        'admin_tel.mobile'=>'必须是电话的格式',
    ];

    protected $scene = [
        'add' => ['admin_name','admin_pwd','admin_email','admin_tel'],
        'edit' => ['admin_name','admin_email','admin_tel'],
    ];

    //自定义验证 管理员唯一性  （添加+修改）
    protected function checkName($value,$rule,$data){
        $admin_model= model('Admin');
        if(empty($data['admin_id'])){
            //添加
            $where=[
                ['admin_name','=',$value]
            ];
            $count=$admin_model->where($where)->count();
            return $count>0?'管理员名称已存在':true;

        }else{
            //修改
            $where=[
                ['admin_id','neq',$data['admin_id']],
                ['admin_name','=',$value]
            ];
            $count=$admin_model->where($where)->count();
            return $count>0?'管理员名称已存在':true;
        }
    }


}
