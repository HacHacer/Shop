<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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
        <span class="modular fl"><i class="add"></i><em>编辑产品</em></span>
        <span class="modular fr"><a href="product_list.html" class="pt-link-btn">产品列表</a></span>
    </div>
    <form action="updatepro" enctype="multipart/form-data" method="post">
        <input type="hidden" value="<?php echo ($pid); ?>" name="pid">
        <table class="list-style">
            <tr>
                <td style="text-align:right;width:15%;">产品名称：</td>
                <td><input type="text" class="textBox length-long" id='cc' onblur="warn2(this)" name="pname" value="<?php echo ($product["pname"]); ?>"/></td>
            </tr>
            <tr>
                <td style="text-align:right;">产品分类：</td>
                <td>
                    <select class="textBox" name="ptid">
                        <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ty): $mod = ($i % 2 );++$i; if($ty["ptid"] == $product[ptid]): ?><option value="<?php echo ($ty["ptid"]); ?>" selected>
                                    <?php echo ($ty["ptname"]); ?>
                                </option>
                                <?php else: ?>
                                <option value="<?php echo ($ty["ptid"]); ?>">
                                    <?php echo ($ty["ptname"]); ?>
                                </option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="text-align:right;">市场价：</td>
                <td>
                    <input type="text" class="textBox length-short" name="pprice" value="<?php echo ($product["pprice"]); ?>"/>
                    <span>元</span>
                </td>
            </tr>
            <tr>
                <td style="text-align:right;">库存：</td>
                <td>
                    <input type="text" class="textBox length-short" name="pcount" value="<?php echo ($product["pcount"]); ?>"/>
                </td>
            </tr>
            <tr>
                <td style="text-align:right;">产品描述：</td>
                <td><input type="text" class="textBox length-long" name="pnote" value="<?php echo ($product["pnote"]); ?>"/></td>
            </tr>
            <tr>
                <td style="text-align:right;">推荐至：</td>
                <td>
                <?php if(($product[pisjing] == 0)): ?><input type="checkbox" name="pisjing" id="jingpin"/>
                    <label for="jingpin">精品</label>
                    <?php else: ?>
                    <input type="checkbox" name="pisjing" id="jingpin" checked/>
                    <label for="jingpin">精品</label><?php endif; ?>
                    <?php if(($product[pisxin] == 0)): ?><input type="checkbox" name="pisxin" id="xinpin"/>
                        <label for="xinpin">新品</label>
                        <?php else: ?>
                        <input type="checkbox" name="pisxin" id="xinpin" checked/>
                        <label for="xinpin">新品</label><?php endif; ?>
                    <?php if(($product[pisre] == 0)): ?><input type="checkbox" name="pisre" id="rexiao"/>
                        <label for="rexiao">热销</label>
                        <?php else: ?>
                        <input type="checkbox" name="pisre" id="rexiao" checked/>
                        <label for="rexiao">热销</label><?php endif; ?>
                </td>
            </tr>
            <tr>
                <td style="text-align:right;">产品缩放图片：</td>
                <td>
                    <input type="file" id="suoluet" name="pimg"/>
                    <!--<label for="suoluetu" class="labelBtnAdd">+</label>-->
                    <!--<img src="#" width="60" height="60" class="mlr5" id="imgsss"/>-->
                </td>
            </tr>
            <tr>
                <td style="text-align:right;">产品详情：</td>
                <td><textarea name="pdetail" id="brief"><?php echo ($product["pdetial"]); ?></textarea></td>
            </tr>
            <tr>
                <td style="text-align:right;"></td>
                <td><input type="submit" value="确认修改" class="tdBtn"/></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
<script>
    oldname=document.querySelector('#cc').value;
    function warn2(a) {
        var requestURL = 'productname2?name='+a.value+'&oldname='+oldname;
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