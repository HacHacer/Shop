<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>订单详情</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Shop/Public/Back/css/adminStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i class="order"></i><em>订单编号：<?php echo ($res["orderid"]); ?></em></span>
  </div>
  <dl class="orderDetail">
   <dt class="order-h">订单详情</dt>
   <dd>
    <ul>
     <li>
      <span class="h-cont h-right">收件人姓名：</span>
      <span class="h-cont h-left"><?php echo ($res["cname"]); ?></span>
     </li>
     <li>
      <span class="h-cont h-right">联系电话：</span>
      <span class="h-cont h-left"><?php echo ($res["phone"]); ?></span>
     </li>
     <li>
      <span class="h-cont h-right">联系地址：</span>
      <span class="h-cont h-left"><?php echo ($res["sheng"]); echo ($res["shi"]); echo ($res["qu"]); echo ($res["adetial"]); ?></span>
     </li>
     <li>
      <span class="h-cont h-right">付款状态：</span>
      <span class="h-cont h-left">未付款</span>
     </li>
     <li>
      <span class="h-cont h-right">下单时间：</span>
      <span class="h-cont h-left"><?php echo ($res["orderdate"]); ?></span>
     </li>
     <li>
      <span class="h-cont h-right">付款时间：</span>
      <span class="h-cont h-left">未付款</span>
     </li>
    </ul>
   </dd>
   <dd style="padding:1em 0;">
    <span><b>订单留言：</b></span>
    <span>...这里是用户留言信息，务必***请到****谢谢~</span>
   </dd>
   <dd>
    <table class="list-style">
     <tr>
      <th>缩略图</th>
      <th>产品</th>
      <th>单价</th>
      <th>数量</th>
      <th>是否发货</th>
      <th>店铺</th>
     </tr>
     <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$da): $mod = ($i % 2 );++$i;?><tr>
      <td><img src="<?php echo ($da["pimg"]); ?>" class="thumbnail"/></td>
      <td><?php echo ($da["pname"]); ?></td>
      <td>
       <span>
        <i>￥</i>
        <em><?php echo ($da["pprice"]); ?></em>
       </span>
      </td>
      <td><?php echo ($da["buycount"]); ?></td>
      <td>
       <span>
        <i></i>
        <em>未发货</em>
       </span>
      </td>
      <td>
       <span>
        <em>店铺A</em>
       </span>
      </td>
     </tr><?php endforeach; endif; else: echo "" ;endif; ?>
     <tr>
      <td colspan="6">
       <div class="fr">
        <span style="font-size:15px;font-weight:bold;">
         <i>订单共计金额：￥</i>
         <b><?php echo ($res["ordermoney"]); ?></b>
        </span>
       </div>
      </td>
     </tr>
    </table>
   </dd>
   <dd>
    <table class="noborder">
     <tr>
      <td width="10%" style="text-align:right;"><b>管理员操作：</b></td>
      <td>
       <textarea class="block" style="width:80%;height:35px;outline:none;"></textarea>
      </td>
     </tr>
    </table>
   </dd>
   <dd>
      <!-- Operation -->
	  <div class="BatchOperation">
	   <input type="button" value="打印订单" class="btnStyle"/>
	   <input type="button" value="配送" class="btnStyle"/>
	   <input type="button" value="发货" class="btnStyle"/>
	   <input type="button" value="取消订单" class="btnStyle"/>
	  </div>
   </dd>
  </dl>
 </div>
</body>
</html>