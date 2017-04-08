/**
 * Created by liwei on 2017/3/23.
 */
(function () {
    getApart();
})();


    function getApart () {
        var PriDormID = "CPES_LC";
        $.post(handUrl, {PriDormId: PriDormID}, function (data) {
            var html = '';
            $(data).each(function (i, v) {
                html += '<option value="' + v.DormId + '">' + v.DormName + '</option>';
            });
            $('#Apart').html(html);
            var PriDormID = $('#Apart').val();
            getBuild(PriDormID);
        }, 'json');
    }

    function getBuild (PriDormID) {
        $.post(handUrl, {PriDormId: PriDormID}, function (data) {
            var html = '';
            $(data).each(function (i, v) {
                html += '<option value="' + v.DormId + '">' + v.DormName + '</option>';
            });
            $('#Build').html(html);
            var PriDormID = $('#Build').val();
            getFloor(PriDormID);
        }, 'json');
    }

    function getFloor (PriDormID) {
        $.post(handUrl, {PriDormId: PriDormID}, function (data) {
            var html = '';
            $(data).each(function (i, v) {
                html += '<option value="' + v.DormId + '">' + v.DormName + '</option>';
            });
            $('#Floor').html(html);
            var PriDormID = $('#Floor').val();
            getRoom(PriDormID);
        }, 'json');
    }

    function getRoom (PriDormID) {
        $.post(handUrl, {PriDormId: PriDormID}, function (data) {
            var html = '';
            $(data).each(function (i, v) {
                html += '<option value="' + v.DormId + '">' + v.DormName + '</option>';
            });
            $('#Room').html(html);
        }, 'json');
    }
    
    function showDf() {
        var Room = $('#Room').val();
        var Time = $('#mydate').text();
            Time = new Date(Date.parse(Time.replace(/-/g, "/")));
        Time = Time.getFullYear() + '-' + (Time.getMonth()+1);
        $.post(dfUrl, {Room: Room, Time: Time}, function(data) {
            showTable(Time, data);
        }, 'json');

    }


    function showTable(date, data) {
        today = new Date();
        var y = today.getFullYear(); //获取日期中的年份
        var m = today.getMonth();   //获取日期中的月份(需要注意的是：月份是从0开始计算，获取的值比正常月份的值少1)
        var d = today.getDate(); //获取日期中的日(方便在建立日期表格时高亮显示当天)
        date = y+'-'+(m+1);
        html = Number(y) + '年' + Number(m+1) + '月用电详情';
        $('caption').html(html);
        var firstday = new Date(y, m, 1); //获取当月的第一天
        var dayOfWeek = firstday.getDay(); //判断第一天是星期几(返回[0-6]中的一个，0代表星期天，1代表星期一，以此类推)
        var days_per_month = new Array(31, 28 + isLeap(y), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);         //创建月份数组
        var str_nums = Math.ceil((dayOfWeek + days_per_month[m]) / 7);   //确定日期表格所需的行数
        var html = '';
        for (var i = 0; i < str_nums; i += 1) {         //二维数组创建日期表格
            html += '<tr>';
            for (var k = 0; k < 7; k++) {
                var idx = 7 * i + k;                //为每个表格创建索引,从0开始
                var date = idx - dayOfWeek + 1;          //将当月的1号与星期进行匹配
                (date <= 0 || date > days_per_month[m]) ? date = ' ': date = idx - dayOfWeek + 1;  //索引小于等于0或者大于月份最大值就用空表格代替
                var row = ".row"+i;
                var D = Number(date) > 9 ? date : ("0" + date);
                var Ydl = "";
                var nMonth = m+1;
                var nMonth = nMonth > 9 ? nMonth : ("0" + nMonth);
                var nMonth = nMonth + "-" + D;
                var nDate = y + "-" + nMonth;
                $.each(data.consumer_records, function(i, n){

                    if (nDate == n.consumer_date) {
                        Ydl = n.used_energy;
                    }
                });
                html += '<td>' + date + '<br/>' + '<b>' + Ydl + '</b>' + '</td>';
            }
            html += '</tr>';
        }
        $('#df').html(html);
        html = '';
        if(data.pay_records.length > 0) {
            $.each(data.pay_records, function (i, v) {
                html += '<br />';
                html += '<tr>';
                html += '<td>充值时间</td>';
                html += '<td>' + v.pay_time + '</td>';
                html += '</tr>';
                html += '<tr>';
                html += '<td>充值金额</td>';
                html += '<td>' + v.pay_amount + ' 元</td>';
                html += '</tr>';
                html += '<tr>';
                html += '<td>充值方式</td>';
                html += '<td>' + v.pay_type + '</td>';
                html += '</tr>';
                html += '<tr>';
                html += '<td>购电人</td>';
                html += '<td>' + v.pay_person + '</td>';
                html += '</tr>';
            });
        }else {
            html += '<br />';
            html += '<tr>';
            html += '<td>充值时间</td>';
            html += '<td>暂无记录</td>';
            html += '</tr>';
            html += '<tr>';
            html += '<td>充值金额</td>';
            html += '<td>暂无记录</td>';
            html += '</tr>';
            html += '<tr>';
            html += '<td>充值方式</td>';
            html += '<td>暂无记录</td>';
            html += '</tr>';
            html += '<tr>';
            html += '<td>购电人</td>';
            html += '<td>暂无记录</td>';
            html += '</tr>';
        }
        $('#xq').html(html);
        $.post(QSUrl, {Time: date, Room: $('#Room').val()}, function(data) {
            html = '<tr>';
            html += '<td>剩余金额</td>';
            html += '<td>' + data.current_balance + ' 元</td>';
            html += '</tr>';
            html += '<tr>';
            html += '<td>当前电价</td>';
            html += '<td>0.64元</td>';
            html += '</tr>';
            $('#xq').append(html);
        }, 'json');
        $('#my-popup').modal(true);
    }


    function isLeap(year) {
        return year % 4 == 0 ? (year % 100 != 0 ? 1 : (year % 400 == 0 ? 1 : 0)) : 0;
    }

