(function () {
    $(function () {
        getUser(get_user);
        getApartment(get_apartment);
    })
})();
// 最后写初始化函数
// 标签页间跳转要处理，禁止跳转
$(function () {
    // 新建或修改用户 
    var user_post_flag = false;
    $("#upd-user").click(function () {
        var telphone = $("#telphone").val();
        var hostel = $("#hostel").val();
        var hostel_number = $("#hostel_number").val();
        $.ajax({
            url: upd_user,
            type: "POST",
            data: {
                phone: telphone,
                apartment: hostel,
                address: hostel_number,
            },
            beforeSend: function () {
                if (!telphone || !/1[3|4|5|7|8]\d{9}/.test(telphone)) {
                    $.toast("请输入正确手机号", "cancel", function (toast) { });
                    return false;
                }
                if (hostel == '') {
                    $.toast("请选择宿舍园区", "cancel", function (toast) { });
                    return false;
                }
                if (hostel_number == '') {
                    $.toast("请输入寝室地址", "cancel", function (toast) { });
                    return false;
                }
                // 避免重复提交
                if (user_post_flag) {
                    return false;
                }
                user_post_flag = true;
            },
            success: function (response) {
                // 判断是否插入成功
                if (response.success == 'Success') {
                    $.toast("绑定成功", "success", function (toast) {
                        window.location.href = window.location.href;
                    });
                } else {
                    $.toast("数据有误，请重试！", "cancel", function (toast) { });
                }
            },
            complete: function () {
                user_post_flag = false;
            }
        });
    });
    // 提交报修单
    var net_post_flag = false;
    $("#upd-net").click(function () {
        var yunys = $('#yunys').val();
        var yy_time = $('#yy_time').val();
        var ProText = $('#ProText').val();
        $.ajax({
            url: net_list_create,
            type: "POST",
            data: {
                server: yunys,
                order_time: yy_time,
                desc: ProText,
            },
            beforeSend: function () {
                if (yunys == '') {
                    $.toptip('请选择运营商');
                    return false;
                }
                if (yy_time == '') {
                    $.toptip('请选择时间段');
                    return false;
                }
                // 避免重复提交
                if (net_post_flag) {
                    return false;
                }
                net_post_flag = true;
            },
            success: function (response) {
                // 判断是否插入成功
                if (response.success == 'Success') {
                    $.toast("提交成功", "success", function (toast) {
                        window.location.href = window.location.href;
                    });
                } else {
                    $.toast("数据有误，请重试！", "cancel", function (toast) { });
                }
            },
            complete: function () {
                net_post_flag = false;
            }
        });
    });
});


// 已报修获取报修单数据
function getNetList(url) {
    $.ajax({
        url: url,
        type: "GET",
        success: function (response) {
            if(response.success == 'Success'){
                net = response.data;
                $("#read_hostel").html(net.apartment);
                $("#read_phone").html(net.phone);
                $("#read_address").html(net.address);
                $("#read_yunys").html(net.server);
                $("#rear_yy_time").html(net.order_time);
                $("#read_ProText").html(net.desc);
            }
        },
        error: function () {
            $.toast("数据加载失败,请稍后重试！", "cancel", function (toast) { });
        },
    });
}
// 获取当前登录用户数据
function getUser(url) {
    $.ajax({
        url: url,
        type: "GET",
        success: function (response) {
            user = response.data;
            $("#name").html(user.name);
            $("#stu_code").html(user.stu_code);
            // 判断是否已绑定信息
            if (response.success == 'Success') {
                // 个人资料相关
                upd_user = user_update;
                $("#telphone").val(user.phone);
                $("#hostel").val(user.apartment);
                $("#hostel_number").val(user.address);
                //报修相关
                if (user.data_state == 2) {//已报修：
                    getNetList(get_net_list);
                    skip("tab2");
                }
                //被禁用 3
            } else {
                upd_user = user_create;
                $.toast("请绑定个人信息", "cancel", function (toast) { });
                skip("tab3");
            }
        },
        error: function () {
            $.toast("数据加载失败,请稍后重试！", "cancel", function (toast) { });
        },
    });
}
// 获取公寓
function getApartment(url) {
    $.ajax({
        url: url,
        type: "GET",
        success: function (response) {
            var Apartments = new Array();
            $.each(response, function (index, value) {
                Apartments[index] = value.name;
            });
            $("#hostel").picker({
                title: "请选择园区",
                cols: [
                    {
                        textAlign: 'center',
                        values: Apartments,
                    }
                ]
            });
        },
        error: function () {
            $.toast("数据加载失败,请稍后重试！", "cancel", function (toast) { });
        },
    });
}

// 跳转函数
function skip(tab) {
    $(".weui-bar__item--on").removeClass("weui-bar__item--on");
    $(".weui-tab__bd-item--active").removeClass("weui-tab__bd-item--active");
    $("a[href='#" + tab + "']").addClass("weui-bar__item--on");
    $("#" + tab).addClass("weui-tab__bd-item--active");
}

// 第一版面JQ
$("#yunys").picker({
    title: "请选择运营商",
    cols: [
        {
            textAlign: 'center',
            // values: ['校园网', '联通', '电信', '移动']
            values: ['校园网'],
        }
    ]
});
$("#yy_time").picker({
    title: "请选择时间段",
    cols: [
        {
            textAlign: 'center',
            values: ['12:30--14:00', '18:30--20:00', '其他时间']
        }
    ]
});

// 第二版面JQ
$('#re-baoxiu').click(function () {
    $(".weui-tabbar").hide();
});
$("#yunys-re").picker({
    title: "请选择运营商",
    cols: [
        {
            textAlign: 'center',
            values: ['校园网', '联通', '电信', '移动']
        }
    ]
});
$("#yy_time-re").picker({
    title: "请选择时间段",
    cols: [
        {
            textAlign: 'center',
            values: ['12:30--14:00', '18:30--20:00', '其他时间']
        }
    ]
});
$("#re-tip").click(function () {

    var yunys = $('#yunys-re').val();
    var yy_time = $('#yy_time-re').val();
    var ProText = $('#ProText-re').val();


    if (yunys == '') {
        $.toast("请选择运营商", "cancel", function (toast) {
            console.log(toast);
        });
    }
    else if (yy_time == '') {
        $.toast("请选择时间段", "cancel", function (toast) {
            console.log(toast);
        });
    }
    else if (ProText == '') {
        $.toast("请描述故障问题", "cancel", function (toast) {
            console.log(toast);
        });
    }
    else $.toast("绑定成功", function () {
        console.log('close');
    });
    $('.weui-tabbar').show();
});



// 第三版面JQ
$("#re-bangding").click(function () {
    $('.weui-tabbar').hide();
});

$("#close-popup").click(function () {
    var hostel_Number = $('#hostel_number').val();
    var hostel_room = $('#hostel_room').val();
    var tel = $('#telphone').val();
    var hostel = $('#hostel').val();
    if (!tel || !/1[3|4|5|7|8]\d{9}/.test(tel)) {
        $.toast("请输入手机号", "cancel", function (toast) {
            console.log(toast);
        });
    }
    else if (hostel == '') {
        $.toast("请选择宿舍园区", "cancel", function (toast) {
            console.log(toast);
        });
    }
    else if (hostel_Number == '') {
        $.toast("请输入寝室地址", "cancel", function (toast) {
            console.log(toast);
        });
    }
    else $.toast("绑定成功", function () {
        console.log('close');
    });
    $('.weui-tabbar').show();
});
