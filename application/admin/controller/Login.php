<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Login extends Controller
{
   /** 显示登录的视图 */
    public function login(){
        //关闭layout 登录页面不要头  左侧
        $this->view->engine->layout(false);
        return $this->fetch();
    }
   /** 执行登录 */
   public function loginDo(){
       $data=input('post.');
       //验证 验证码是否正确
       if(!captcha_check($data['code'])){
            fail('验证码有误');
       };

       //根据账号和密码在数据库中进行查询
       $where=[
           ['admin_name','=',$data['admin_name']],
           ['admin_pwd','=',md5($data['admin_pwd'])],
       ];
       $admin_model=model('Admin');
       $info=$admin_model->where($where)->find();
      if(!empty($info)){
          //把管理员id  账号 存入session中
          $adminInfo=['admin_id'=>$info['admin_id'],'admin_name'=>$info['admin_name']];
          session('adminInfo',$adminInfo);

          //把当前用户的最后一次登录时间改为当前时间 最后一次登录ip 改为当前的ip地址
          $data=['last_login_time'=>time(),'last_login_ip'=>request()->ip()];
          $where=[
              ['admin_id','=',$info['admin_id']]
          ];
          $admin_model->where($where)->update($data);

          successly('登录成功');
      }else{
          fail('登录失败');
      }
   }

   /** 退出 */
   public function quit(){
        session('adminInfo',null);
        $this->success('退出成功',url('Login/login'));
   }


   public function test(){
       dump(session('adminInfo'));
   }
}
