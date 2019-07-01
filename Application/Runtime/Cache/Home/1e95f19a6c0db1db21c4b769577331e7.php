<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>header</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Shop/Public/Back/css/adminStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="header">
 <div class="logo">
  <img src="/Shop/Public/Back//images/logo.png" title="在哪儿"/>
 </div>
 <div class="fr top-link">
  <a href="../Index/index" target="_blank" title="访问前台首页"><i class="shopLinkIcon"></i><span>访问前台首页</span></a>
  <a href="admin_list.html" target="mainCont" title="DeathGhost"><i class="adminIcon"></i><span>管理员：<?php echo ($_SESSION['username']); ?></span></a>
  <a href="#" title="清理缓存"><i class="clearIcon"></i><span>清除缓存</span></a>
  <a href="revise?adminid=<?php echo ($admin["adminid"]); ?>" target="mainCont" title="修改密码"><i class="revisepwdIcon"></i><span>修改密码</span></a>
  <a href="destroy" title="安全退出" style="background:rgb(60,60,60);" target="_parent"><i class="quitIcon" ></i><span>安全退出</span></a>
 </div>
</div>
</body>
</html>