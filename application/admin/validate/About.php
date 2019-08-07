<?php
namespace app\admin\validate;
use think\Validate;
class About extends Validate
{
    protected $rule = [
        'id'  =>  'require|max:25',
        'box' =>  'require',
    ];

    protected $message  =   [
        'id.require' => '文章标题必须填写',
        'id.max' => '文章标题长度不得大于25位',
        'box.require' => '请选择文章所属栏目',

    ];

    protected $scene = [
        'add'  =>  ['id','box'],
        'edit'  =>  ['id','box'],
    ];




}
