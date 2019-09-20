<?php

namespace app\index\validate;

use think\Validate;

class User extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'user_email'=>'require|email|unique:user|checkEmail',
        'user_code'=>'require|checkCode',
        'user_pwd'=>'require',
        'user_pwd1'=>'require|confirm:user_pwd'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'user_email.require'=>'邮箱必填',
        'user_email.email'=>'邮箱格式有误',
        'user_email.unique'=>'邮箱已经被注册',
        'user_code.require'=>'验证码必填',
        'user_pwd.require'=>'密码必填',
        'user_pwd1.require'=>'确认密码必填',
        'user_pwd1.confirm'=>'确认密码必须和密码保持一致',
    ];

    //验证邮箱
    protected function checkEmail($value,$rule,$data){
        $emailInfo=cookie('emailInfo');
        if($emailInfo['account']==$value){
            //返回true
            return true;
        }else{
            //返回错误信息
            return '发送邮件邮箱与注册邮箱不一致';
        }
    }
    protected function checkCode($value,$rule,$data){
        $emailInfo=cookie('emailInfo');
        if($emailInfo['code']!=$value){
            return '验证码有误';
        }else if(time()-$emailInfo['send_time']>300){
            return '验证码已失效，五分钟内有效';
        }else{
            return true;
        }
    }

}
