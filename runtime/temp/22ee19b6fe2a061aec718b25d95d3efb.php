<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:90:"C:\phpStudy\PHPTutorial\WWW\test2\public/../application/admin\view\integrator\thi_lst.html";i:1564648235;s:82:"C:\phpStudy\PHPTutorial\WWW\test2\public/../application/admin\view\common\top.html";i:1564639786;s:83:"C:\phpStudy\PHPTutorial\WWW\test2\public/../application/admin\view\common\left.html";i:1564648234;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ThinkPHP5.0后台管理界面</title>
    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="__PUBLIC__/style/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
    <link href="__PUBLIC__/style/weather-icons.css" rel="stylesheet">
    <link id="beyond-link" href="__PUBLIC__/style/beyond.css" rel="stylesheet" type="text/css">
    <link href="__PUBLIC__/style/demo.css" rel="stylesheet">
    <link href="__PUBLIC__/style/typicons.css" rel="stylesheet">
    <link href="__PUBLIC__/style/animate.css" rel="stylesheet">
</head>
<body>
	<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small>
                            <img src="__PUBLIC__/images/89364594414225440logo.png" alt="">
                    </small>
                </a>
            </div>
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <img src="__PUBLIC__/images/adam-jansen.jpg">
                                </div>
                                <section>
                                    <h2><span class="profile"><span><?php echo \think\Request::instance()->session('username'); ?></span></span></h2>
                                </section>
                            </a>
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="dropdown-footer">
                                    <a href="/logout">
                                        退出登录
                                    </a>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="/admin/user_edit/<?php echo \think\Request::instance()->session('uid'); ?>">
                                        修改密码
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
	<div class="main-container container-fluid">
		<div class="page-container">
            <div class="page-sidebar" id="sidebar">
    <ul class="nav sidebar-menu">
        <li>
            <a href="/admin" class="menu-dropdown">
                <i class="menu-icon fa fa-cog"></i>
                <span class="menu-text">首页 </span>
            </a>
        </li>
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text">管理员 </span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="/admin/lst">
                        <span class="menu-text">管理列表</span>
                    </a>
                </li>
                <li>
                    <a href="/auth_group/lst">
                        <span class="menu-text">用户组列表</span>
                    </a>
                </li>
                <li>
                    <a href="/auth_rule/lst">
                        <span class="menu-text">权限列表</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="/slide/lst" class="menu-dropdown">
                <i class="menu-icon fa fa-picture-o"></i>
                <span class="menu-text">幻灯片管理</span>
            </a>
        </li>
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text">首页信息管理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="/cate/case_lst">
                        <span class="menu-text">解决方案</span>
                    </a>
                </li>
                <li>
                    <a href="/cate/syno_lst">
                        <span class="menu-text">公司简介</span>
                    </a>
                </li>
                <li>
                    <a href="/cate/news_lst">
                        <span class="menu-text">新闻</span>
                    </a>
                </li>
                <li>
                    <a href="/cate/expe_lst">
                        <span class="menu-text">专家信息</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-smile-o"></i>
                <span class="menu-text">关于我们</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="/about/why_lst">
                        <span class="menu-text">选择原因</span>
                    </a>
                </li>
                <li>
                    <a href="/about/hon_lst">
                        <span class="menu-text">企业荣誉</span>
                    </a>
                </li>
                <li>
                    <a href="/about/his_lst">
                        <span class="menu-text">发展历程</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-truck"></i>
                <span class="menu-text">集成商列表</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="/integrator/ind_lst">
                        <span class="menu-text">导航列表</span>
                    </a>
                </li>
                <li>
                    <a href="/integrator/thi_lst">
                        <span class="menu-text">商品列表</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-comments-o"></i>
                <span class="menu-text">解决方案</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="/cases/ind_lst">
                        <span class="menu-text">导航列表</span>
                    </a>
                </li>
                <li>
                    <a href="/cases/thi_lst">
                        <span class="menu-text">商品列表</span>
                    </a>
                </li>
                <li>
                    <a href="/cases/page">
                        <span class="menu-text">子页面管理</span>
                    </a>
                </li>
                <li>
                    <a href="/cases/mess_lst">
                        <span class="menu-text">评论列表</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-file"></i>
                <span class="menu-text">新闻列表</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="/news/ind_lst">
                        <span class="menu-text">导航列表</span>
                    </a>
                </li>
                <li>
                    <a href="/news/thi_lst">
                        <span class="menu-text">新闻列表</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-thumbs-up"></i>
                <span class="menu-text">人才招聘</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="/recruitment/ind_lst">
                        <span class="menu-text">导航列表</span>
                    </a>
                </li>
                <li>
                    <a href="/recruitment/thi_lst">
                        <span class="menu-text">招聘列表</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-phone"></i>
                <span class="menu-text">联系我们</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="/contact/contact">
                        <span class="menu-text">联系我们</span>
                    </a>
                </li>
                <li>
                    <a href="/contact/mess_lst">
                        <span class="menu-text">留言列表</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="/test/lst" class="menu-dropdown">
                <i class="menu-icon fa fa-exclamation"></i>
                <span class="menu-text">测试</span>
            </a>
        </li>
    </ul>
</div>
            <div class="page-content">
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <a href="/admin">系统</a>
                        </li>
                        <li class="active">集成商列表</li>
                        <li class="active">商品列表</li>
                    </ul>
                </div>
                <div class="page-body">
<button type="button" class="btn btn-sm btn-azure btn-addon" onClick="javascript:window.location.href = '/integrator/thi_add'">
    <i class="fa fa-plus"></i> Add
</button>
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-body">
                <div class="flip-scroll">
                    <table class="table table-bordered table-hover">
                        <thead class="">
                            <tr>
                                <th class="text-center" width="4%">ID</th>
                                <th class="text-center">商品列表</th>
                                <th class="text-center">商品图片</th>
                                <th class="text-center" width="14%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($lst) || $lst instanceof \think\Collection): $i = 0; $__LIST__ = $lst;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <tr>
                                <td align="center" style="padding-top: 25px;"><?php echo $vo['id']; ?></td>
                                <td align="center" style="padding-top: 25px;"><a href="/integrator/mess/<?php echo $vo['id']; ?>"><?php echo $vo['title']; ?></td>
                                <td align="center"><img style="height: 60px;" src="__IMG__/index/<?php echo $vo['img']; ?>"></td>
                                <td align="center" style="padding-top: 25px;">
                                    <a href="/integrator/thi_edit/<?php echo $vo['id']; ?>" class="btn btn-primary btn-sm shiny">
                                        <i class="fa fa-edit"></i> 编辑
                                    </a>
                                    <a href="#" onClick="warning('确实要删除吗', '/integrator/thi_del/<?php echo $vo['id']; ?>')" class="btn btn-danger btn-sm shiny">
                                        <i class="fa fa-trash-o"></i> 删除
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
                <div style="text-align:right; margin-top:10px;">
                    <?php echo $lst->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
                </div>
            </div>
		</div>
	</div>
    <script src="__PUBLIC__/style/jquery_002.js"></script>
    <script src="__PUBLIC__/style/bootstrap.js"></script>
    <script src="__PUBLIC__/style/jquery.js"></script>
    <script src="__PUBLIC__/style/beyond.js"></script>
</body>
</html>