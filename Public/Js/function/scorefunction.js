$(function () {

	$('.weui-btn-area .sent-btn').click(function () {
		var xn = $('select[name=xn]');
		var xq  = $('select[name=xq]');
		if(xn.val() == 0){
			alert('请选择学年');
			xn.focus();
			return;
		}
		if(xq.val() == 0){
			alert('请选择学期');
			xq.focus();
			return;
		}

		$.post(handUrl, { xn : xn.find("option:selected").text(), xq: xq.find("option:selected").text()},
			function (data) {
				// console.log(data);
				if(data == null){
					alert('当前未查询到成绩');
				} else {
					var html = '<caption>'+ data[0].XM + ':' + data[0].XH + '</caption>';
					html += '<thead><tr><td>学年</td><td>'+ data[0].XN +'</td><td>学期</td><td>'+ data[0].XQ +'</td></tr></thead>';
					html += '<tr><td>课程名</td><td>成绩</td><td>课程性质</td><td>学分</td></tr>'
					// $('#showCj').html(html);
					$(data).each(function(i, v) {
						// console.log($(this).KCMC);
						html += '<tr><td>'+ v.KCMC + '</td><td class="am-active">'+ v.CJ + '</td><td>'+ v.KCXZ + '</td><td class="am-active">'+ v.XF +'</td></tr>'
					});
					$('#showCj').html(html);
					$('#my-popup').modal(true);

				}
			}, 'json');

        

    });	
})