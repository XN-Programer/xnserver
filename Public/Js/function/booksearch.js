/**
 * Created by liwei on 2017/4/7.
 */
(function() {
    $(function() {

        $(".wz").click(function () {
            var value = $(this).attr('name');
            var bookname = $(this).attr('value');
            $('#bookname').html(bookname);
            $('#booklist > *').remove();
            wz(value);
        });
    })
})();


function wz(CtrlRd) {
    var CtrlRd = CtrlRd;
    console.log(CtrlRd);
    $.post(wzurl, { CtrlRd: CtrlRd },
        function (data) {
            console.log(data);
            html = '';
            if(data.errorname != "成功") {
                alert('我们暂时没有发现关于这本书的其它信息！');
            } else {
                $(data.find_ifa_GetSite_list1).each(function (i, v) {
                    html += '<table class="am-table am-table-bordered">';
                    html += '<thead>';
                    html += '<td>' + v.Room + '</td>';
                    html += '</thead>'
                    html += '<tbody><tr>';
                    if (v.Site) {
                        html += '<td>' + v.Site + '</td>';
                    } else {
                        html += '<td>暂无数据</td>';
                    }

                    html += '<td>' + v.Callno + '</td>';
                    html += '</tr>';
                    html += '<tr>';
                    html += '<td>馆藏</td>';
                    html += '<td>' + v.CollTotal + '本</td>'
                    html += '</tbody>';
                    html += '</table><br>';
                });

            }


            $('#booklist').html(html);
        });


}


