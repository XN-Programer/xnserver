/**
 * Created by liwei on 2017/4/9.
 */

(function () {

    $(document).ready(function() {
        getData(pageindex);
    });
    $('.next_page').on('click', function () {
        getData(++pageindex);
    });
    $('.prev_page').on('click', function () {
        getData(--pageindex);
    });
    $('.index_page').on('click', function () {
        pageindex = 0;
        getData(pageindex);
    });
    $('.last_page').on('click', function () {
        pageindex = $('.am-pagination-last').val()-1;
        getData(pageindex);
    });
})();

function getData(pageindex) {
    $.post(yktUrl, {bdate: bdate, edate: edate, Code: Code, pageindex: pageindex},
        function (data) {
            // console.log(data);
            if (data['status'] == 1) {
                // console.log(data['RList']['pageDTO']);
                // console.log(data['RList']['webTrjnDTO']);
                var html = '';
                var pagestatus = data['RList']['pageDTO'];
                checkpage(pagestatus);
                $('.am-pagination-last').attr('value', pagestatus['pageCount']);
                if( data['RList']['webTrjnDTO'] != null ) {
                    var webTrjnDTO = data['RList']['webTrjnDTO'];
                    html = writeItem(webTrjnDTO);

                } else {
                    html = '<div class="weui-loadmore weui-loadmore_line"><span class="weui-loadmore__tips">暂无数据</span></div>';
                }
                $('.bd__main').html(html);
            }

        }, 'json');
}


function writeItem(webTrjnDTO) {
    var html = '';
    $(webTrjnDTO).each(function (i, v) {
        html += '<div class="weui-form-preview">';
        html += '<div class="weui-form-preview__hd">';
        html += '<div class="weui-form-preview__item">';
        html += '<label class="weui-form-preview__label">持卡人消费</label>';
        html += '<em class="weui-form-preview__value">' + v.FTranAmt + '</em>';
        html += '</div>';
        html += '</div>';
        html += '<div class="weui-form-preview__bd">';
        html += '<div class="weui-form-preview__item">';
        html += '<label class="weui-form-preview__label">余额</label>';
        html += '<span class="weui-form-preview__value">' + v.FCardBalance + '</span>';
        html += '</div>';
        html += '<div class="weui-form-preview__item">';
        html += '<label class="weui-form-preview__label">消费时间</label>';
        html += '<span class="weui-form-preview__value">' + v.effectdate + '</span>';
        html += '</div>';
        html += '</div>';
        html += '<div class="weui-form-preview__ft">';
        html += '<a class="weui-form-preview__btn weui-form-preview__btn_primary" href="javascript:">交易明细</a>';
        html += '</div>';
        html += '</div>';
        html += '<br>';
    });
    return html;
}

function checkpage (pagestatus) {
    if (pagestatus['firstPage'] == false) {
        var astatus = $('.page__bottom .index_page');
            astatus.attr('href', '#');
            astatus.css('color', '#000');
    } else {
        var astatus = $('.page__bottom .index_page');
        astatus.css('color', '#0e90d2');
    }
    if (pagestatus['nextPage'] == false) {
        var astatus = $('.page__bottom .next_page');
        astatus.attr('href', '#');
        astatus.css('color', '#000');
    } else {
        var astatus = $('.page__bottom .next_page');
        astatus.css('color', '#0e90d2');
    }
    if (pagestatus['proPage'] == false) {
        var astatus = $('.page__bottom .prev_page');
        astatus.attr('href', '#');
        astatus.css('color', '#000');
    } else {
        var astatus = $('.page__bottom .prev_page');
        astatus.css('color', '#0e90d2');
    }

    if (pagestatus['tailPage'] == false) {
        var astatus = $('.page__bottom .last_page');
        astatus.attr('href', '#');
        astatus.css('color', '#000');
    } else {
        var astatus = $('.page__bottom .last_page');
        astatus.css('color', '#0e90d2');
    }

}