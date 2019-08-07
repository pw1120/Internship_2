<?php
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
    //后台路由设置
    //top界面路由 start
    'logout'=>'admin/admin/logout',
    'login'=>'admin/login/login',
    //top界面路由 end
    //left界面路由 start
    'admin/lst'=>'admin/admin/lst',
    'auth_group/lst'=>'admin/auth_group/lst',
    'auth_rule/lst'=>'admin/auth_rule/lst',
    'slide/lst'=>'admin/slide/lst',
    'cate/case_lst'=>'admin/cate/case_lst',
    'cate/syno_lst'=>'admin/cate/syno_lst',
    'cate/news_lst'=>'admin/cate/news_lst',
    'cate/expe_lst'=>'admin/cate/expe_lst',
    'about/why_lst'=>'admin/about/why_lst',
    'about/hon_lst'=>'admin/about/hon_lst',
    'about/his_lst'=>'admin/about/his_lst',
    'integrator/ind_lst'=>'admin/integrator/ind_lst',
    'integrator/thi_lst'=>'admin/integrator/thi_lst',
    'integrator/mess/:id'=>'admin/integrator/mess',
    'cases/ind_lst/[:id]'=>'admin/cases/ind_lst',
    'cases/thi_lst/[:select]&[:tt]'=>'admin/cases/thi_lst',
    'cases/page'=>'admin/cases/page',
    'cases/mess_lst'=>'admin/cases/mess_lst',
    'news/ind_lst'=>'admin/news/ind_lst',
    'news/thi_lst'=>'admin/news/thi_lst',
    'news/mess/:id'=>'admin/news/mess',
    'recruitment/ind_lst'=>'admin/recruitment/ind_lst',
    'recruitment/thi_lst'=>'admin/recruitment/thi_lst',
    'recruitment/mess/:id'=>'admin/recruitment/mess',
    'contact/contact'=>'admin/contact/contact',
    'contact/mess_lst'=>'admin/contact/mess_lst',
    'test/lst'=>'admin/test/lst',
    //left界面路由 end
    //界面路由 start
    'admin/add'=>'admin/admin/add',
    'admin/edit/:id'=>'admin/admin/edit',
    'admin/del/:id'=>'admin/admin/del',
    'admin/user_edit/:id'=>'admin/admin/user_edit',
    'auth_group/add'=>'admin/auth_group/add',
    'auth_group/edit/:id'=>'admin/auth_group/edit',
    'auth_group/del/:id'=>'admin/auth_group/del',
    'auth_rule/add'=>'admin/auth_rule/add',
    'auth_rule/edit/:id'=>'admin/auth_rule/edit',
    'auth_rule/del/:id'=>'admin/auth_rule/del',
    'slide/add'=>'admin/slide/add',
    'slide/edit/:id'=>'admin/slide/edit',
    'slide/del/:id'=>'admin/slide/del',
    'cate/case_add'=>'admin/cate/case_add',
    'cate/case_edit/:id'=>'admin/cate/case_edit',
    'cate/case_del/:id'=>'admin/cate/case_del',
    'cate/expe_add'=>'admin/cate/expe_add',
    'cate/expe_edit/:id'=>'admin/cate/expe_edit',
    'cate/expe_del/:id'=>'admin/cate/expe_del',
    'about/his_add'=>'admin/about/his_add',
    'about/his_edit/:id'=>'admin/about/his_edit',
    'about/his_del/:id'=>'admin/about/his_del',
    'integrator/ind_add'=>'admin/integrator/ind_add',
    'integrator/ind_edit/:id'=>'admin/integrator/ind_edit',
    'integrator/ind_del/:id'=>'admin/integrator/ind_del',
    'integrator/thi_add'=>'admin/integrator/thi_add',
    'integrator/thi_edit/:id'=>'admin/integrator/thi_edit',
    'integrator/thi_del/:id'=>'admin/integrator/thi_del',
    'cases/ind_add'=>'admin/cases/ind_add',
    'cases/ind_edit/:id'=>'admin/cases/ind_edit',
    'cases/ind_del/:id'=>'admin/cases/ind_del',
    'cases/thi_add'=>'admin/cases/thi_add',
    'cases/thi_edit/:id'=>'admin/cases/thi_edit',
    'cases/thi_del/:id'=>'admin/cases/thi_del',
    'cases/mess_del/:id'=>'admin/cases/mess_del',
    'news/ind_add'=>'admin/news/ind_add',
    'news/ind_edit/:id'=>'admin/news/ind_edit',
    'news/ind_del/:id'=>'admin/news/ind_del',
    'news/thi_add'=>'admin/news/thi_add',
    'news/thi_edit/:id'=>'admin/news/thi_edit',
    'news/thi_del/:id'=>'admin/news/thi_del',
    'recruitment/ind_add'=>'admin/recruitment/ind_add',
    'recruitment/ind_edit/:id'=>'admin/recruitment/ind_edit',
    'recruitment/ind_del/:id'=>'admin/recruitment/ind_del',
    'recruitment/thi_add'=>'admin/recruitment/thi_add',
    'recruitment/thi_edit/:id'=>'admin/recruitment/thi_edit',
    'recruitment/thi_del/:id'=>'admin/recruitment/thi_del',
    'contact/mess_del/:id'=>'admin/contact/mess_del',
    'test/add'=>'admin/test/add',
    'test/edit/:id'=>'admin/test/edit',
    'test/del/:id'=>'admin/test/del',
    //界面路由 end
];