<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
<title>产品列表</title>
<link href="/Shop/Public/Back/css/adminStyle.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" charset="utf-8" src="/Shop/Public/ueditor/ueditor.config.js"></script>
 <script type="text/javascript" charset="utf-8" src="/Shop/Public/ueditor/ueditor.all.min.js"> </script>
 <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
 <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
 <script type="text/javascript" charset="utf-8" src="/Shop/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
  <div class="wrap">
   <div class="page-title">
    <span class="modular fl"><i class="add"></i><em>添加产品</em></span>
    <span class="modular fr"><a href="product_list.html" class="pt-link-btn">产品列表</a></span>
   </div>
   <form action="goodinsert" enctype="multipart/form-data" method="post">
    <table class="list-style">
     <tr>
      <td style="text-align:right;width:15%;">产品名称：</td>
      <td><input type="text" class="textBox length-long" onblur="warn1(this)" name="pname"/></td>
     </tr>
     <tr>
      <td style="text-align:right;">产品分类：</td>
      <td>
       <select class="textBox" name="ptid">
        <option disabled style="display: none" selected>选择小类别</option>
        <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ty): $mod = ($i % 2 );++$i;?><option value="<?php echo ($ty["ptid"]); ?>">
          <?php echo ($ty["ptname"]); ?>
         </option><?php endforeach; endif; else: echo "" ;endif; ?>
       </select>
      </td>
     </tr>
     <tr>
      <td style="text-align:right;">市场价：</td>
      <td>
       <input type="text" class="textBox length-short" name="pprice"/>
       <span>元</span>
      </td>
     </tr>
     <tr>
      <td style="text-align:right;">库存：</td>
      <td>
       <input type="text" class="textBox length-short" name="pcount"/>
      </td>
     </tr>
     <tr>
      <td style="text-align:right;">产品描述：</td>
      <td><input type="text" class="textBox length-long" name="pnote"/></td>
     </tr>
     <tr>
      <td style="text-align:right;">推荐至：</td>
      <td>
       <input type="checkbox" name="pisjing" id="jingpin"/>
       <label for="jingpin">精品</label>
       <input type="checkbox" name="pisxin" id="xinpin"/>
       <label for="xinpin">新品</label>
       <input type="checkbox" name="pisre" id="rexiao"/>
       <label for="rexiao">热销</label>
      </td>
     </tr>
     <tr>
      <td style="text-align:right;">产品缩放图片：</td>
      <td>
       <input type="file" id="suoluetu" name="pimg"/>
       <!--<label for="suoluetu" class="labelBtnAdd">+</label>-->
       <!--<img src="#" width="60" height="60" class="mlr5" id="imgsss"/>-->
      </td>
     </tr>
     <tr>
      <td style="text-align:right;">产品详情：</td>
      <td><textarea name="pdetail" id="brief"></textarea></td>
     </tr>
     <tr>
      <td style="text-align:right;"></td>
      <td><input type="submit" value="发布新商品" class="tdBtn"/></td>
     </tr>
    </table>
   </form>
  </div>
</body>
</html>
<script>
     aa=document.querySelector('#brief');
     function warn1(a) {
         var requestURL = 'productname?name='+a.value;
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

     var ue = UE.getEditor('brief',{
         initialContent:'欢迎使用UMEDITOR!',
         initialFrameWidth:800,
         initialFrameHeight:370,});

</script>