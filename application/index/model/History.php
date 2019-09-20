<?php

namespace app\index\model;

use think\Model;

class History extends Model
{
    protected $pk="h_id";
    //根据查询条件获取单挑浏览记录信息
    public static function getHistory($where) {
        
        $data = self::where($where)->find();
//        echo self::getLastsql();
        return $data;
    }
    
    
}
