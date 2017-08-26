<?php 
    session_start();
    $ak = "agsvURNWGfPqrxLKF2ZW7b7f";
    $cardcode = $_SESSION["Userinfo"]["CardCode"];

    $cj = $_GET["data"];
    if ($cj == "cj") {
      $url="http://hnnd.hnis.org/ND_APP/QueryResults.html?ak=" . $ak ."&id=" . $cardcode . "&StuCode=" . $cardcode;
    }

 ?>

 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
   <title>湘农青年-成绩查询</title>
   <!-- 引入 WeUI -->
   <link rel="stylesheet" href="https://res.wx.qq.com/open/libs/weui/1.0.2/weui.min.css"/>
   <!-- 新 Bootstrap 核心 CSS 文件 -->
   <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">

   <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
   <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>

   <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
   <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="../css/style.css" />
   <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

 </head>
 <body>
 <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span> 
                    </button>
                    <a class="navbar-brand" href="#">湘农青年</a>
                  </div>
                  <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                      <li><a href="../index.php">首页</a></li>
                      <li class="active"><a href="">成绩查询</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <li><a href="#"><span class="glyphicon glyphicon-user"></span> 退出</a></li>
                      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>登陆</a></li>
                    </ul>
                  </div>
                </div>
              </nav>
        </div>
    </div>
    <iframe src="<?php echo $url?>" width="100%" frameborder="0" style="min-height:500px;">
    你的浏览器不支持框架
    </iframe>

 </body>
 </html>