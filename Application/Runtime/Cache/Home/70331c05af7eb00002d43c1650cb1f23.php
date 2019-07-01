<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>产品列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Shop/Public/Back/css/adminStyle.css" rel="stylesheet" type="text/css" />
<script src="/Shop/Public/Back/js/jquery.js"></script>
<script src="/Shop/Public/Back/js/public.js"></script>
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i></i><em>产品列表</em></span>
    <span class="modular fr"><a href="/Shop/Home/Login/edit_product" class="pt-link-btn">+添加商品</a></span>
  </div>
  <div class="operate">
   <form action="product_list" method="post">
    <select class="inline-select">
     <option>A店铺</option>
     <option>B店铺</option>
    </select>
    <input type="text" class="textBox length-long" placeholder="输入产品名称..." name="pname"/>
    <input type="submit" value="查询" class="tdBtn"/>
   </form>
  </div>
  <form action="deletepros" method="post">
  <table class="list-style Interlaced">
   <tr>
    <th></th>
    <th>ID编号</th>
    <th>产品</th>
    <th>名称</th>
    <th>市场价</th>
    <th>库存</th>
    <th>精品</th>
    <th>新品</th>
    <th>热销</th>
    <th>操作</th>
   </tr>
   <?php if(is_array($product)): $i = 0; $__LIST__ = $product;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pro): $mod = ($i % 2 );++$i;?><tr>
    <td ><input type="checkbox" class="middle children-checkbox aa" name="pids[]" value="<?php echo ($pro["pid"]); ?>"/></td>
    <td class="center">
     <span>
     <i><?php echo ($pro["pid"]); ?></i>
     </span>
    </td>
    <td class="center pic-area"><img src="<?php echo ($pro["pimg"]); ?>" width="65px"/></td>
    <td class="td-name center">
      <span class="ellipsis td-name block"><?php echo ($pro["pname"]); ?></span>
    </td>
    <td class="center">
     <span>
      <i>￥</i>
      <em><?php echo ($pro["pprice"]); ?></em>
     </span>
    </td>
    <td class="center">
     <span>
      <em><?php echo ($pro["pcount"]); ?></em>
      <i>件</i>
     </span>
    </td>
    <?php if(($pro["pisjing"] == 0)): ?><td class="center"><img src="/Shop/Public/Back/images/no.gif"/></td>
     <?php else: ?>
     <td class="center"><img src="/Shop/Public/Back/images/yes.gif"/></td><?php endif; ?>
    <?php if(($pro["pisxin"] == 0)): ?><td class="center"><img src="/Shop/Public/Back/images/no.gif"/></td>
     <?php else: ?>
     <td class="center"><img src="/Shop/Public/Back/images/yes.gif"/></td><?php endif; ?>
    <?php if(($pro["pisre"] == 0)): ?><td class="center"><img src="/Shop/Public/Back/images/no.gif"/></td>
     <?php else: ?>
     <td class="center"><img src="/Shop/Public/Back/images/yes.gif"/></td><?php endif; ?>
    <td class="center">
     <a href="http://www.baidu.com/跳转至前台页面哦" title="查看" target="_blank"><img src="/Shop/Public/Back/images/icon_view.gif"/></a>
     <a href="product?pid=<?php echo ($pro["pid"]); ?>" title="编辑"><img src="/Shop/Public/Back/images/icon_edit.gif"/></a>
     <a href="deletepro?pid=<?php echo ($pro["pid"]); ?>" title="删除"><img src="/Shop/Public/Back/images/icon_drop.gif"/></a>
    </td>
   </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </table>
  <!-- BatchOperation -->
  <div style="overflow:hidden;">
      <!-- Operation -->
	  <div class="BatchOperation fl">
	   <input type="checkbox" id="hh" style="display: none;"/>
	   <label for="del" class="btnStyle middle"  onclick="hh()" >全选</label>
	   <input type="submit" value="批量删除" class="btnStyle"/>
	  </div>
	  <!-- turn page -->
   <div class="turnPage center fr"><?php echo ($page); ?></div>
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