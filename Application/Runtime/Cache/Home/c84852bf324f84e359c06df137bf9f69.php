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
    var handUrl = '<?php echo U("Home/Electricity/getApart", '', '');?>';
    var dfUrl = '<?php echo U("Home/Electricity/EnergyQuery", '', '');?>';
    var QSUrl = '<?php echo U("Home/Electricity/QuerySurplus", '', '');?>';
</script>
<script type="text/javascript" src="/Public/JS/function/electricity.js"></script>
<div class="container">
    <div class="page__hd">
        <div id="logopic"></div>
        <div id="introduce">
            <h3>湖南农业大学欢迎你</h3>
            <p>湘农青年&nbsp;校园服务</p>
        </div>
    </div>

    <div class="page__hd">
        <div class="weui-cells">
            <a class="weui-cell weui-cell_access" href="javascript:;" id="showDatePicker">
                <div class="weui-cell__bd" id="mydate">
                </div>
                <div class="weui-cell__ft">日期</div>
            </a>

            <div class="weui-cell weui-cell_select weui-cell_select-after">
                <div class="weui-cell__hd">
                    <label for="" class="weui-label">公寓</label>
                </div>
                <div class="weui-cell__bd" id="showApart">
                    <select class="weui-select" id="Apart" onchange="getBuild(this.value)"></select>
                </div>
            </div>
            <div class="weui-cell weui-cell_select weui-cell_select-after">
                <div class="weui-cell__hd">
                    <label for="" class="weui-label">楼栋</label>
                </div>
                <div class="weui-cell__bd" id="showBuild">
                    <select class="weui-select" id="Build" onchange="getFloor(this.value)"></select>
                </div>
            </div>
            <div class="weui-cell weui-cell_select weui-cell_select-after">
                <div class="weui-cell__hd">
                    <label for="" class="weui-label">楼层</label>
                </div>
                <div class="weui-cell__bd" id="showFloor">
                    <select class="weui-select" id="Floor" onchange="getRoom(this.value)"></select>
                </div>
            </div>
            <div class="weui-cell weui-cell_select weui-cell_select-after">
                <div class="weui-cell__hd">
                    <label for="" class="weui-label">宿舍</label>
                </div>
                <div class="weui-cell__bd" id="showRoom">
                    <select class="weui-select" id="Room">
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="weui-btn-area">
        <a class="weui-btn weui-btn_primary sent-btn" href="javascript:" id="showDf" onclick="showDf()">确定</a>
    </div>

    <div class="am-popup" id="my-popup">
        <div class="am-popup-inner">
            <div class="am-popup-hd">
                <h4 class="am-popup-title">用电详情</h4>
                <span data-am-modal-close
                      class="am-close">&times;</span>
            </div>
            <div class="am-popup-bd">
                <table class="am-table am-table-bordered am-table-radius am-table-striped" >
                    <caption id='curdate'></caption>
                    <thead><tr><th>日</th><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th>六</th></tr></thead>
                    <tbody id="df">

                    </tbody>
                </table>
                <table class="am-table am-table-bordered am-table-radius am-table-striped" >
                    <tbody id="xq">
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#showDatePicker').on('click', function () {
            weui.datePicker({
                start: 2012,
                end: new Date(),
                defaultValue: [new Date().getFullYear(), new Date().getMonth() + 1, new Date().getDate()],
                onChange: function(result){
                    var myday = result[0].value + '-' + result[1].value;
                    $('#mydate').text(myday);
                },
                onConfirm: function(result){
                    var myday = result[0].value + '-' + result[1].value;
                    $('#mydate').text(myday);
                },
                id: 'datePicker'
            });
        });

        var today = new Date();
        today = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
        $('#mydate').html(today);
    </script>

    <script type="text/javascript" src="http://cdn.amazeui.org/amazeui/2.7.2/js/amazeui.min.js"></script>
    <script type="text/javascript" src="/Public/Js/weui.min.js"></script>