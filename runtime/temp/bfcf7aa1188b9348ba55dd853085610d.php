<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:87:"C:\phpStudy\PHPTutorial\WWW\test2\public/../application/admin\view\integrator\mess.html";i:1564648235;s:82:"C:\phpStudy\PHPTutorial\WWW\test2\public/../application/admin\view\common\top.html";i:1564639786;s:83:"C:\phpStudy\PHPTutorial\WWW\test2\public/../application/admin\view\common\left.html";i:1564648234;}*/ ?>
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
    <script type="text/javascript" src="__PUBLIC__/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="__PUBLIC__/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/ueditor/lang/zh-cn/zh-cn.js"></script>
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
                    <li>
                        <a href="/integrator/thi_lst">商品列表</a>
                    </li>
                    <li class="active">商品信息</li>
                </ul>
            </div>
            <div class="page-body">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <div class="widget-header bordered-bottom bordered-blue">
                                <span class="widget-caption">商品信息</span>
                            </div>
                            <div class="widget-body">
                                <div id="horizontal-form">
                                    <form class="form-horizontal" role="form" enctype="multipart/form-data" action="" method="post">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right">具体信息：</label>
                                            <div class="col-sm-6">
                                                <textarea id="content1" name="content1"><?php echo $show['tab']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right">产品特点：</label>
                                            <div class="col-sm-6">
                                                <textarea id="content2" name="content2"><?php echo $show['content']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button style="margin-left: 230px;" type="submit" class="btn btn-default">保存信息</button>
                                            </div>
                                        </div>
                                    </form>
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
<script type="text/javascript">
    UE.getEditor('content1',{initialFrameWidth:561,initialFrameHeight:200,});
</script>
<script type="text/javascript">
    UE.getEditor('content2',{initialFrameWidth:561,initialFrameHeight:200,});
</script>
</body></html>