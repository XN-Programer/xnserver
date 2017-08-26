<?php 
	session_start();
	error_reporting(E_ALL^E_NOTICE^E_WARNING); //不在浏览器页面中显示错误信息与警告提醒等信息
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
	<title>湘农青年-校园服务,农大人的小助手</title>	
	<title>校园服务-电费查询</title>
	
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link href  ="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

	<!-- 可选的Bootstrap主题文件（一般不使用） -->
	<script src ="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap-theme.min.css"></script>

	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src ="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>

	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src ="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/login.css">
	
</head>
<body>
	<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<h1 class="text-center header">湘农青年</h1>
			<h2 class="text-center">www.xnqn.com</h2>
			<br /><br />
			<form class="form-horizontal" role="form" method="post" action="./function/checklogin.php">
				<div class="form-group">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<input type="text" name="userid" class="form-control input-lg" id="inputEmail3" placeholder="用户名/username" />
					</div>
					<div class="col-sm-3"></div>
				</div>
				<br /><br />
				<div class="form-group">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<input type="password" name="passwd" class="form-control input-lg" id="inputPassword3" placeholder="密码/password" />
					</div>
					<div class="col-sm-3"></div>
				</div>
				<br />
				<div class="form-group">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<div class="checkbox">
							 <label><input type="checkbox" />Remember me</label>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
				<br />
				<div class="form-group">
					<div class="col-sm-5"></div>
					<div class="col-sm-2">
						 <button type="submit" class="btn btn-primary btn-lg">登陆</button>
					</div>
					<div class="col-sm-5"></div>
				</div>
			</form>
		</div>
	</div>
</div>	
</body>
</html>