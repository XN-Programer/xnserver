(function () {
    $(function () {
        // 筛选表单提交
        $("#search").change(function(){
            $("#search_form").submit();
        });
        // 显示当前筛选
        $("select[name='data_state']").val(search);     
        $.each($(".update-user"), function (index, value) {
            // 修改
            var row = $(value).parent().parent(".row");
            $(value).click(function () {
                $("#uId").val(row.children(".uId").text());
                var radioId = row.children(".data_state").children("span").text();
                if (radioId == "2") {
                    radioId = "1";
                }
                dealRadio("data_state", radioId);
            });
            // 删除
            $(value).next(".delete-user").click(function () {
                $("#uId").val(row.children(".uId").text());
            });
        });
        // 提交删除
        var del_post_flag = false;
        $("#delete").bind("click", function () {
            var id = $("#uId").val();
            $.ajax({
                type: "POST",
                url: delete_user,
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
        // 提交修改
        var post_flag = false;
        $("#submit").bind("click", function (event) {
            var data_state = $("#data_state input[type='radio']:checked").attr("id");
            var data_state = data_state.split("data_state");            
            var data = {
                id: $("#uId").val(),
                data_state: data_state[1],
            }
            // 判断是新增还是修改
            $.ajax({
                type: "POST",
                url: update_user,
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