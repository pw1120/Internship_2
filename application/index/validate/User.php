<?php

namespace app\index\validate;

use think\Validate;

class User extends Validate{
//    当前验证的规则
    protected $rule=[
        'number' => 'min:11|max:11|/^1[3-8]{1}[0-9]{9}$/',
    ];
//    验证提示信息
    protected $message = [
        'number'     => '手机号码位数为11位|手机号码格式不正确',
    ];
//    验证场景 scene = ['edit'=>'name1,name2,...']
    protected $scene = [

    ];

}
