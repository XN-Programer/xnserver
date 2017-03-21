<?php if (!defined('THINK_PATH')) exit();?><!-- header start -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校园服务</title>
    <!-- 引入 WeUI -->
    <link rel="stylesheet" href="/Public/Css/weui.min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Css/style.css" />
    <script type="text/javascript" src="/Public/Js/jquery-3.1.1.min.js"></script>
    <?php if(!empty($xn)): ?><link rel="stylesheet" type="text/css" href="http://cdn.amazeui.org/amazeui/2.7.2/css/amazeui.min.css" /><?php endif; ?>

</head>
<body>

<!-- header end -->

<div class="container">
    <div class="page__hd">
        <div id="logopic"></div>
        <div id="introduce">
            <h3>湖南农业大学欢迎你</h3>
            <p>湘农青年&nbsp;校园服务</p>
        </div>
    </div>
    <div class="page__bd">
        <div class="weui-flex">
            <div class="weui-flex__item"><div class="placeholder">姓名</div></div>
            <div class="weui-flex__item"><div class="placeholder">月份</div></div>
            <div class="weui-flex__item">
                <div class="placeholder">
                    <a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_default" id="showPicker">第几周</a>
                </div>
            </div>
        </div>
    </div>

    <table class="am-table am-table-bordered am-table-striped am-table-centered" id="show_kb" style="width: 100%"></table>




    <script type="text/javascript" src="/Public/Js/weui.min.js"></script>
    <script type="text/javascript" src="/Public/JS/function/personkb.js"></script>
    <script type="text/javascript" src="/Public/Js/weui.min.js"></script>
<!-- footer start -->
<div class="weui-footer weui-footer_fixed-bottom">
    <p class="weui-footer__links">
        <a href="javascript:home();" class="weui-footer__link">WeUI首页</a>
    </p>
    <p class="weui-footer__text">Copyright © 2008-2016 weui.io</p>
</div>
</div>
</body>
</html>
<!-- footer end -->