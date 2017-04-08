<?php if (!defined('THINK_PATH')) exit();?><!-- header start -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校园服务</title>
    <?php if(!empty($xn) || !empty($kb) || !empty($data)): ?><link rel="stylesheet" type="text/css" href="http://cdn.amazeui.org/amazeui/2.7.2/css/amazeui.min.css" /><?php endif; ?>
    <!-- 引入 WeUI -->
    <link rel="stylesheet" href="/Public/Css/weui.min.css"/>
    <script type="text/javascript" src="/Public/Js/jquery-3.1.1.min.js"></script>

    <link rel="stylesheet" type="text/css" href="/Public/Css/style.css" />

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
        <div class="page grid">
            <div class="weui-grids">
                <a href="<?php echo U('Home/Score/index');?>" class="weui-grid">
                    <div class="weui-grid__icon">
                        <img src="/Public/images/cj.png" alt="">
                    </div>
                    <p class="weui-grid__label">成绩查询</p>
                </a>
                <a href="<?php echo U('Home/CSchedule/index');?>" class="weui-grid">
                    <div class="weui-grid__icon">
                        <img src="/Public/images/kb.png" alt="">
                    </div>
                    <p class="weui-grid__label">课表查询</p>
                </a>
                <a href="<?php echo U('Home/Electricity/index');?>" class="weui-grid">
                    <div class="weui-grid__icon">
                        <img src="/Public/images/df.png" alt="">
                    </div>
                    <p class="weui-grid__label">用电查询</p>
                </a>
                <a href="<?php echo U('Home/BookRetrieval/index');?>" class="weui-grid">
                    <div class="weui-grid__icon">
                        <img src="/Public/images/ts.png" alt="">
                    </div>
                    <p class="weui-grid__label">图书馆</p>
                </a>
                <a href="javascript:;" class="weui-grid">
                    <div class="weui-grid__icon">
                        <img src="/Public/images/ykt.png" alt="">
                    </div>
                    <p class="weui-grid__label">一卡通挂失</p>
                </a>
                <a href="javascript:;" class="weui-grid">
                    <div class="weui-grid__icon">
                        <img src="/Public/images/mm.png" alt="">
                    </div>
                    <p class="weui-grid__label">修改密码</p>
                </a>
                <a href="javascript:;" class="weui-grid">
                    <div class="weui-grid__icon">
                        <img src="/Public/images/icon_tabbar.png" alt="">
                    </div>
                    <p class="weui-grid__label">Grid</p>
                </a>
                <a href="javascript:;" class="weui-grid">
                    <div class="weui-grid__icon">
                        <img src="/Public/images/icon_tabbar.png" alt="">
                    </div>
                    <p class="weui-grid__label">Grid</p>
                </a>
                <a href="javascript:;" class="weui-grid">
                    <div class="weui-grid__icon">
                        <img src="/Public/images/icon_tabbar.png" alt="">
                    </div>
                    <p class="weui-grid__label">Grid</p>
                </a>

            </div>
        </div>
    </div>

<!-- footer start -->

<div class="weui-footer weui-footer_fixed-bottom">
    <p class="weui-footer__links">
        <a href="javascript:home();" class="weui-footer__link">湘农青年</a>
    </p>
    <p class="weui-footer__text">Copyright © 2008-2016 weui.io</p>
</div>
</div>
<script type="text/javascript" src="http://cdn.amazeui.org/amazeui/2.7.2/js/amazeui.min.js"></script>
</body>
</html>
<!-- footer end -->