<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>产品分类</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Shop/Public/Back/css/adminStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i></i><em>产品分类</em></span>
    <span class="modular fr"><a href="/Shop/Home/Login/add_category.html" class="pt-link-btn">+添加新分类</a></span>
  </div>
<form action="deletes" method="post">
  <table class="list-style">
   <tr>
    <th>分类名称</th>
    <th>产品数量</th>
    <th>单位</th>
    <th>是否显示</th>
    <th>排序</th>
    <th>操作</th>
   </tr>
      <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vi): $mod = ($i % 2 );++$i;?><tr>
    <td>
     <input type="checkbox" class="aa" name="ptids[]" value="<?php echo ($vi["ptid"]); ?>"/>
     <span><?php echo ($vi["ptname"]); ?></span>
    </td>
    <td class="center">1</td>
    <td class="center"><?php echo ($vi["ptdanwei"]); ?></td>
       <?php if(($vi["ptisshow"] == 0)): ?><td class="center"><img src="/Shop/Public/Back/images/no.gif"/></td>
           <?php else: ?>
           <td class="center"><img src="/Shop/Public/Back/images/yes.gif"/></td><?php endif; ?>
    <td class="center"><input type="text" style="width:50px;text-align:center;" value="<?php echo ($vi["ptsort"]); ?>"/></td>
    <td class="center"><a href="deletetype?id=<?php echo ($vi["ptid"]); ?>" class="block" title="移除"><img src="/Shop/Public/Back/images/icon_trash.gif"/></a></td>
   </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </table>
  
  <!-- BatchOperation -->
  <div style="overflow:hidden;">
      <!-- Operation -->
	  <div class="BatchOperation fl">
	   <input type="checkbox" id="hh" style="display: none"/>
	   <label class="btnStyle middle" onclick="hh()">全选</label>
	   <input type="submit" value="批量删除" class="btnStyle"/>
	  </div>
	  <!-- turn page -->
	  <div class="turnPage center fr">
	  <?php echo ($page); ?>
	  </div>
  </div>
</form>
 </div>
</body>
</html>
<script>
    kk=true;
    aa=document.getElementsByClassName('aa');
    chec=document.getElementById('hh');
    function hh() {
        if (kk == true) {
            chec.checked = true;
            for (j = 0; j < aa.length; j++) {
                aa[j].checked = true;
            }
            kk = false;
        }
        else {
            chec.checked = false;
            for (i = 0; i < aa.length; i++) {
                aa[i].checked = false;
            }
            kk = true;
        }
    }
</script>