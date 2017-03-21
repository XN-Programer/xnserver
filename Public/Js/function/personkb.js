/**
 * Created by liwei on 2017/3/20.
 */
$(function () {
    $(document).ready(function () {
        var html = '<caption>选修课表</caption>';
            html += '<tr><td>日</td><td>一</td><td>二</td><td>三</td><td>四</td><td>五</td><td>六</td></tr>';
            html += '<tr><td>第一大节</td><td colspan="6">test</td></tr>';
            html += '<tr><td>第二大节</td><td colspan="6">test</td></tr>';
            html += '<tr><td>第三大节</td><td colspan="6">test</td></tr>';
            html += '<tr><td>第四大节</td><td colspan="6">test</td></tr>';
            html += '<tr><td>第五大节</td><td colspan="6">test</td></tr>';
            html += '<tr><td>第六大节</td><td colspan="6">test</td></tr>';
        $('#show_kb').html(html);
    });

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
            defaultValue: [3],
            onChange: function (result) {
//                    console.log(result)
            },
            onConfirm: function (result) {
//                    console.log(result)
            },
            id: 'singleLinePicker'
        });
    });



});