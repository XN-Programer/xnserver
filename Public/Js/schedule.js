$(function(){
    $('.weui-cells .per_sent-btn').click(function(){
        var url = 'http://app.hnis.org/NDAppWebService.asmx/GetTerm';
        /*$.post(url, '2017', function(data){
            console.log(data);
        }, 'jsonp')*/
        var data = '2017';
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            success: function() {
                alert('111');
            },
            dataType: 'jsonp'
        });

    });

    $('.weui-cells .class_sent-btn').click(function(){

    });
});