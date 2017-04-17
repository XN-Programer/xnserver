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
<script type="text/javascript">
    var handUrl = '<?php echo U("Home/CSchedule/handlepersonkb", '', '');?>';
    var mydata = [];
    mydata['begindate'] = <?php echo ($kb["begindate"]); ?>;
    mydata['enddate'] = <?php echo ($kb["enddate"]); ?>;
    mydata['nowdate'] = '<?php echo ($kb["month"]); ?>';
</script>
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
            <div class="weui-flex__item"><div class="placeholder"><?php echo ($kb["name"]); ?></div></div>
            <div class="weui-flex__item"><div class="placeholder"><?php echo ($kb["month"]); ?></div></div>
            <div class="weui-flex__item">
                <div class="placeholder">
                    <a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_default" id="showPicker"></a>
                </div>
            </div>
        </div>

        <div class="am-tabs" id="doc-my-tabs">
            <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
                <li class="am-active"><a href="">日</a></li>
                <li><a href="">一</a></li>
                <li><a href="">二</a></li>
                <li><a href="">三</a></li>
                <li><a href="">四</a></li>
                <li><a href="">五</a></li>
                <li><a href="">六</a></li>
            </ul>
            <div class="am-tabs-bd">
                <div class="am-tab-panel am-active">
                    <div class="am-container sunkb">

                    </div>
                </div>
                <div class="am-tab-panel">
                    <div class="am-container monkb">

                    </div>
                </div>
                <div class="am-tab-panel">
                    <div class="am-container tuekb">

                    </div>
                </div>
                <div class="am-tab-panel">
                    <div class="am-container wedkb">

                    </div>
                </div>
                <div class="am-tab-panel">
                    <div class="am-container thukb">

                    </div>
                </div>
                <div class="am-tab-panel">
                    <div class="am-container frikb">

                    </div>
                </div>
                <div class="am-tab-panel">
                    <div class="am-container satkb">

                    </div>
                </div>
            </div>
        </div>
    </div>




    <script>
        $(function() {
            $('#doc-my-tabs').tabs();
        })
    </script>


    <script type="text/javascript" src="http://cdn.amazeui.org/amazeui/2.7.2/js/amazeui.min.js"></script>
    <script type="text/javascript" src="/Public/Js/weui.min.js"></script>
    <script type="text/javascript" src="/Public/Js/function/personkb.js"></script>
    <script type="text/javascript" src="/Public/Js/weui.min.js"></script>
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