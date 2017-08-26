<?php 

	header("Content-type:text/html;charset=utf-8");
	session_start();
	$userid = $_POST["userid"];
	$passwd = $_POST["passwd"];
	if (!empty($userid) && !empty($passwd)) {
		$url="http://app.hnis.org//NDAppWebService.asmx/WSMemberLogin?ak=agsvURNWGfPqrxLKF2ZW7b7f&id=".$userid."&password=".$passwd."&BDUserID=";
		$json=file_get_contents($url);
		$dom=new DomDocument;
		$dom->loadXML($json);
		$json=$dom->getElementsByTagName('string')->item(0)->nodeValue;	//获取JSON字符串
		$dom=json_decode($json);		//转为对像，取值方法$dom->Msg
		$userlogin=$dom->status;
		if($userlogin==1){
			//记录用户session信息以便登验证
			$_SESSION["uname"]=$userid;
			$_SESSION["upwd"]=$passwd;
			//登陆成功，接收用户登陆信息
			$msg =$dom->Msg;   //获取用户登陆提示，会获取中文：登陆成功或失败
			$_SESSION["Userinfo"]["CardCode"]=$dom->Userinfo->CardCode;   //接收用户内部标识id
			$_SESSION["Userinfo"]["username"]=$dom->Userinfo->Name;   //用户姓名
			$_SESSION["Userinfo"]["usex"]=$dom->Userinfo->Sex;			//用户性别
			$_SESSION["Userinfo"]["Grade"]=$dom->Userinfo->Grade;		//用户入学年份
			$_SESSION["Userinfo"]["CollegeName"]=$dom->Userinfo->CollegeName;	//所在学院
			$_SESSION["Userinfo"]["MajorName"]=$dom->Userinfo->MajorName;		//所学专业
			$_SESSION["Userinfo"]["DormDetail"]=$dom->Userinfo->DormDetail;		//所住宿舍
			//转向到用户打开的网址
			header("Location: http://xyfw.com/index.php");
			}
		else {  echo "<script>";
				echo "alert('";
				echo "Password error or username error!" ;
				echo "');window.history.go(-1);</script>";
				}
	}else{
				echo "<script>";
				echo "alert('";
				echo "Password error or username error!" ;
				echo "');window.history.go(-1);</script>";
	}
 ?>