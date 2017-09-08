(function () {
    $(function () {
        var action = "create";
        // 添加管理员
        $("#create-admin").bind("click", function () {
            action = "create";
            // 清空
            $("#aId").val("");
            $("#username").val("");
            $("#password").val("");
            $("#nickname").val("");
            $("#desc").val("");
            $("#level").val("1");
        });
        $.each($(".update-admin"), function (index, value) {
            // 修改管理员
            var row = $(value).parent().parent(".row");
            $(value).click(function () {
                action = "update";
                // 注意：此时row是jquery对象，有attr等方法，不是元素节点
                // 传值
                $("#aId").val(row.children(".aId").text());
                $("#username").val(row.children(".username").text());
                $("#password").val(111111);
                $("#nickname").val(row.children(".nickname").text());
                $("#desc").val(row.children(".desc").text());
                // 不知道为何 无法选中 传入 text，暂时这样写,后人简化
                dealSelect(row.children(".level").text());
            });
            // 删除管理员
            $(value).next(".delete-admin").click(function () {
                $("#aId").val(row.children(".aId").text());
            });
        });
        // 提交删除
        var del_post_flag = false;
        $("#delete").bind("click", function () {
            var id = $("#aId").val();
            $.ajax({
                type: "POST",
                url: delete_admin,
                data: { id: id },   //一定要有key键值！
                beforesend: function () {
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
                        window.location.href = window.location.href;
                    } else {
                        alert("数据有误，请修改后重试！");
                    }
                },
                error: function () {
                    alert("网络原因，请稍后重试！");
                },
                complete: function () {
                    del_post_flag = false;
                }
            });
        });
        // 提交新建或修改
        var post_flag = false;
        $("#submit").bind("click", function (event) {
            var data = {
                username: $("#username").val(),
                password: $("#password").val(),
                nickname: $("#nickname").val(),
                desc: $("#desc").val(),
                data_state: $("#level").val(),
            }
            if (action == "create") {
                var url = create_admin;
            } else {
                var url = update_admin;
                data.id = $("#aId").val();
            }
            // 判断是新增还是修改
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                beforeSend: function () {
                    if (data.username == "") {
                        alert("用户名不得为空");
                        return false;
                    }
                    if (data.password == "") {
                        alert("密码不得为空");
                        return false;
                    }
                    if (data.nickname == "") {
                        alert("昵称不得为空");
                        return false;
                    }
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
// 选中select 当前的 option
function dealSelect(level) {
    $.each($("#level > option"), function (index, value) {
        var option = $(value);
        if (option.text() == level) {
            option.attr("selected", true);
        }
    });
}
