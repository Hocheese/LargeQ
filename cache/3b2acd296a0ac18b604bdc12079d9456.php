<?php if(!defined("TOKEN")){
	header("HTTP/1.1 403 Forbidden");
	exit("Access Forbidden");
} ?><!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理中心</title>
    <link href="/Style/admin" type="text/css" rel="stylesheet">
    <script src="/Js/main"></script>
</head>

<body>
    <nav>
        <div>
            <a href="#">封面</a>
        </div>
        <div>
            <a href="#">基本</a>
        </div>
        <div>
            <a href="/Admin/user/display">用户</a>
        </div>
        <div>
            <a href="/Admin/article/display">文章</a>
        </div>
    </nav>
    <div id="items">