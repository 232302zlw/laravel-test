<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Index extends Common
{
    /**
     * 后台首页
     *
     * @return \think\Response
     */
    public function index()
    {

        //防非法登录
        if(!session("?adminInfo")){
            $this->error('请先登录',url('Login/login'));
        }
        return $this->fetch();
    }
}
