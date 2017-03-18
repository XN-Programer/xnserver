<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/Public/Css/weui.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="page__hd">
            <div class="header">
                <h1 class="page__title">湘农青年</h1>
            </div>
        </div>
        <div class="page__bd">
                <div class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">学号</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="number" pattern="[0-9]*" placeholder="请输入学号">
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">密码</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="password" pattern="[0-9]*" placeholder="请输入密码">
                    </div>
                </div>
                <div class="page__bd_spacing">
                        <a href="javascript:;" class="weui-btn weui-btn_plain-primary">按钮</a>
                </div>
        </div>
    </div>
</body>
</html>