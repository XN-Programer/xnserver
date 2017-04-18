/**
 * Created by liwei on 2017/4/17.
 */

(function () {
    $('#gs').on('click', function () {
        $('#CardId').val(CardId);
        $('#my-prompt').modal({
            relatedTarget: this,
            onConfirm: function (e) {
                var cardid = e['data'][0];
                var cardpwd = e['data'][1];
                $.post(gsUrl, {CardId: cardid, pwd: cardpwd}, function (data) {
                    alert(data);
                },'json');
            }
        });
    });
})();