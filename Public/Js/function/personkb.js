/**
 * Created by liwei on 2017/3/20.
 */
$(function () {
    $('#showPicker').on('click', function () {
        weui.picker([
            {
                label: '飞机票',
                value: 0
//                    disabled: true // 不可用
            },
            {
                label: '火车票',
                value: 1
            },
            {
                label: '汽车票',
                value: 3
            },
            {
                label: '公车票',
                value: 4,
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