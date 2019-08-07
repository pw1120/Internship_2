<?php
use think\Route;
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
return[
    //前台路由设置
    'index'=>'index/index/index',
    'about'=>'index/index/about',
    'product/[:type]'=>'index/index/product',
    'product02/[:id]'=>'index/index/product02',
    'solution/[:id]/[:pid]/[:pids]'=>'index/index/solution',
    'solution_show'=>'index/index/solution_show',
    'news/[:type]'=>'index/index/news',
    'news_show/[:id]'=>'index/index/news_show',
    'recruitment/[:type]'=>'index/index/recruitment',
    'recruitment_show/[:id]'=>'index/index/recruitment_show',
    'contact'=>'index/index/contact',
];