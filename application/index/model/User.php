<?php

namespace app\index\model;

use think\Model;

class User extends Model
{
    protected $pk='user_id';
    protected $autoWriteTimestamp = true;
}
