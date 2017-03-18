<?php if (!defined('THINK_PATH')) exit();?><!-- header start -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">-->
    <title>校园服务</title>
    <!-- 引入 WeUI -->
    <link rel="stylesheet" href="/Public/Css/weui.min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Css/style.css" />
    <?php if(!empty($data)): ?><link rel="stylesheet" type="text/css" href="/Public/Css/bootstrap.min.css" /><?php endif; ?>

</head>
<body>

<!-- header end -->
<div>
    <div class="page__hd">
        <div id="logopic"></div>
        <div id="introduce">
            <h3>湖南农业大学欢迎你</h3>
            <p>湘农青年&nbsp;校园服务</p>
        </div>
    </div>

    <div class="page__bd">
        <div class="bd__header">
            <h3>学生成绩查询</h3>
        </div>
    </div>

    <div class="weui-cell weui-cell_select weui-cell_select-after">
            <div class="weui-cell__hd">
                <label for="" class="weui-label">学年</label>
            </div>
            <div class="weui-cell__bd">
                <select class="weui-select" name="select2">
                    <option value="1">2014-2015</option>
                    <option value="2">2015-2016</option>
                    <option value="3">2016-2017</option>
                </select>
            </div>
    </div>
    <div class="weui-cell weui-cell_select weui-cell_select-after">
            <div class="weui-cell__hd">
                <label for="" class="weui-label">学期</label>
            </div>
            <div class="weui-cell__bd">
                <select class="weui-select" name="select2">
                    <option value="1">春季</option>
                    <option value="2">秋季</option>
                </select>
            </div>
    </div>

    <div class="weui-btn-area">
        <a class="weui-btn weui-btn_primary" href="javascript:" id="showTooltips">确定</a>
    </div>

    <!-- <table class="table table-striped">
        <caption><h2><?php echo ($data['rList'][0]['XM']); ?> : <?php echo ($data['rList'][0]['XH']); ?></h2></caption>
        <?php if(is_array($data["rList"])): foreach($data["rList"] as $key=>$v): ?><tr>
                <td colspan="2">学年</td>
                <td><?php echo ($v["XN"]); ?></td>
                <td>学期</td>
                <td colspan="2"><?php echo ($v["XQ"]); ?></td>
            </tr>
            <tr>
                <td colspan="3">课程名</td>
                <td colspan="3"><?php echo ($v["KCMC"]); ?></td>
            </tr>
            <tr>
                <td>成绩</td>
                <td><?php echo ($v["CJ"]); ?></td>
                <td>学分</td>
                <td><?php echo ($v["XF"]); ?></td>
                <td>课程性质</td>
                <td><?php echo ($v["KCXZ"]); ?></td>
            </tr><?php endforeach; endif; ?>
        <thead>
        <tr>
            <th>名称</th>
            <th>城市</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Tanmay</td>
            <td>Bangalore</td>
        </tr>
        <tr>
            <td>Sachin</td>
            <td>Mumbai</td>
        </tr>
        </tbody>
    
    </table> -->


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