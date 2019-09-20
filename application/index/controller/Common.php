<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\Category;

class Common extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function __construct() {
        parent::__construct();
        //获取商品分类
        $category = Category::select()->toArray();
        $category = getSonCateInfo($category);
        $this->assign('category', $category);
        //顶层导航
        $nav = Category::where(['pid'=>0,'is_nav_show'=>1])->limit(7)->select();
        $this->assign('nav', $nav);
        
    }
        /**
     * 检查用户是否登录
     * @return boolean
     */
    public function checkLogin(){
       $user =  session('userInfo');
      
        if(!$user){
            return false;
        }
        return true;
    }
    

}
