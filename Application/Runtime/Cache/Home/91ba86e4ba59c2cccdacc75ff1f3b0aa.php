<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>订单列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Shop/Public/Back/css/adminStyle.css" rel="stylesheet" type="text/css" />
<script src="/Shop/Public/Back/js/jquery.js"></script>
<script src="/Shop/Public/Back/js/public.js"></script>
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i class="order"></i><em>订单列表</em></span>
  </div>
  <div class="operate">
   <form>
    <img src="/Shop/Public/Back/images/icon_search.gif"/>
    <input type="text" class="textBox length-long" placeholder="输入订单编号或收件人姓名..."/>
    <select class="inline-select">
     <option>未付款</option>
     <option>已付款</option>
    </select>
    <input type="button" value="查询" class="tdBtn"/>
   </form>
  </div>
  <table class="list-style Interlaced">
   <tr>
    <th>订单编号</th>
    <th>下单时间</th>
    <th>收件人</th>
    <th>订单金额</th>
    <th>订单状态</th>
    <th>操作</th>
   </tr>
   <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
    <td>
     <input type="checkbox"/>
     <a href="order_detail.html"><?php echo ($vo["orderid"]); ?></a>
    </td>
    <td class="center">
     <span class="block"><?php echo ($vo["userid"]); ?></span>
     <span class="block"><?php echo ($vo["orderdate"]); ?></span>
    </td>
    <td width="450">
     <span class="block"><?php echo ($vo["cname"]); ?>[<?php echo ($vo["phone"]); ?>]</span>
     <address><?php echo ($vo["sheng"]); echo ($vo["shi"]); echo ($vo["qu"]); echo ($vo["adetial"]); ?></address>
    </td>
    <td class="center">
     <span><i>￥</i><b><?php echo ($vo["ordermoney"]); ?></b></span>
    </td>
    <td class="center">
     <span>未付款</span>
    </td>
    <td class="center">
     <a href="order_detail?oid=<?php echo ($vo["orderid"]); ?>" class="inline-block" title="查看订单"><img src="/Shop/Public/Back/images/icon_view.gif"/></a>
     <a href="order_detail?oid=<?php echo ($vo["orderid"]); ?>" class="inline-block" title="删除订单"><img src="/Shop/Public/Back/images/icon_trash.gif"/></a>
    </td>
   </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </table>
  <!-- BatchOperation -->
  <div style="overflow:hidden;">
      <!-- Operation -->
	  <div class="BatchOperation fl">
	   <input type="checkbox" id="del"/>
	   <label for="del" class="btnStyle middle">全选</label>
	   <input type="button" value="打印订单" class="btnStyle"/>
	   <input type="button" value="配货" class="btnStyle"/>
	   <input type="button" value="删除订单" class="btnStyle"/>
	  </div>
	  <!-- turn page -->
	  <div class="turnPage center fr">
	   <a>第一页</a>
	   <a>1</a>
	   <a>最后一页</a>
	  </div>
  </div>
 </div>
</body>
</html>