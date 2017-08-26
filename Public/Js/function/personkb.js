/**
 * Created by liwei on 2017/3/20.
 */
$(function () {

            /*
             * 说明：
             * 一周的起始计算方式不同国家有所不同，很多其他国家将周日作为一周的开始
             * 本代码使用中国习惯，将周一作为每周的开始
             * 特此说明
             */
    function TodayInfo(start) {
        var WEEKLEN = 7, // 一周7天为常量
            WEEKDAYS = ["日", "一", "二", "三", "四", "五", "六"],
            weekInfo = {"week": null, "day": null}, // 初始化返回信息，默认第null周，星期null
            oneDay = 24 * 60 * 60 * 1000, // 一天的毫秒时长
            weekLeave, // 开学当天所在周剩余天数
            weekStart, // 开学当天start是星期几
            today, // 今天
            dateDiff, // 今天与开学当天日期差
            sDate; //开学之日，日期对象
        var rDateStr = /\d{4}[\/-]\d{1,2}[\/-]\d{1,2}/g; // 简单的日期格式校验：2013/12/19
        if (!rDateStr.test(start)) {
            alert("请使用合法的开学日期！！！");
            return weekInfo;
        }
        sDate = new Date(start.replace("-", "/"));
        weekStart = sDate.getDay();
        weekStart = weekStart === 0 ? 7 : weekStart; // JS中周日的索引为0，这里转换为7，方便计算

        weekLeave = WEEKLEN - weekStart;
        today = new Date();
        weekInfo.day = WEEKDAYS[today.getDay()];
        today = new Date(today.getFullYear() + "/" + (today.getMonth() + 1) + "/" + today.getDate());
        dateDiff = today - sDate;
        if (dateDiff < 0) {
            alert("别开玩笑了，你还没开学呢！！！");
            return weekInfo;
        }
        dateDiff = parseInt(dateDiff / oneDay);
        weekInfo.week = Math.ceil((dateDiff - weekLeave) / WEEKLEN) + 1;
        return weekInfo;
    }

            var startYear = mydata['begindate'].toString().substr(0, 4);
            var startMonth = mydata['begindate'].toString().substr(4, 2);
            var startDay = mydata['begindate'].toString().substr(6, 2);
            var startDate = startYear + '/' + startMonth + '/' + startDay;
            var td = TodayInfo(startDate);
            $('.placeholder a').text('第' + td.week + '周');
            showkb(td.week);

    function showkb(week) {
        $.post(handUrl, { week: week},
            function (data) {
                if(data == null) {
                    alert('没有查询到课程');
                } else {
                    $('.sunkb > *').remove();
                    $('.monkb > *').remove();
                    $('.tuekb > *').remove();
                    $('.wedkb > *').remove();
                    $('.thukb > *').remove();
                    $('.frikb > *').remove();
                    $('.satkb > *').remove();
                    $(data).each(function (i, v) {
                       if(v.section == '星期一') {
                       var html = '<hr>';
                           html += '<div class="am-g"  id="jiec1">';
                           html += '<div class="am-u-sm-3">第' + v.JieC + '</div>';
                           html += '<div class="am-u-sm-9">';
                           html += '<div class="coursename">' + v.CourseName + '</div>';
                           html += '<hr>';
                           html += '<div class="address">' + v.JiaoS + '</div>';
                           html += '</div>';
                           html += '</div>';
                           html += '<hr >';
                           html += '</div>';
                           $('.monkb').append(html);
                       }
                        if(v.section == '星期二') {
                            var html = '<hr>';
                            html += '<div class="am-g"  id="jiec1">';
                            html += '<div class="am-u-sm-3">第' + v.JieC + '</div>';
                            html += '<div class="am-u-sm-9">';
                            html += '<div class="coursename">' + v.CourseName + '</div>';
                            html += '<hr>';
                            html += '<div class="address">' + v.JiaoS + '</div>';
                            html += '</div>';
                            html += '</div>';
                            html += '<hr >';
                            $('.tuekb').append(html);
                        }
                        if(v.section == '星期三') {
                            var html = '<hr>';
                            html += '<div class="am-g"  id="jiec1">';
                            html += '<div class="am-u-sm-3">第' + v.JieC + '</div>';
                            html += '<div class="am-u-sm-9">';
                            html += '<div class="coursename">' + v.CourseName + '</div>';
                            html += '<hr>';
                            html += '<div class="address">' + v.JiaoS + '</div>';
                            html += '</div>';
                            html += '</div>';
                            html += '<hr >';
                            $('.wedkb').append(html);
                        }
                        if(v.section == '星期四') {
                            var html = '<hr>';
                            html += '<div class="am-g"  id="jiec1">';
                            html += '<div class="am-u-sm-3">第' + v.JieC + '</div>';
                            html += '<div class="am-u-sm-9">';
                            html += '<div class="coursename">' + v.CourseName + '</div>';
                            html += '<hr>';
                            html += '<div class="address">' + v.JiaoS + '</div>';
                            html += '</div>';
                            html += '</div>';
                            html += '<hr >';
                            $('.thukb').append(html);
                        }
                        if(v.section == '星期五') {
                            var html = '<hr>';
                            html += '<div class="am-g"  id="jiec1">';
                            html += '<div class="am-u-sm-3">第' + v.JieC + '</div>';
                            html += '<div class="am-u-sm-9">';
                            html += '<div class="coursename">' + v.CourseName + '</div>';
                            html += '<hr>';
                            html += '<div class="address">' + v.JiaoS + '</div>';
                            html += '</div>';
                            html += '</div>';
                            html += '<hr >';
                            $('.frikb').append(html);
                        }
                        if(v.section == '星期六') {
                            var html = '<hr>';
                            html += '<div class="am-g"  id="jiec1">';
                            html += '<div class="am-u-sm-3">第' + v.JieC + '</div>';
                            html += '<div class="am-u-sm-9">';
                            html += '<div class="coursename">' + v.CourseName + '</div>';
                            html += '<hr>';
                            html += '<div class="address">' + v.JiaoS + '</div>';
                            html += '</div>';
                            html += '</div>';
                            html += '<hr >';
                            $('.satkb').append(html);
                        }
                        if(v.section == '星期日') {
                            var html = '<hr>';
                            html += '<div class="am-g"  id="jiec1">';
                            html += '<div class="am-u-sm-3">第' + v.JieC + '</div>';
                            html += '<div class="am-u-sm-9">';
                            html += '<div class="coursename">' + v.CourseName + '</div>';
                            html += '<hr>';
                            html += '<div class="address">' + v.JiaoS + '</div>';
                            html += '</div>';
                            html += '</div>';
                            html += '<hr >';
                            $('.sunkb').append(html);
                        }
                    });
                }

            }, 'json');
    }
    
    $('#showPicker').on('click', function () {
        weui.picker([
            {
                label: '第1周',
                value: 0
//                    disabled: true // 不可用
            },
            {
                label: '第2周',
                value: 1
            },
            {
                label: '第3周',
                value: 2
            },
            {
                label: '第4周',
                value: 3
            },
            {
                label: '第5周',
                value: 4
            },
            {
                label: '第6周',
                value: 5
            },
            {
                label: '第7周',
                value: 6
            },
            {
                label: '第8周',
                value: 7
            },
            {
                label: '第9周',
                value: 8
            },
            {
                label: '第10周',
                value: 9
            },
            {
                label: '第11周',
                value: 10
            },
            {
                label: '第12周',
                value: 11
            },
            {
                label: '第13周',
                value: 12
            },
            {
                label: '第14周',
                value: 13
            },
            {
                label: '第15周',
                value: 14
            },
            {
                label: '第16周',
                value: 15
            },
            {
                label: '第17周',
                value: 16
            },
            {
                label: '第18周',
                value: 17
            },
            {
                label: '第19周',
                value: 18
            },
            {
                label: '第20周',
                value: 19
            },
            {
                label: '第21周',
                value: 20
            }
        ], {
            className: 'custom-classname',
            defaultValue: [td.week - 1],
            onChange: function (result) {
                $('.placeholder a').text(result[0].label);
            },
            onConfirm: function (result) {
                $('.placeholder a').text(result[0].label);
                showkb(result[0].value+1);
            },
            id: 'singleLinePicker'
        });
    });

});