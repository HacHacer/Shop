<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="/Shop/Public/Car/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="/Shop/Public/Car/css/order.css" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="/Shop/Public/Car/js/jquery-1.9.0.min.js"></script>
    <script src="/Shop/Public/Car/js/base.min.js"></script>
    <script type="text/javascript" src="/Shop/Public/Car/js/address_all.js"></script>
    <script type="text/javascript" src="/Shop/Public/Car/js/checkout.min.js"></script>
    <style>
        #baidumap{
            position: fixed;
            top:50%;
            left: 50%;
            z-index: 9999;
            display: none;
            padding: 5px;
            border: 1px solid #7f7f7f;
            transform: translateX(-50%);
            margin-top: -175px;
            background-color: white;
        }
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
        .x{
            font-size: 20px;
            cursor: pointer;
            float: right;
        }
    </style>
</head>
<body>
<div id="baidumap">
    <div class="x">&times;</div>
    <iframe width="600" height="390" scrolling="no" name="mapp">
    </iframe>
</div>

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
                <div class="search_box">
                    <form action="product" method="post">
                        <input type="text" value="搜索商品" name="search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '搜索商品';}"><input type="submit" value="">
                    </form>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="border_top_cart">
    <script type="text/javascript">
        var checkoutConfig={
            addressMatch:'common',
            addressMatchVarName:'data',
            hasPresales:false,
            hasBigTv:false,
            hasAir:false,
            hasScales:false,
            hasGiftcard:false,
            totalPrice:244.00,
            postage:10,//运费
            postFree:true,//活动是否免邮了
            bcPrice:150,//计算界值
            activityDiscountMoney:0.00,//活动优惠
            showCouponBox:0,
            invoice:{
                NA:"0",
                personal:"1",
                company:"2",
                electronic:"4"
            }
        };
        var miniCartDisable=true;
    </script>
    <div class="container">
                <div class="checkout-box-bd">
                    <!-- 地址状态 0：默认选择；1：新增地址；2：修改地址 -->
                    <!-- 收货地址 -->
                    <div class="xm-box">
                        <div class="box-hd ">
                            <h2 class="title">收货地址</h2>
                            <!---->
                        </div>
                        <div class="box-bd">
                            <form action="postorder" method="post" onsubmit="return confirm('确认订单信息正确')">
                            <div class="clearfix xm-address-list" id="checkoutAddrList">
                                <?php if(is_array($address)): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$add): $mod = ($i % 2 );++$i;?><dl class="item onn" onclick="selectthis(<?php echo ($i-1); ?>)">
                                        <dt>
                                            <strong class="itemConsignee"><?php echo ($add["cname"]); ?></strong>
                                            <span class="itemTag tag"><?php echo ($add["tip"]); ?></span>
                                        </dt>
                                        <dd>
                                            <p class="tel itemTel"><?php echo ($add["phone"]); ?></p>
                                            <p class="itemRegion"><?php echo ($add["sheng"]); ?> <?php echo ($add["shi"]); ?> <?php echo ($add["qu"]); ?></p>
                                            <p class="itemStreet"><?php echo ($add["adetial"]); ?></p>
                                            <span class="edit-btn J_editAddr">编辑</span>
                                        </dd>
                                        <dd style="display: none;">
                                            <input type="radio" name="aid" value="<?php echo ($add["aid"]); ?>" class="abbs">
                                        </dd>
                                    </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="item use-new-addr"  id="J_useNewAddr" data-state="off">
                                    <span class="iconfont icon-add"><img src="/Shop/Public/Car/images/add_cart.png" /></span>
                                    使用新地址
                                </div>
                            </div>
                                <div class="wrap222">
                                <div class="checkout-box-ft">
                                    <!-- 商品清单 -->
                                    <div id="checkoutGoodsList" class="checkout-goods-box">
                                        <div class="xm-box">
                                            <div class="box-hd">
                                                <h2 class="title">确认订单信息</h2>
                                            </div>
                                            <div class="box-bd">
                                                <dl class="checkout-goods-list">
                                                    <dt class="clearfix">
                                                        <span class="col col-1">商品名称</span>
                                                        <span class="col col-2">购买价格</span>
                                                        <span class="col col-3">购买数量</span>
                                                        <span class="col col-4">小计（元）</span>
                                                    </dt>
                                                    <?php if(is_array($product)): $i = 0; $__LIST__ = $product;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pro): $mod = ($i % 2 );++$i;?><dd class="item clearfix">
                                                        <div class="item-row">
                                                            <div class="col col-1">
                                                                <div class="g-pic">
                                                                    <img src="<?php echo ($pro["pimg"]); ?>"  width="40" height="40" />
                                                                </div>
                                                                <div class="g-info">
                                                                    <a href="#">
                                                                        <?php echo ($pro["pname"]); ?></a>
                                                                </div>
                                                            </div>

                                                            <div class="col col-2"><?php echo ($pro["pprice"]); ?>元</div>
                                                            <div class="col col-3"><?php echo ($pro["count"]); ?></div>
                                                            <div class="col col-4"><?php echo ($pro["xj"]); ?>元</div>
                                                        </div>
                                                    </dd><?php endforeach; endif; else: echo "" ;endif; ?>
                                                </dl>
                                                <div class="checkout-count clearfix">
                                                    <div class="checkout-count-extend xm-add-buy">
                                                        <h2 class="title">会员留言</h2></br>
                                                            <input type="text" />

                                                    </div>
                                                    <!-- checkout-count-extend -->
                                                    <div class="checkout-price">
                                                        <ul>

                                                            <li>
                                                                订单总额：<span><?php echo ($order["ordermoney"]); ?>元</span>
                                                            </li>
                                                            <li>
                                                                活动优惠：<span>-0元</span>
                                                                <script type="text/javascript">
                                                                    checkoutConfig.activityDiscountMoney=0;
                                                                    checkoutConfig.totalPrice=244.00;
                                                                </script>
                                                            </li>
                                                            <li>
                                                                优惠券抵扣：<span id="couponDesc">-0元</span>
                                                            </li>
                                                            <li>
                                                                运费：<span id="postageDesc">0元</span>
                                                            </li>
                                                        </ul>
                                                        <p class="checkout-total">应付总额：<span><strong ><?php echo ($order["ordermoney"]); ?></strong>元</span></p>
                                                    </div>
                                                    <!--  -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <input type="hidden" value="<?php echo ($order["orderid"]); ?>" name="orderid">
                                <input type="hidden" value="<?php echo ($order["orderdate"]); ?>" name="orderdate">
                                <input type="hidden" value="<?php echo ($order["userid"]); ?>" name="userid">
                                <input type="hidden" value="<?php echo ($order["ordermoney"]); ?>" name="ordermoney">
                                <input type="hidden" value="<?php echo ($order["productnum"]); ?>" name="productnum">
                                <input type="hidden" value="<?php echo ($order["orderstate"]); ?>" name="orderstate">
                                <?php if(is_array($od)): $i = 0; $__LIST__ = $od;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="content">
                                        <input type="hidden" name="Orderid[]" value="<?php echo ($vo["orderid"]); ?>">
                                        <input type="hidden" name="Productid[]" value="<?php echo ($vo["productid"]); ?>">
                                        <input type="hidden" name="buyCount[]" value="<?php echo ($vo["buycount"]); ?>">
                                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="checkout-confirm">
                                    <a href="shopcar" onclick="return confirm('是否放弃该订单')" class="btn btn-lineDakeLight btn-back-cart">返回购物车</a>
                                    <input type="submit" class="btn btn-primary" value="立即下单" id="checkoutToPay" />
                                </div>
                            </form>
                            <!--点击弹出新增/收货地址界面start-->
                            <form action="addver" method="post">
                            <div class="xm-edit-addr-box" id="J_editAddrBox">
                                <input type="hidden" name="userid" value="<?php echo ($uid); ?>">
                                <div class="bd">
                                    <div class="item">
                                        <label>收货人姓名<span>*</span></label>
                                        <input type="text" name="cname" id="Consignee" class="input" placeholder="收货人姓名" maxlength="15" autocomplete='off'>
                                        <p class="tip-msg tipMsg"></p>
                                    </div>
                                    <div class="item">
                                        <label>联系电话<span>*</span></label>
                                        <input type="text" name="phone" class="input" id="Telephone" placeholder="11位手机号" autocomplete='off'>
                                        <p class="tel-modify-tip" id="telModifyTip"></p>
                                        <p class="tip-msg tipMsg"></p>
                                    </div>
                                    <div class="item">
                                        <label>地址<span>*</span></label>
                                        <select name="sheng" id="sheng" class="select-1">
                                            <option disabled style="display: none" selected>选择省份</option>
                                        </select>
                                        <select name="shi"  id="shi" class="select-2">
                                            <option disabled style="display: none" selected>选择城市</option>
                                        </select>
                                        <select name="qu"  id="qu" class="select-3">
                                            <option disabled style="display: none" selected>选择区县</option>
                                        </select>
                                        <textarea   name="adetial" class="input-area" id="Street" placeholder="路名或街道地址，门牌号"></textarea>
                                        <p class="tip-msg tipMsg"></p>
                                    </div>
                                    <div class="item">
                                        <label>邮政编码<span>*</span></label>
                                        <input type="text" name="postcode" id="Zipcode" class="input" placeholder="邮政编码"  autocomplete='off'>
                                        <p class="zipcode-tip" id="zipcodeTip"></p>
                                        <p class="tip-msg tipMsg"></p>
                                    </div>
                                    <div class="item">
                                        <label>地址标签<span>*</span></label>
                                        <input type="text" name="tip" id="Tag" class="input" placeholder='地址标签：如"家"、"公司"。限5个字内'  >
                                        <p class="tip-msg tipMsg"></p>
                                    </div>
                                </div>
                                <div class="ft clearfix">
                                    <button  type="button"  class="btn btn-lineDake btn-small " id="J_editAddrCancel">取消</button>
                                    <button type="submit" class="btn btn-primary btn-small">保存</button>
                                </div>
                            </div>
                            </form>
                            <!--点击弹出新增/收货地址界面end-->
                            <div class="xm-edit-addr-backdrop" id="J_editAddrBackdrop"></div>
                        </div>
                    </div>
                    <!-- 收货地址 END-->
                </div>
        </div>
    <!-- 保险弹窗 -->
    <!-- 保险弹窗 -->
</div>
</body>
</html>
<script type="text/javascript">
    odl=document.getElementsByClassName('onn');
    ora=document.getElementsByClassName('abbs');
    function selectthis(e){
        for(i=0;i<odl.length;i++)
        {
            if(i==e)
            {
                odl[i].style.borderColor='#ff4c00';
                ora[i].checked=true;
            }
            else
            {
                odl[i].style.borderColor='';
            }
        }

    }
    $(document).ready(function() {
        $('#set,.myself').hover(function () {
            $('.myself').toggle();
        });
    });
    var sh= document.querySelector('#sheng');
    var city = document.querySelector('#shi');
    var qu = document.querySelector('#qu');
    var requestURL = 'http://localhost/Shop/Application/Home/View/superheroes.json';
    var request=new XMLHttpRequest();
    request.open('GET',requestURL);
    request.responseType = 'json';
    request.send();
    request.onload = function() {
        superHeroes = request.response;
        for(i=0;i<superHeroes.length;i++)
        {
            op=document.createElement('option');
            op.innerText=superHeroes[i]['name'];
            op.value=superHeroes[i]['name'];
            sh.appendChild(op);
        }
    };
    sh.onchange=function () {
        city.focus();
        city.innerHTML='<option disabled style="display: none" selected>选择城市</option>';
        qu.innerHTML='<option disabled style="display: none" selected>选择区县</option>';
        var index=sh.selectedIndex;
        var s=superHeroes[index-1]['city'];
        for(i=0;i<s.length;i++)
        {
            op=document.createElement('option');
            op.value=op.innerText=s[i]['name'];
            city.appendChild(op);
        }
    };
    city.onchange=function () {
        qu.focus();
        qu.innerHTML='<option disabled style="display: none" selected>选择区县</option>';
        var index1=sh.selectedIndex;
        var s=superHeroes[index1-1]['city'];
        var index=city.selectedIndex;
        var area=s[index-1]['area'];
        for(i=0;i<area.length;i++)
        {
            op=document.createElement('option');
            op.value=op.innerText=area[i];
            qu.appendChild(op);
        }

    };

    $(function () {
        $('#Street').on('click',function () {
            addvalue=sh.value+city.value+qu.value;
            $('#baidumap').css('display','block');
            mm=window.open('map?add='+addvalue,'mapp');
        });
    });
    $(function () {
        $('.x').on('click',function () {
            $('#baidumap').css('display','none');
            mm.close();
            $.get("showit",function(data){
                $('#Street').text(data);
            });
        });
    })
   // ifa=document.getElementById('ifa');
   // console.log(ifa.src);
   //  $(function () {
   //      $('#qu').on('change',function () {
   //          var address=sh.value+city.value+qu.value;
   //          $.get("map",{add:address},function(data){
   //          });
   //      })
   //  });
    // qu.onchange=function () {
    //     // document.getElementById('adds').innerText=document.getElementsByName('addressid')[0].value=sh.value+city.value+qu.value;
    //     console.log(sh.value+city.value+qu.value);
    //
    // }
    /*
    -------------------地图-------------------------
     */
</script>