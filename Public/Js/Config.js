var HostSoap = "http://hnnd.hnis.org";
var HostInterface = "http://app.hnis.org";

var userId = '20141114095332308'
var ak = "agsvURNWGfPqrxLKF2ZW7b7f"

//  ========== 
//  = 获取Url参数 = 
//  ========== 
function getQueryString(name) {
	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
	var r = window.location.search.substr(1).match(reg);
	if (r != null) return unescape(r[2]);
	return null;
}


function $ViewsWrite(ArticleID, Type, ArticleName, NewType) {
	
	var url = HostInterface + "/MUIInterface.asmx/ViewsWrite";
	//alert('ok');
	var md = 'ArticleID=' + ArticleID + "CardCode=" + userId + "Type=" + Type + "ArticleName=" + ArticleName + "NewType=" + NewType + ak;
	//$(".log").html(md);
	var sign = $.md5(md);


	$.ajax({
		type: "POST",
		url: url,
		cache: false,
		data: {
			ArticleID: ArticleID,
			CardCode: userId,
			Type: Type,
			ArticleName: ArticleName,
			NewType: NewType,
			sign: sign
		},
		dataType: "jsonp",
		jsonpCallback: "_jsonpCallback"
	});
}

_jsonpCallback=function(json){
	
}

function IsHtml5Plus() {
	//alert(navigator.userAgent);
	if (navigator.userAgent.match(/Html5Plus/i)) { //不支持5+ API
		return true;
	}
	return false;
}