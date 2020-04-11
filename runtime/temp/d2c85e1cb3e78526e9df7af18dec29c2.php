<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:33:"./themes/hdindex/login\index.html";i:1551682237;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>登入</title>
  <style>

    html {
      font-size: 6.25vw!important;
      overflow: hidden;
    }
    .footer, .top_fixed{-webkit-transform: translateZ(0);
    }
  </style>
  <link rel="stylesheet" href="https://block-dog.oss-cn-beijing.aliyuncs.com/template/mobile/block/static/css/style.css?v=1.33">
  <link rel="stylesheet" type="text/css" href="https://block-dog.oss-cn-beijing.aliyuncs.com/template/mobile/block/static/css/iconfont.css?v1.1"/>
  <script src="https://block-dog.oss-cn-beijing.aliyuncs.com/template/mobile/block/static/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
  <!--<script src="https://block-dog.oss-cn-beijing.aliyuncs.com/template/mobile/block/static/js/mobile-util.js" type="text/javascript" charset="utf-8"></script>-->
  <script src="https://block-dog.oss-cn-beijing.aliyuncs.com/public/js/global4.js?v1.11"></script>
  <script src="https://block-dog.oss-cn-beijing.aliyuncs.com/public/js/layer/mobile/layer.js"  type="text/javascript" ></script>
  <script src="https://block-dog.oss-cn-beijing.aliyuncs.com/public/js/dropload.min.js"></script>
  <script src="https://block-dog.oss-cn-beijing.aliyuncs.com/template/mobile/block/static/js/common14.js?v=1.82"  type="text/javascript" ></script>
  <meta name="referrer" content="no-referrer">
  <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />


</head>
<body class="">

<style>
  html,
  body {
    background: url(<?php echo (isset($config['bg_img']) && ($config['bg_img'] !== '')?$config['bg_img']:'../../../public/static/Index/assets/images/loginbg.png'); ?>) no-repeat;
    background-size: cover;
    width: 100%;
    height: 100%;
    overflow: hidden;
  }
</style>


<link rel="stylesheet" href="http://block-dog.oss-cn-beijing.aliyuncs.com/clicaptcha/css/captcha.css">

<!--<script src="http://block-dog.oss-cn-beijing.aliyuncs.com/clicaptcha/js/jquery-1.8.3.min.js"></script>-->
<script src="http://block-dog.oss-cn-beijing.aliyuncs.com/clicaptcha/clicaptcha.js"></script>
<div class="flool loginsignup2" style="height:200px" >
  <img src="<?php echo (isset($config['login_img']) && ($config['login_img'] !== '')?$config['login_img']:'../../../public/static/Index/assets/images/logo-login.png'); ?>" alt="WIA DOG" />
</div>
<div class="loginsingup-input" style="margin: 1rem 2rem 0 2rem;">
  <!--登录表单-s-->
  <form id="loginform" method="post">
    <div class="content30">
      <div class="lsu">
        <span>手機</span>
        <input type="text" name="mobile" id="username" value="" placeholder="手機號碼" />
      </div>
      <div class="lsu" style="border-bottom: 0;">
        <span>密碼</span>
        <input type="password" name="password" id="password" value="" placeholder="請輸入密碼" />
        <i class="eye"></i>
      </div>

    </div>
    <div class="submit" style="margin-top: 0.6rem;">
      <input type="button" class="qcode2" id="qnlogin" value="登 入" />
    </div>
    <div style="margin-top: 20px; text-align: right; font-size: 0.6rem;">
      <a id="qrcode" style="color: #fff;float: left;" href="<?php echo url('register'); ?>"><span class="mui-icon-extra mui-icon-extra-sweep"></span> 註冊</a>
      <a href="forget_password.html" style="color: #FFF;"><span>找回密碼</span>
    </div>
  </form>
</div>
<div style="font-size: 0.4rem; color: #A7A7A7; text-align: center; line-height: 0.7rem; margin-top: 4rem;">
  <p>YATAI International(Asia) Asset Management Group</p>
  <p>Bermuda digital asset operation center</p>
</div>

<script type="text/javascript">


    $(function(){
        $('#qnlogin').click(function(){
            submitverify();
        });
    });
    function submitverify() {
        var username = $.trim($('#username').val());
        var password = $.trim($('#password').val());
        var remember = $('#remember').val();
        var referurl = $('#referurl').val();
        if(username == '') {
            showErrorMsg('手機號碼不能為空!');
            return false;
        }
        if(!checkMobile(username)) {
            showErrorMsg('手機號碼格式錯誤!');
            return false;
        }
        if(password == '') {
            showErrorMsg('密碼不能為空!');
            return false;
        }
        try {
            var nwaiting = plus.nativeUI.showWaiting();//显示原生等待框
            nwaiting.close();
        }
        catch (msg) {
            //location.href = "https://down.waldengoton.com/down/app.html";
            //return;
        }
        //setCookie("username",username);

        var data      = {}
        data.mobile   = username;
        data.password = password;
        $.ajax({
            type: 'post',
            url: "/index/login/hdindex",
            data: data,
            dataType: 'json',
            success: function(res) {
                if(res.code == 1) {
                    // var nwaiting = plus.nativeUI.showWaiting();
                    // var webview = plus.webview.create(res.url,"dogmarket", { statusbar: { background: '#272834' } });
                    // webview.addEventListener("loaded", function () {
                    //     nwaiting.close();
                    //     webview.show();
                    // }, false);

                    window.location.href = res.url;
                } else {
                    if (res.code == 2) {

                        layer.open({
                            content: res.msg,
                            end:function(){
                                var nwaiting = plus.nativeUI.showWaiting();//显示原生等待框
                                var webview = plus.webview.create(res.url, "doghome", { statusbar: { background: '#272834' } });//后台创建webview并打开show.html
                                webview.addEventListener("loaded", function () { //注册新webview的载入完成事件
                                    nwaiting.close(); //新webview的载入完毕后关闭等待框
                                    webview.show();//把新webview窗体显示出来，显示动画效果为速度150毫秒的右侧移入动画
                                }, false);
                            },
                            time: 5

                        });

                    }
                    else
                        showErrorMsg(res.msg);
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                showErrorMsg('网络失败，请刷新页面后重试');
                //window.location.href = "/index/login/";
            }
        })
    }
    //切换密码框的状态
    $(function() {
        var username = getCookie("username");
        $('#username').val(username);
        $('.loginsingup-input .lsu i').click(function() {
            $(this).toggleClass('eye');
            if($(this).hasClass('eye')) {
              $(this).siblings('input').attr('type', 'password');

            } else {
              $(this).siblings('input').attr('type', 'text');

            }
        });
    })
</script>
</body>
</html>