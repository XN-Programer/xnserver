/**
 * Created by liwei on 2017/3/23.
 */

$(function () {
    $('#doc-prompt-toggle').on('click', function() {
        if(cname == 1) {
            $('#my-prompt').modal({
                relatedTarget: this,
                onConfirm: function(e) {
                    // alert('你输入的是：' + e.data || '')
                    var cname = e.data;
                    window.location.href = nextUrl + '.html?cname=' + cname;
                },
                onCancel: function(e) {

                }
            });
        } else {
            window.location.href = nextUrl;
        }

    });
});