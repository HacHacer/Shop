<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="/Shop/Public/Car/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="/Shop/Public/Car/css/slider.css" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="/Shop/Public/Car/js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="/Shop/Public/Car/js/move-top.js"></script>
    <script type="text/javascript" src="/Shop/Public/Car/js/easing.js"></script>
    <script type="text/javascript" src="/Shop/Public/Car/js/jquery.nivo.slider.js"></script>
    <title>搜索物品</title>
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
<div class="header">
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
                        <li><a href="shopcar">查看购物车</a></li>
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
    <div class="wrap">
        <div class="header_top">
            <div class="logo">
                <a href="index.html"><img src="/Shop/Public/Car/images/logo.png" alt="" title="前往首页" width="150"/></a>
            </div>
            <div class="header_top_right">
                <div class="cart">
                    <p><span>购物车</span><div id="dd" class="wrapper-dropdown-2"> <?php echo ($num); ?>种商品
                    <ul class="dropdown">
                    </ul></div></p>
                </div>
                <div class="search_box">
                    <form action="product" method="post">
                        <input type="text" value="搜索商品" name="search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '搜索商品';}"><input type="submit" value="">
                    </form>
                </div>
                <div class="clear"></div>
            </div>
            <script type="text/javascript">
                function DropDown(el) {
                    this.dd = el;
                    this.initEvents();
                }
                DropDown.prototype = {
                    initEvents : function() {
                        var obj = this;

                        obj.dd.on('click', function(event){
                            $(this).toggleClass('active');
                            event.stopPropagation();
                        });
                    }
                }

                $(function() {

                    var dd = new DropDown( $('#dd') );

                    $(document).click(function() {
                        // all dropdowns
                        $('.wrapper-dropdown-2').removeClass('active');
                    });

                });
                $(document).ready(function() {
                    $().UItoTop({ easingType: 'easeOutQuart' });
                    $('#set,.myself').hover(function () {
                        $('.myself').toggle();
                    });});
            </script>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="main">
    <div class="wrap">
        <div class="content">
            <div class="content_top">
                <div class="heading">
                    <h3>‘<?php echo ($val); ?>’共<?php echo ($count); ?>件商品</h3>
                </div>
            </div>
            <div class="section group">
                <?php if(is_array($product)): $i = 0; $__LIST__ = $product;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xin): $mod = ($i % 2 );++$i;?><div class="grid_1_of_5 images_1_of_5">
                        <div class="conimg">
                            <a href="preview?pid=<?php echo ($xin["pid"]); ?>"><img src="<?php echo ($xin["pimg"]); ?>" alt="" /></a>
                        </div>
                        <h2><a href="preview?pid=<?php echo ($xin["pid"]); ?>"><?php echo ($xin["pname"]); ?></a></h2>
                        <div class="price-details">
                            <div class="price-number">
                                <p><span class="rupees">$<?php echo ($xin["pprice"]); ?></span></p>
                            </div>
                            <div class="add-cart">
                                <h4><a href="addtocar?pid=<?php echo ($xin["pid"]); ?>">加入购物车</a></h4>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('#set,.myself').hover(function () {
            $('.myself').toggle();
        });
        var requestURL = 'showcar';
        var request = new XMLHttpRequest();
        request.open('GET', requestURL);
        request.send();
        request.responseType="json";
        oul=document.getElementsByClassName('dropdown')[0];
        request.onload = function () {
            var data = request.response;
            if(data.length<=0)
            {
                oli=document.createElement('li');
                oli.innerText='你的购物车是空的';
                oul.appendChild(oli);
            }
            else
            {
                if(data.length>6)
                {
                    len=6;
                }
                else
                {
                    len=data.length;
                }
                for(i=0;i<len;i++)
                {
                    oli=document.createElement('li');
                    oli.innerHTML='<img width="30" src='+data[i].pimg+'><a href="preview?pid='+data[i].pid+'">'+data[i].pname+'</a><span>&times;'+data[i].count+'件</span>';
                    oul.appendChild(oli);
                }
                oli2=document.createElement('li');
                oli2.innerHTML='<a href="shopcar">查看全部</a>';
                oul.appendChild(oli2);

            }
        };
    });
</script>