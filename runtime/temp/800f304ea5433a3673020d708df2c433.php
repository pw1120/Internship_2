<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:83:"C:\phpStudy\PHPTutorial\WWW\test2\public/../application/index\view\index\index.html";i:1564647927;s:83:"C:\phpStudy\PHPTutorial\WWW\test2\public/../application/index\view\comment\top.html";i:1564452569;s:86:"C:\phpStudy\PHPTutorial\WWW\test2\public/../application/index\view\comment\footer.html";i:1563172536;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>集成商模板--模板预览</title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta name="author" content="集成商模板" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=10" />
    <meta name="baidu-site-verification" content="DiRYNrTCNs" />
    <meta name="baidu-site-verification" content="DCHaExB26v" />
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/head_common_top.css">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/layout.css">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/iconfont.css">
    <script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/jquery.SuperSlide.js"></script>
</head>
<body>
<?php if(is_array($title) || $title instanceof \think\Collection): $i = 0; $__LIST__ = $title;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ti): $mod = ($i % 2 );++$i;?>
<!--模板头部 begin-->
<div class="head" id="head">
    <div class="head_main clearfix">
        <!--logo begin-->
<div class="logo clearfix">
    <a class="logo_a" href="Javascript:void(0);"><img src="__PUBLIC__/images/logo.png" alt="logo图片" /></a>
    <dl>
        <dt>
            <h2>那智旗舰店</h2></dt>
        <dd class="clearfix">
            <a class="type_a" href="javascript:void(0);">集成商直销</a>
        </dd>
    </dl>
</div>
<!--logo end-->
        <!--导航 begin-->
        <div class="nav">
            <ul class="nav_ul clearfix">
                <li class="nav_li cur">
                    <a href="/index">首 页</a>
                </li>
                <li class="nav_li">
                    <a href="/about">关于我们</a>
                </li>
                <li class="nav_li">
                    <a href="/product">集成商机器人</a>
                </li>
                <li class="nav_li">
                    <a href="/solution">解决方案</a>
                </li>
                <li class="nav_li">
                    <a href="/news">新闻资讯</a>
                </li>
                <li class="nav_li">
                    <a href="/recruitment">人才招聘</a>
                </li>
                <li class="nav_li">
                    <a href="/contact">联系我们</a>
                </li>
            </ul>
        </div>
        <!--导航 end-->
    </div>
</div>
<!--模板头部 end-->
    <!--banner轮播 begin-->
    <div id="banner" class="banner">
        <div class="hd">
            <ul>
                <?php if(is_array($data) || $data instanceof \think\Collection): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$da): $mod = ($i % 2 );++$i;?>
                <li><?php echo $da['id']; ?></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="bd">
            <ul>
                <?php if(is_array($data) || $data instanceof \think\Collection): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$da): $mod = ($i % 2 );++$i;?>
                <li>
                    <a href="javascript:void(0)"><img src="__PUBLIC__/<?php echo $da['img']; ?>" alt="banner图1" /></a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <a class="prev iconfont" href="javascript:void(0)">&#xe600;</a>
        <a class="next iconfont" href="javascript:void(0)">&#xe601;</a>
    </div>
    <!--banner轮播 end-->
    <!--解决方案 begin-->
    <div class="solution">
        <div class="common_t">
            <h3><?php echo $ti['solution']; ?></h3>
            <div><span></span></div>
        </div>
        <div class="solution_content">
            <div class="hd">
                <ul>
                    <?php if(is_array($solu) || $solu instanceof \think\Collection): $i = 0; $__LIST__ = $solu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($i % 2 );++$i;?>
                    <li><a href="javascript:void(0);"><?php echo $so['name']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="bd">
                <?php if(is_array($solu) || $solu instanceof \think\Collection): $i = 0; $__LIST__ = $solu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($i % 2 );++$i;?>
                <ul class="solution_bd_ul flexBox">
                    <li>
                        <a href="<?php echo url($so['web_1']); ?>">
                        <div class="li_div">
                                <img src="__PUBLIC__/<?php echo $so['img_1']; ?>" />
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url($so['web_2']); ?>">
                            <div class="li_div">
                                <img src="__PUBLIC__/<?php echo $so['img_2']; ?>" />
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url($so['web_3']); ?>">
                            <div class="li_div">
                                <img src="__PUBLIC__/<?php echo $so['img_3']; ?>" />
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url($so['web_4']); ?>">
                            <div class="li_div">
                                <img src="__PUBLIC__/<?php echo $so['img_4']; ?>" />
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url($so['web_5']); ?>">
                            <div class="li_div">
                                <img src="__PUBLIC__/<?php echo $so['img_5']; ?>" />
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url($so['web_6']); ?>">
                            <div class="li_div">
                                <img src="__PUBLIC__/<?php echo $so['img_6']; ?>" />
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url($so['web_7']); ?>">
                            <div class="li_div">
                                <img src="__PUBLIC__/<?php echo $so['img_7']; ?>" />
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url($so['web_8']); ?>">
                            <div class="li_div">
                                <img src="__PUBLIC__/<?php echo $so['img_8']; ?>" />
                            </div>
                        </a>
                    </li>
                </ul>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
    <!--解决方案 end-->
    <!--公司简介 begin-->
    <div class="about">
        <?php if(is_array($introdution) || $introdution instanceof \think\Collection): $i = 0; $__LIST__ = $introdution;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$int): $mod = ($i % 2 );++$i;?>
        <div class="about_content">
            <div class="txt">
                <div class="title">
                    <h2><?php echo $int['title']; ?></h2>
                    <span><?php echo $int['translate']; ?></span>
                </div>
                <?php echo $int['content']; ?>
                <a class="more" href="<?php echo url($int['url']); ?>"><?php echo $int['more']; ?></a>
            </div>
        </div>
        <div class="usImg">
            <img src="__PUBLIC__/<?php echo $int['img']; ?>" alt="公司图片" />
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <!--公司简介 end-->
    <!--新闻 begin-->
    <div class="news">
        <div class="common_t">
            <h3><?php echo $ti['new']; ?></h3>
            <div><span></span></div>
        </div>
        <div class="news_content clearfix">
            <?php if(is_array($news) || $news instanceof \think\Collection): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
            <div class="left">
                <img src="__PUBLIC__/<?php echo $new['img']; ?>" alt="新闻图片" />
            </div>
            <div class="right">
                <h2><a href="javascript:void(0);"><?php echo $new['title']; ?></a><span><?php echo $new['name']; ?></span></h2>
                <?php echo $new['content']; ?>
                <a class="more" href="/<?php echo $new['url']; ?>"><?php echo $new['text']; ?></a>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <!--新闻 end-->
    <!--专家 begin-->
    <div class="experts">
        <div class="common_t">
            <h3><?php echo $ti['expert']; ?></h3>
            <div><span></span></div>
        </div>
        <div class="experts_content">
            <ul class="experts_list flexBox">
                <?php if(is_array($expert) || $expert instanceof \think\Collection): $i = 0; $__LIST__ = $expert;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$exp): $mod = ($i % 2 );++$i;?>
                <li>
                    <dl>
                        <dt>
                            <img src="__PUBLIC__/<?php echo $exp['img']; ?>" alt="专家图片" />
                        </dt>
                        <dd class="clearfix">
                            <img class="codeimg" src="__PUBLIC__/<?php echo $exp['code']; ?>" alt="二维码" />
                            <h3><?php echo $exp['name']; ?></h3>
                            <p><?php echo $exp['profession']; ?></p>
                            <a href="javascript:void(0);"><?php echo $exp['consultation']; ?></a>
                        </dd>
                    </dl>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <!--专家 end-->
    <!--底部 begin-->
    <div class="foot_prin">
    <p>版权所有©川崎2014-2016保留所有权 </p>
    <p>技术支持：机器人在线 </p>
</div>
    <!--底部 end-->
    <!--banner 轮播-->
    <script type="text/javascript">
    $(function() {
        jQuery(".banner").slide({
            mainCell: ".bd ul",
            effect: "fold",
            autoPlay: true
        });
        jQuery(".solution_content").slide({});
    })
    </script>
<?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>