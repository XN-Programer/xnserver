(function () {
    $(function () {
        var action = "create";  //用action判断是新建还是修改
        // 显示当前搜索文字
        if (wordJson != "[]") {
            var wordObj = eval('(' + wordJson + ')')
            $("input[name='word']").val(wordObj);
        }
        // 显示当前筛选
        if (searchJson != "[]") {
            var searchObj = eval('(' + searchJson + ')');
            for (value in searchObj) {
                $("select[name='" + value + "']").val(searchObj[value]);
            }
        }
        // 添加管理员
        $("#create-net-list").bind("click", function () {
            action = "create";
            // 清空
            $("#aId").val("");
            $("#apartment").val("1");// 选中第一个option或不选
            $("#address").val("");
            // $("#username").val("");
            // $("#phone").val("");
            $("#order_time").val("1");
            $("#admin").val("1");
            $("#desc").val("");
            dealRadio("data_state", 1);//清空radio，并选第一个
        });
        $.each($(".update-net-list"), function (index, value) {
            // 修改故障单
            var row = $(value).parent().parent(".row");
            $(value).click(function () {
                action = "update";
                // 注意：此时row是jquery对象，有attr等方法，不是元素节点
                // 传值
                $("#nId").val(row.children(".nId").text());
                $("#apartment").val(row.children(".apartment").children("span").text());
                $("#address").val(row.children(".address").text());
                // $("#username").val(row.find(".username").text());
                // $("#phone").val(row.find(".phone").text());
                $("#order_time").val(row.children(".order_time").children("span").text());
                $("#admin").val(row.children(".admin").children("span").text());
                var radioId = row.children(".data_state").children("span").text();
                dealRadio("data_state", radioId);
            });
            // 删除故障单
            $(value).next(".delete-net-list").click(function () {
                $("#nId").val(row.children(".nId").text());
            });
            // 完成故障单
            $(value).prev(".finishe-net-list").click(function () {
                $("#nId").val(row.children(".nId").text());
                var fin_post_flag = false;
                finish_net_list(fin_post_flag);
            });
        });
        // 提交完成
        function finish_net_list(fin_post_flag) {
            var data = {
                id: $("#nId").val(),
                data_state: 2,
            };
            $.ajax({
                type: "POST",
                url: update_net_list,
                data: data,
                beforeSend: function () {
                    if (data.id == '') {
                        return false;
                    }
                    if (fin_post_flag) {
                        return false;
                    }
                    fin_post_flag = true;
                },
                success: function (response) {
                    if (response.success == "Success") {
                        window.location.href = window.location.href;
                    } else {
                        alert("数据有误，请修改后重试！");
                    }
                },
                error: function () {
                    alert("网络原因，请稍后重试！");
                },
                complete: function () {
                    fin_post_flag = false;
                }
            });
        }
        // 提交删除
        var del_post_flag = false;
        $("#delete").bind("click", function () {
            var id = $("#nId").val();
            $.ajax({
                type: "POST",
                url: delete_net_list,
                data: { id: id },   //一定要有key键值！
                beforeSend: function () {
                    if (id == '') {
                        return false;
                    }
                    if (del_post_flag) {
                        return false;
                    }
                    del_post_flag = true;
                },
                success: function (response) {
                    if (response.success == "Success") {
                        // window.location.href = window.location.href;
                    } else {
                        // alert("数据有误，请修改后重试！");
                    }
                },
                error: function () {
                    // alert("网络原因，请稍后重试！");
                },
                complete: function () {
                    del_post_flag = false;
                }
            });
        });
        // 提交新建或修改
        var post_flag = false;
        $("#submit").bind("click", function (event) {
            var data_state = $("#data_state input[type='radio']:checked").attr("id");
            var data_state = data_state.split("data_state");
            var data = {
                apartment: $("#apartment").val(),
                address: $("#address").val(),
                username: $("#username").val(),
                phone: $("#phone").val(),
                order_time: $("#order_time option:selected").text(),
                charge_id: $("#admin").val(),
                desc: $("#desc").val(),
                data_state: data_state[1],
            }
            if (action == "create") {
                var url = create_net_list;
            } else {
                var url = update_net_list;
                data.id = $("#nId").val();
            }
            // 判断是新增还是修改
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                beforeSend: function () {
                    if (post_flag) {
                        return false;
                    }
                    post_flag = true;
                    // 修改时 检查密码是否为默认，默认则不传
                },
                success: function (response) {
                    if (response.success == 'Success') {
                        window.location.href = window.location.href;
                    } else {
                        alert("数据有误，请修改后重试！");
                    }
                },
                error: function () {
                    alert("网络原因，请稍后重试！");
                },
                complete: function () {
                    post_flag = false;
                }
            });
        });
    });
})();
/*
name:radio外div的id；
which：要选中的radio； 
*/
function dealRadio(name, which) {
    var inputList = document.getElementsByName(name);
    for (var x = 0; x < inputList.length; x++) {
        inputList[x].checked = false;  //取消选中
    }
    var input = document.getElementById(name + which);
    input.checked = true;  //选中第二个　　                
}
