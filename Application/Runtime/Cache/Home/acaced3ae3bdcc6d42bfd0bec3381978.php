<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>购物车</title>
    <link rel="stylesheet" href="/Shop/Public/Car/css/shopcar.css">
    <link href="/Shop/Public/Car/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="/Shop/Public/Car/js/jquery-1.9.0.min.js"></script>
    <style>
        .san{
            width:0;
            height:0;
            border-width:0 15px 15px;
            border-style:solid;
            border-color:transparent transparent white;/*透明 透明  灰*/
            margin:0 auto;
            position:relative;
            top:1px;
        }
        .myself{
            position: absolute;
            width: 100px;
            left:68px;
            top:-12px;
            z-index: 10;
            background: transparent;
            display: none;
        }
        .myself .blank{
            width: 100%;
            height: 30px;
            background: transparent;
        }
        .myself ul{
            background: white;
            border-radius: 5px;
            border: 1px solid rgba(0, 0, 0, 0.33);
        }
        .myself ul li{
            display: block;
            float: none;
            border: none;
            margin: 5px;
        }
    </style>
</head>
<body>
<div class="headertop_desc">
    <div class="wrap">
        <div class="nav_list">
            <ul>
                <li><a href="index.html">首页</a></li>
                <li><a href="#">联系电话：123090</a></li>
                <li><a href="#">在线客服</a></li>
            </ul>
        </div>
        <div class="account_desc">
            <ul>
                <?php if(($status == 0)): ?><li><a href="contact.html">登录</a></li>
                    <li><a href="contact.html">注册</a></li>
                    <?php else: ?>
                    <li><a id="set"> 欢迎你:尊敬的<?php echo ($username); ?></a></li>
                    <li><a href="contact.html">注册</a></li>
                    <li><a href="preview.html">付款</a></li>
                    <li><a href="#">查看购物车</a></li>
                    <li><a href="#">我的订单</a></li><?php endif; ?>
            </ul>
            <div class="myself">
                <div class="blank"></div>
                <div class="san"></div>
                <ul>
                    <li><a href="index.html">我的消息</a></li>
                    <li><a href="#">个人信息</a></li>
                    <li><a href="#">设置</a></li>
                    <li><a href="loginout">退出登录</a></li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="container">
    <form action="getorder" method="post" onsubmit="return fun1()">
        <div class="good-list">
            <div class="head">
                <div class="allco"><input name="all" type="checkbox" id="hh"><a onclick="hh()" href="javascript:">全选</a></div>
                <div class="name">商品名称</div>
                <div class="price">单价</div>
                <div class="mount">数量</div>
                <div class="gen">小计</div>
                <div class="do">操作</div>
            </div>
            <?php if(is_array($view)): $i = 0; $__LIST__ = $view;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vi): $mod = ($i % 2 );++$i;?><div class="god-wrap">
                    <ul class="th">
                        <li class="aa"><input type="checkbox"  name="productid[]" value="<?php echo ($vi["pid"]); ?>" onclick="check()"></li>
                        <li class="bb"><div class="img"><img src="<?php echo ($vi["pimg"]); ?>" width="80"/></div><div class="na"><?php echo ($vi["pname"]); ?></div> </li>
                        <li class="cc"><?php echo ($vi["pprice"]); ?></li>
                        <li class="ee"><a href="javascript:" onclick="los(<?php echo ($i-1); ?>)">-</a><input type="text" name="text" value="<?php echo ($vi["count"]); ?>"><a href="javascript:"  onclick="sum(<?php echo ($i-1); ?>)">+</a></li>
                        <li class="ff"><?php echo ($vi["xj"]); ?>元</li>
                        <li class="dd"><a href="carsplice?pid=<?php echo ($i-1); ?>" onclick="return fun1()">&times;</a></li>
                    </ul>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="all">
            <div class="left" >
                <a style="margin:0 30px;" href="javascript:">继续购物</a>
                <span id="spp">共3件商品，已选择商品0件</span>
            </div>
            <div class="right">

                合计:<span class="font30">0.00元</span><input type="hidden" name="ordermoney" id="money">
                <button class="btn1" type="submit"  name="btn1">提交订单</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
<script>
    $(document).ready(function() {
        $('#set,.myself').hover(function () {
            $('.myself').toggle();
        });
    });
    function fun1() {
        a=confirm('是否提交');
        if(a)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    aa=document.getElementsByClassName('aa');
    txt=document.getElementsByName('text');
    ff=document.getElementsByClassName('ff');
    cc=document.getElementsByClassName('cc');
    var good=document.getElementsByClassName('god-wrap').length;
    document.getElementById('spp').innerHTML='共<em>'+good+'</em>件商品，已选择商品0件</em>件';
    function los(num) {
        if(parseInt(txt[num].value)>=1)
        {
            txt[num].value=parseInt(txt[num].value)-1;
        }
        ff[num].innerText=cc[num].innerText.match(/(\d)+/)[0]*parseInt(txt[num].value)+'元';
        check();
    }
    function sum(num) {
        txt[num].value=parseInt(txt[num].value)+1;
        ff[num].innerText=cc[num].innerText.match(/(\d)+/)[0]*parseInt(txt[num].value)+'元';
        check();
    }
    (function (i) {
        for(i=0;i<txt.length;i++)
        {
            txt[i].onkeyup=function () {
                if(parseInt(this.value)>=1)
                {
                    a=this.parentNode.previousElementSibling.innerText.match(/(\d)+/)[0];
                    this.parentNode.nextElementSibling.innerText=parseInt(a)*parseInt(this.value)+'元';
                    check();
                }
                else {
                    this.value=1;
                    a=this.parentNode.previousElementSibling.innerText.match(/(\d)+/)[0];
                    this.parentNode.nextElementSibling.innerText=parseInt(a)*parseInt(this.value)+'元';
                    check();
                }

            }
        }
    })();
    count=0;
    sumin=0;
    allp=document.getElementsByClassName('font30')[0];

    function check() {
        (function (i) {
            for(i=0;i<aa.length;i++)
            {
                if(aa[i].children[0].checked==true)
                {
                    price=aa[i].parentNode.children[4].innerText.match(/(\d)+/)[0];
                    sumin+=parseInt(price);
                    count++;
                }
                else {
                    if( document.getElementById('hh').checked==true)
                    {document.getElementById('hh').checked=false;kk=true;}
                }
            }
            mo=allp.innerText=sumin+'元';
            document.getElementById('money').value=sumin;
            document.getElementById('spp').innerHTML='共<em>'+good+'</em>件商品，已选择商品<em>'+count+'</em>件';
            jj=document.getElementById('spp').innerText;
            if(count>0)
            {
                btn1[0].style.backgroundColor="#ff4400" ;
                btn1[0].style.cursor='pointer'
            }
            else {
                btn1[0].style.backgroundColor="#B0B0B0";
                btn1[0].style.cursor='not-allowed';
            }
            count=0;
            sumin=0;
        })();
    }
    kk=true;
    chec=document.getElementById('hh');
    function hh() {
        if(kk==true) {
            chec.checked=true;
            for (j = 0; j < aa.length; j++) {

                aa[j].children[0].checked = true;
            }
            kk = false;
        }
        else
        {
            chec.checked=false;
            for (i = 0; i< aa.length; i++) {
                aa[i].children[0].checked = false;
            }
            kk = true;
        }
        check();
    }
    btn1=document.getElementsByClassName('btn1');
</script>