<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
<title>新增产品分类</title>
<link href="/Shop/Public/Back/css/adminStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i></i><em>添加分类</em></span>
  </div>
  <form action="addtype" method="post">
  <table class="list-style">
   <tr>
    <td style="text-align:right;width:15%;">分类名称：</td>
    <td>
     <input type="text" class="textBox" name="ptname" onblur="warn1(this)" required/>
    </td>
   </tr>
   <tr>
    <td style="text-align:right;width:10%;">上级分类：</td>
    <td>
     <select class="textBox">
      <option>顶级分类</option>
      <option>某分类</option>
     </select>
    </td>
   </tr>
   <tr>
    <td style="text-align:right;">数量单位：</td>
    <td>
     <input type="text" class="textBox length-short" name="ptdanwei" required/>
    </td>
   </tr>
   <tr>
    <td style="text-align:right;">排序：</td>
    <td>
     <input type="text" class="textBox length-short" name="ptsort" required/>
    </td>
   </tr>
   <tr>
    <td style="text-align:right;">是否显示：</td>
    <td>
     <input type="radio" name="ptisshow" id="yes" value="1"/>
     <label for="yes">是</label>
     <input type="radio" name="ptisshow" id="no" value="0"/>
     <label for="no">否</label>
    </td>
   </tr>
   <tr>
    <td style="text-align:right;"></td>
    <td><input type="submit" value="保存" class="tdBtn"/></td>
   </tr>
  </table>
  </form>
 </div>
</body>
</html>
<script>
    function warn1(a) {
        var requestURL = 'typename?name='+a.value;
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