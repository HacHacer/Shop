<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>后台管理系统</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="nofollow"/>
<link href="/Shop/Public/Back/css/adminStyle.css" rel="stylesheet" type="text/css" />
<style>
body{width:100%;height:100%;overflow:hidden;background:url(/Shop/Public/Back/images/pc_loginBg.jpg) no-repeat;background-size:cover;position:absolute;}
</style>
</head>
<body>
<form action="loginver" method="post">
  <section class="loginform">
   <h1>后台管理系统</h1>
   <ul>
    <li>
     <label>账号：</label>
     <input type="text" class="textBox" placeholder="管理员账号" name="acount"/>
    </li>
    <li>
     <label>密码：</label>
     <input type="password" class="textBox" placeholder="登陆密码" name="adminpwd"/>
    </li>
    <li>
     <input type="submit" value="立即登陆" id="btnsub"/>
    </li>
   </ul>
  </section>
</form>
</body>
</html>