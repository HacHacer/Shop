<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>管理员列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Shop/Public/Back/css/adminStyle.css" rel="stylesheet" type="text/css" />
<script src="/Shop/Public/Back/js/jquery.js"></script>
<script src="/Shop/Public/Back/js/public.js"></script>
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i class="user"></i><em>管理员列表</em></span>
    <span class="modular fr"><a href="revise?" class="pt-link-btn">+添加管理员</a></span>
  </div>
  <table class="list-style Interlaced">
   <tr>
    <th>管理员账号</th>
    <th>电子邮箱地址</th>
    <th>加入时间</th>
    <th>最后登陆时间</th>
    <th>操作</th>
   </tr>
   <?php if(is_array($manager)): $i = 0; $__LIST__ = $manager;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
    <td class="center"><?php echo ($vo["acount"]); ?></td>
    <td class="center"><?php echo ($vo["adminqq"]); ?></td>
    <td class="center"><?php echo ($vo["jtime"]); ?></td>
    <td class="center"><?php echo ($vo["ltime"]); ?></td>
    <td class="center">
     <a href="revise?adminid=<?php echo ($vo["adminid"]); ?>"><img src="/Shop/Public/Back/images/icon_edit.gif" title="编辑"/></a>
     <a href="deleteadmin?adminid=<?php echo ($vo["adminid"]); ?>"><img src="/Shop/Public/Back/images/icon_drop.gif" title="删除"/></a>
    </td>
   </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </table>
 </div>
</body>
</html>