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
            <form action="<?php echo U('Home/Login/handle');?>" id="login_form" method="post">
                <div class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">学号</label></div>
                    <div class="weui-cell__bd">
                        <input name="userid" class="weui-input" type="number" pattern="[0-9]*" placeholder="请输入学号">
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">密码</label></div>
                    <div class="weui-cell__bd">
                        <input name="passwd" class="weui-input" type="password" pattern="[0-9]*" placeholder="请输入密码">
                    </div>
                </div>
                <div class="page__bd_spacing" style="margin-top: 50px">
                    <a href="#" onclick="document:login_form.submit()" class="weui-btn weui-btn_primary" style="
    width: 95%;
">登录</a>
                </div>
            </form>
        </div>


<!-- header start -->
<div class="weui-footer weui-footer_fixed-bottom">
    <p class="weui-footer__links">
        <a href="javascript:home();" class="weui-footer__link">WeUI首页</a>
    </p>
    <p class="weui-footer__text">Copyright © 2008-2016 weui.io</p>
</div>
</div>
</body>
</html>
<!-- header end -->