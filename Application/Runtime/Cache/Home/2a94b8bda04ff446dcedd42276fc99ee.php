<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>校园服务</title>
    <!-- 引入 WeUI -->
    <link rel="stylesheet" href="https://res.wx.qq.com/open/libs/weui/1.0.2/weui.min.css"/>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">

    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
</head>
<body>
<div class="page main">
    <div class="page__bd">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">湘农青年</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">首页</a></li>
                        <!-- <li><a href="#">Page 1</a></li>
                         <li><a href="#">Page 2</a></li>
                         <li><a href="#">Page 3</a></li> -->
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="./loginout.php"><span class="glyphicon glyphicon-user"></span> 退出</a></li>
                        <li><a href="./login.php"><span class="glyphicon glyphicon-log-in"></span>登陆</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="page grid" style="margin-top: 30px;">
            <div id="logopic"></div>   <!-- LOGON图片 -->
            <div id="introduce">
                <h3>湖南农业大学欢迎你</h3>
                <p>湘农青年&nbsp;校园服务</p>
            </div>                      <!-- 介绍 -->
            <div class="weui-grids">
                <a href="./function/cjcx.php?data=cj" class="weui-grid">
                    <div class="weui-grid__icon">
                        <img src="./images/cj.png" alt="">
                    </div>
                    <p class="weui-grid__label">成绩查询</p>
                </a>
                <a href="javascript:;" class="weui-grid">
                    <div class="weui-grid__icon">
                        <img src="./images/kb.png" alt="">
                    </div>
                    <p class="weui-grid__label">课表查询</p>
                </a>
                <a href="javascript:;" class="weui-grid">
                    <div class="weui-grid__icon">
                        <img src="./images/df.png" alt="">
                    </div>
                    <p class="weui-grid__label">电费查询</p>
                </a>
                <a href="javascript:;" class="weui-grid">
                    <div class="weui-grid__icon">
                        <img src="./images/ts.png" alt="">
                    </div>
                    <p class="weui-grid__label">图书检索</p>
                </a>
                <a href="javascript:;" class="weui-grid">
                    <div class="weui-grid__icon">
                        <img src="./images/ykt.png" alt="">
                    </div>
                    <p class="weui-grid__label">一卡通挂失</p>
                </a>
                <a href="javascript:;" class="weui-grid">
                    <div class="weui-grid__icon">
                        <img src="./images/mm.png" alt="">
                    </div>
                    <p class="weui-grid__label">修改密码</p>
                </a>
                <a href="javascript:;" class="weui-grid">
                    <div class="weui-grid__icon">
                        <img src="./images/icon_tabbar.png" alt="">
                    </div>
                    <p class="weui-grid__label">Grid</p>
                </a>
                <a href="javascript:;" class="weui-grid">
                    <div class="weui-grid__icon">
                        <img src="./images/icon_tabbar.png" alt="">
                    </div>
                    <p class="weui-grid__label">Grid</p>
                </a>
                <a href="javascript:;" class="weui-grid">
                    <div class="weui-grid__icon">
                        <img src="./images/icon_tabbar.png" alt="">
                    </div>
                    <p class="weui-grid__label">Grid</p>
                </a>
            </div>
        </div>
        <!-- <div class="gywm_toggle" style="width: 500px; height: 500px; border: 1px solid #f00; display: none;"></div> -->
    </div>
    <div class="weui-footer" style="margin-top: 10px">
        <p class="weui-footer__links">
            <a href="javascript:void(0);" class="weui-footer__link">底部链接</a>
        </p>
        <p class="weui-footer__text">Copyright &copy; 2008-2016 weui.io</p>
    </div>
</div>
<!-- <script type="text/javascript">
     $(function(){
$('.weui-navbar__item').on('click', function () {
    $(this).addClass('weui-bar__item_on').siblings('.weui-bar__item_on').removeClass('weui-bar__item_on');
});
});
</script>
<script type="text/javascript">
    $(function(){
        $('.gywm').click(function(){
            $('.xyfw_toggle').css('display','none');
            $('.gywm_toggle').css('display','block');
        });
    });
    $(function(){
        $('.xyfw').click(function(){
            $('.gywm_toggle').css('display','none');
            $('.xyfw_toggle').css('display','block');
        });
    })
</script> -->
</body>
</html>