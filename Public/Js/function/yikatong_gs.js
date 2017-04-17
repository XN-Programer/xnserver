/**
 * Created by liwei on 2017/4/17.
 */

(function () {
    $('#gs').on('click', function () {
        $('#CardId').val(CardId);
        $('#my-prompt').modal({
            relatedTarget: this,
            onConfirm: function (e) {
                console.log(e);
            }
        });
    });
})();