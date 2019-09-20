<?php

namespace app\admin\model;

use think\Model;

class Admin extends Model
{
    //
    protected $pk='admin_id';

    // 修改器
    public function setAdminPwdAttr($value)
    {
    	return md5($value);
    }
    // 登录时间的格式化处理
    public function getLastLoginTimeAttr($value)
    {
        return $value==0?'N/A':date('Y-m-d H:i:s',$value);
    }
    // 登录ip地址的判断
    public function getLastLoginIpAttr($value)
    {
        return $value==''?'N/A':$value;
    }
}
