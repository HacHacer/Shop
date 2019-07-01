<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/Shop/Public/Back/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
	<style>
		#ver input{
			padding: 10px 5px;
			margin-left: 10px;
			margin-top: 20px;
			border: none;
			text-align: left;
			color: #757575;
			width:100px;
			vertical-align: top ;
		}
		#ver img{
			height: 36px;
			margin-left: 13px;
			margin-top: 20px;
			vertical-align: top;
		}
	</style>
</head>
<body>
<div class="cotn_principal">
	<div class="cont_centrar">
		<div class="cont_login">
			<div class="cont_info_log_sign_up">
				<div class="col_md_login">
					<div class="cont_ba_opcitiy">
						<h2>LOGIN</h2>
						<p>Lorem ipsum dolor sit amet, consectetur.</p>
						<button class="btn_login" onClick="cambiar_login()">LOGIN</button>
					</div>
				</div>
				<div class="col_md_sign_up">
					<div class="cont_ba_opcitiy">
						<h2>SIGN UP</h2>
						<p>Lorem ipsum dolor sit amet, consectetur.</p>
						<button class="btn_sign_up" onClick="cambiar_sign_up()">SIGN UP</button>
					</div>
				</div>
			</div>
			<div class="cont_back_info">
				<div class="cont_img_back_grey"> <img src="/Shop/Public/po.jpg" alt="" /> </div>
			</div>
			<div class="cont_forms" >
				<div class="cont_img_back_"> <img src="/Shop/Public/po.jpg" alt="" /> </div>
					<div class="cont_form_login"> <a href="#" onClick="ocultar_login_sign_up()" ><i class="material-icons">&#xE5C4;</i></a>
						<h2>LOGIN</h2>
						<input type="text" placeholder="Username" name="username" id="name"/>
						<input type="password" placeholder="Password" name="userpwd" id="pwd"/>
						<button class="btn_login" onClick="warn1()">登录</button>
					</div>
				<form action="register" method="post" onsubmit="return confirm('是否提交')">
					<div class="cont_form_sign_up"> <a href="#" onClick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
						<h2>SIGN UP</h2>
						<input type="text" placeholder="User" name="username"/>
						<input type="password" placeholder="Password" name="userpwd" />
						<input type="password" placeholder="Confirm password" />
						<button class="btn_sign_up" type="submit" onClick="cambiar_sign_up()">注册</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="/Shop/Public/Back/js/index.js"></script>

</body>
</html>

<script>
	aa=document.querySelector('#name');
	bb=document.querySelector('#pwd');
    function warn1() {
        var prevLink = document.referrer;
        var requestURL = 'login?username='+aa.value+'&userpwd='+bb.value;
        var request=new XMLHttpRequest();
        request.open('GET',requestURL);
        request.send();
        request.onload = function() {
            var data = request.response;
            if (data != '0') {
                alert(data + '登录成功');
                if (prevLink == '') {
                    location.href = 'index';
                } else {
                    location.href = prevLink;
                }
            }
            else {
                alert('账号或密码错误');
            }
        }

    }
</script>