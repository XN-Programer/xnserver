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

    <form action="">
        <div class="weui-cell weui-cell_select weui-cell_select-after">
            <div class="weui-cell__hd">
                <label for="" class="weui-label">学年</label>
            </div>
            <div class="weui-cell__bd">
                <select class="weui-select" id="xn" name="xn">
                    <?php if(is_array($xn)): foreach($xn as $k=>$v): ?><option value="<?php echo ($k); ?>"><?php echo ($v); ?></option><?php endforeach; endif; ?>
                </select>
            </div>
        </div>
        <div class="weui-cell weui-cell_select weui-cell_select-after">
                <div class="weui-cell__hd">
                    <label for="" class="weui-label">学期</label>
                </div>
                <div class="weui-cell__bd">
                    <select class="weui-select" id="xq" name="xq">
                        <option value="0">请选择学期</option>
                        <option value="1">春季</option>
                        <option value="2">秋季</option>
                    </select>
                </div>
        </div>

        <div class="weui-btn-area">
            <a class="weui-btn weui-btn_primary sent-btn" href="javascript:" >确定</a>
        </div>
    </form>
    <div class="am-popup" id="my-popup">
      <div class="am-popup-inner">
        <div class="am-popup-hd">
          <h4 class="am-popup-title">学生成绩查询</h4>
          <span data-am-modal-close
                class="am-close">&times;</span>
        </div>
        <div class="am-popup-bd">
            <table class="am-table am-table-bordered am-table-radius am-table-striped" id="showCj">
            </table>
        </div>
      </div>
    </div>



<script type="text/javascript" src="http://cdn.amazeui.org/amazeui/2.7.2/js/amazeui.min.js"></script>   
<script type="text/javascript">
        var handUrl = '<?php echo U("Home/Score/handle", '', '');?>';
</script>
<script type="text/javascript" src="/Public/Js/function/scorefunction.js"></script>
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