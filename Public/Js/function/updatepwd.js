(function () {
    $('#handle').on('click', function () {
        // document:send_form.submit()
        var oldpwd = $('input[name=oldpwd]');
        var newpwd = $('input[name=newpwd]');
        var newpwd1 = $('input[name=newpwd1]');

        if (oldpwd.val() == '') {
            alert('请输入原密码！');
            oldpwd.focus();
            return;
        }
        if (newpwd.val() == '') {
            alert('请输入新密码！');
            oldpwd.focus();
            return;
        }
        if (newpwd.val().length < 6) {
            alert('密码长度最少6位！');
            newpwd.focus();
            return;
        }
        if (newpwd1.val() == '') {
            alert('请重复输入新密码！');
            newpwd1.focus();
            return;
        }
        if (newpwd.val() != newpwd1.val()) {
            alert('两次密码不匹配');
            newpwd1.focus();
            return;
        }

        // console.log(oldpwd.val(), newpwd.val(), newpwd1.val());
        $.post(updatepwdUrl, {newPwd: newpwd.val(), oldPwd: oldpwd.val()}, function (data) {
            console.log(data);
            alert(data);
            location.reload(true);
        }, 'json');
    });
})();