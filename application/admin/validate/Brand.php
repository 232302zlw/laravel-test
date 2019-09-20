<?php

namespace app\admin\validate;

use think\Validate;

class Brand extends Validate
{
    //规则
    protected $rule=[
        'brand_name'=>'require|unique:brand',
        'brand_url'=>'require|url'
    ];
    //提示文字
    protected $message=[
        'brand_name.require'=>'品牌名称必填',
        'brand_name.unique'=>'品牌名称已存在',
        'brand_url.require'=>'品牌网址必填',
        'brand_url.url'=>'品牌网址格式有误',
    ];
}
