<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<head>
<title>Home</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="/Shop/Public/Car/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="/Shop/Public/Car/css/slider.css" rel="stylesheet" type="text/css" media="all"/>

<script type="text/javascript" src="/Shop/Public/Car/js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="/Shop/Public/Car/js/move-top.js"></script>
<script type="text/javascript" src="/Shop/Public/Car/js/easing.js"></script>
<script type="text/javascript" src="/Shop/Public/Car/js/jquery.nivo.slider.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
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
					     			<input type="text" value="搜索商品" onfocus="this.value =''" onblur="if (this.value == '') {this.value = '搜索商品';}"><input type="submit" value="">
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
					    </script>
			 <div class="clear"></div>
  		</div>     
				<div class="header_bottom">
					<div class="header_bottom_right">
						<!------ Slider ------------>
						<div class="slider">
							<div class="slider-wrapper theme-default">
								<div id="slider" class="nivoSlider">
									<img src="/Shop/Public/Car/images/banner.jpg" data-thumb="images/banner.jpg" alt="" />
									<img src="/Shop/Public/Car/images/banner-2.jpg" data-thumb="images/banner-2.jpg" alt="" />
									<img src="/Shop/Public/Car/images/banner-3.jpg" data-thumb="images/banner-3.jpg" alt="" />
								</div>
							</div>
						</div>
						<!------End Slider ------------>
					</div>
					<div class="header_bottom_left">
						<div class="categories">
						   <ul>
						  	   <h3>商品分类</h3>
							   <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vi): $mod = ($i % 2 );++$i;?><li><a href="product?ptid=<?php echo ($vi["ptid"]); ?>"><?php echo ($vi["ptname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
						  	 </ul>
						</div>
		  	         </div>

			     <div class="clear"></div>
			</div>
   		</div>
   </div>
   <!------------End Header ------------>
  <div class="main">
  	<div class="wrap">
      <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>新品</h3>
    		</div>
    	</div>
	      <div class="section group">
			  <?php if(is_array($xin)): $i = 0; $__LIST__ = $xin;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xin): $mod = ($i % 2 );++$i;?><div class="grid_1_of_5 images_1_of_5">
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
			<div class="content_bottom">
    			<div class="heading">
    				<h3>精品</h3>
    			</div>
    	  	</div>
			<div class="section group">
				<?php if(is_array($jing)): $i = 0; $__LIST__ = $jing;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xin): $mod = ($i % 2 );++$i;?><div class="grid_1_of_5 images_1_of_5">
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
		  <div class="content_bottom">
			  <div class="heading">
				  <h3>热销</h3>
			  </div>
		  </div>
		  <div class="section group">
			  <?php if(is_array($re)): $i = 0; $__LIST__ = $re;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xin): $mod = ($i % 2 );++$i;?><div class="grid_1_of_5 images_1_of_5">
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
   <div class="footer">
   	  <div class="wrap">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Information</h4>
						<ul>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Customer Service</a></li>
						<li><a href="#">Advanced Search</a></li>
						<li><a href="#">Orders and Returns</a></li>
						<li><a href="contact.html">Contact Us</a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Why buy from us</h4>
						<ul>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Customer Service</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="contact.html">Site Map</a></li>
						<li><a href="#">Search Terms</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul>
							<li><a href="contact.html">Sign In</a></li>
							<li><a href="index.html">View Cart</a></li>
							<li><a href="#">My Wishlist</a></li>
							<li><a href="#">Track My Order</a></li>
							<li><a href="contact.html">Help</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>+91-123-456789</span></li>
							<li><span>+00-123-000000</span></li>
						</ul>
						<div class="social-icons">
							<h4>Follow Us</h4>
					   		  <ul>
							      <li><a href="#" target="_blank"><img src="/Shop/Public/Car/images/facebook.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="/Shop/Public/Car/images/twitter.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="/Shop/Public/Car/images/skype.png" alt="" /> </a></li>
							      <li><a href="#" target="_blank"> <img src="/Shop/Public/Car/images/linkedin.png" alt="" /></a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>
			 <div class="copy_right">
				<p>Copyright &copy; 2014.Company name All rights reserved.</p>
		   </div>			
        </div>
    </div>

    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
  </div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
        $().UItoTop({ easingType: 'easeOutQuart' });
        $('#set,.myself').hover(function () {
            $('.myself').toggle();
        });
    });
    $(document).ready(function() {
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
    // function addtocar() {
    //     var requestURL = 'addtocar?pid=14';
    //     var request = new XMLHttpRequest();
    //     request.open('GET', requestURL);
    //     request.send();
    //     request.onload = function () {
    //         var data = request.response;
    //         alert(data);
    //     };
    // }
</script>