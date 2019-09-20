<?php

namespace app\index\model;

use think\Model;

class Region extends Model
{
    protected $pk = "region_id";
    
    public function getTop(){
        return self::where('parent_id',0)->select();
    }
    
    public function getSon($where){
        return self::where($where)->select();
    }
    
}
