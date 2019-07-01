<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台</title>
<link href="/Shop/Public/Back/css/adminStyle.css" rel="stylesheet" type="text/css" />
 <script src="/Shop/Public/Back/js/jquery.js"></script>
</head>
<body>
 <div class="wrap">
  <?php if(($id == 0)): ?><div class="page-title">
    <span class="modular fl"><i class="user"></i><em>添加管理员</em></span>
  </div>
   <form action="admininsert" method="post">
   <table class="noborder">
   <tr>
    <td width="15%" style="text-align:right;">账号：</td>
    <td><input type="text" onblur="warn1(this)" class="textBox length-middle" name="acount" required/></td>
   </tr>
   <tr>
    <td style="text-align:right;">邮箱：</td>
    <td><input type="email" class="textBox length-middle" name='adminqq' required/></td>
   </tr>
   <tr>
    <td style="text-align:right;">密码：</td>
    <td><input type="password" class="textBox length-middle" name='adminpwd' required/></td>
   </tr>
   <tr>
    <td style="text-align:right;">再次确认密码：</td>
    <td><input type="password" class="textBox length-middle" required/></td>
   </tr>
   <tr>
    <td style="text-align:right;"></td>
    <td><input type="submit" class="tdBtn" value="保存"/></td>
   </tr>
  </table>
   </form>
   <?php else: ?>
   <div class="page-title">
    <span class="modular fl"><i class="user"></i><em>修改信息</em></span>
   </div>
   <form action="updatepwd" method="post">
    <table class="noborder">
     <tr>
      <td width="15%" style="text-align:right;">账号：</td>
      <td><input type="text" name="acount" class="textBox length-middle" id="acount" readonly style="border: none" value="<?php echo ($admin["acount"]); ?>"/></td>
     </tr>
     <tr>
      <td style="text-align:right;">邮箱：</td>
      <td><input type="text" name="adminqq" class="textBox length-middle" required value="<?php echo ($admin["adminqq"]); ?>"/></td>
     </tr>
     <tr>
      <td style="text-align:right;">旧密码：</td>
      <td><input type="password" onblur="warn2(this)" class="textBox length-middle" required/></td>
     </tr>
     <tr>
      <td style="text-align:right;">新密码：</td>
      <td><input type="password" name="adminpwd" class="textBox length-middle" required/></td>
     </tr>
     <tr>
      <td style="text-align:right;"></td>
      <td><input type="submit" class="tdBtn" value="确定修改"/></td>
     </tr>
    </table>
   </form><?php endif; ?>
 </div>
</body>
</html>
<script>
  function warn1(a) {
      var requestURL = 'acounton?name='+a.value;
      var request=new XMLHttpRequest();
      request.open('GET',requestURL);
      request.send();
      request.onload = function() {
          var data =request.response;
          if(data)
          {
              alert(data);
              a.value='';
          }
      }
  }
  function warn2(a) {
      acount=document.querySelector('#acount');
      var requestURL = 'pwdon?pwd='+a.value+'&name='+acount.value;
      var request=new XMLHttpRequest();
      request.open('GET',requestURL);
      request.send();
      request.onload = function() {
          var data =request.response;
          if(data)
          {
              alert(data);
              a.value='';
          }
      }
  }
</script>