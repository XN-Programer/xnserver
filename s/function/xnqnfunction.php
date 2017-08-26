<?php 

  session_start();
  //header("Content-type:application/json;charset=utf-8");
  header("Content-type:text/html;charset=utf-8");
  error_reporting(E_ALL^E_NOTICE^E_WARNING); //不在浏览器页面中显示错误信息与警告提醒等信息



class XnqnFunction
{
	function __construct()
	{
		$this->ak = "agsvURNWGfPqrxLKF2ZW7b7f";
		$this->HostInterface = "http://app.hnis.org";
		$this->userId = $_SESSION["Userinfo"]["CardCode"];
		// $this->userId = "20141114095328475";
	}


	function GetRoom($PriDormID)
	{
		$HostInterface = $this->HostInterface;
		$userId = $this->userId;
		$PriDormID = $PriDormID;
		//echo $PriDormID.$userId;
		//$PriDormID = $this->PriDormID;
		//echo $PriDormID;
  		$ak = $this->ak;
		$url = $HostInterface."/MUIInterface.asmx/GETROOM";
		$sign = md5('userId='.$userId.'PriDormID='.$PriDormID.$ak);
		$data = array(
				'ak' => $ak,
				'userId' => $userId,
				'PriDormID' => $PriDormID,
				'sign' => $sign
			);
		$context = stream_context_create(array(		     //传入数组类型的$option参数
		    'http' => array(			      //以HTTP请求为键的设置数组
			'method'  => 'POST',			 //设置请求方法为POST
			'header'  => "Content-type: application/x-www-form-urlencoded",//通过设置头文件来设置POST数据格式
			'content' => http_build_query($data),	   //用http_build_query()方法将数组拼合成数据字符串
			'timeout' => 10000			      //设置请求的超时时间。
		    ) 
		));
		$result = file_get_contents($url, false, $context);
		//var_dump($result);
		$dom  = new DomDocument;
		$dom->loadXML($result);
		$json = $dom->getElementsByTagName('string')->item(0)->nodeValue;	//获取JSON字符串
		$dom  = json_decode($json);
		//var_dump($dom);   //把这里注释去掉看一下你就会了
		$status = $dom->Status;
		if($status == 1){
			return $dom = json_encode($dom, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);			
		}
	}
}

$data = new XnqnFunction();
$data->GetCj();

?>