<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="/Shop/Public/jq/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="/Shop/Public/jq/jq1.css">
    <title>Title</title>
    <style>
        /*div{*/
            /*width: 1200px;*/
            /*height: 500px;*/
            /*margin: 0 auto;*/
            /*transform: translateY(50%);*/
            /*text-align: center;*/
        /*}*/
    </style>
</head>
<body>
    <div class="wrap">
        <img src="/Shop/Public/jq/images/disc-rotate.gif" height="352" width="352" id="img1"/>
        <div class="zhen">
            <a href="javascript:" id="aaa" onclick="roo()"><img src="/Shop/Public/jq/images/buttons_01.png"></a>
        </div>
        <div class="zhh">
            <img src="/Shop/Public/jq/images/arrow.png" height="191" width="32"/>
        </div>
    </div>
</body>
</html>
<script>
    function roo() {
        var a=Math.ceil(Math.random()*360+1);
        var b=a+1800;
        $(function () {
            $('#img1').css('transform','rotateZ('+b+'deg)');
            getit(a);
        });

    }
    function getit(a) {
        var c=Math.floor(360/7);
        var b=Math.ceil(a/c);
        switch (b)
        {
            case 1:return alert('100G');break;
            case 2:return alert('36M');break;
            case 3:return alert('100经验值');break;
            case 4:return alert('360M');break;
            case 5:return alert('36经验值');break;
            case 6:return alert('100M');break;
            case 7:return alert('360经验值');break;
        }
        // switch (a/360){
        //     case
        // }
    }
</script>