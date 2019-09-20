<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Common extends Controller
{
    public function __construct(){
        parent::__construct();

        //防非法登录
        if(!session("?adminInfo")){
            $this->error('请先登录',url('Login/login'));
        }
    }

    /** 获取分类信息 */
    public function getCateInfo(){
        $cate_model=model('Category');
        $cateInfo=$cate_model->select()->toArray();
        $info=getCateInfo($cateInfo,0);
        return $info;
    }

}
