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

    <div class="weui-cells">
            <a class="weui-cell weui-cell_access per_sent-btn" href="<?php echo U('Home/CSchedule/personkb');?>">
                <div class="weui-cell__hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=" alt="" style="width:20px;margin-right:5px;display:block"></div>
                <div class="weui-cell__bd">
                    <p>个人课表查询</p>
                </div>
                <div class="weui-cell__ft">这里只能查询选修课</div>
            </a>

            <a class="weui-cell weui-cell_access class_sent-btn" href="javascript:;">
                <div class="weui-cell__hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=" alt="" style="width:20px;margin-right:5px;display:block"></div>
                <div class="weui-cell__bd">
                        <p>班级课表查询</p>
                </div>
                <div class="weui-cell__ft">这里可查询班级课表</div>
            </a>
    </div>

    <script type="text/javascript">
        var handUrl = '<?php echo U("Home/CSscedule/personkb", '', '');?>';
    </script>
    <script type="text/javascript" src="/Public/Js/schedule.js"></script>
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