<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:35:"./themes/hdindex/service\index.html";i:1551682237;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>服务中心</title>
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
<body class="g4">

<div class="top_fixed">

    <div class="classreturn loginsignup ">
        <div class="content">
            <div class="ds-in-bl return">
                <a href="javascript:history.go(-1)"><img src="https://block-dog.oss-cn-beijing.aliyuncs.com/template/mobile/block/static/images/return.png" alt="返回"></a>
            </div>
            <div class="ds-in-bl search center">
                <span>服务中心</span>
            </div>
            <div class="ds-in-bl menu">
            </div>
        </div>
    </div>
    <style>
        .mui-content ul li{width:50%; float:left;text-align: center;padding-top:6%;background: #3B3E46;border-bottom: 1px solid #272834;
            border-right: 1px solid #272834;}
        .mui-content ul li p{    color: #E0E0E0;margin-top: 5px;}
        .mui-content ul li a span{    color: #43AC97;font-size: 1.5rem}
        body{
            background: #272834!important;
        }
        .footer ul li a .icon p {      color: #585858;}
        .footer ul li a.yello{color: #46B39D!important;}
        .footer ul li a.yello p{color: #46B39D!important;}

        .mui-content{margin-top:2.6rem}
        .grid_menu .item {width:50%}
        .grid_menu{  margin: 0rem!important;}
    </style>
</div>

<div class="bg_white" style="margin-top: 2rem;">
    <div class="mui-content">
        <div class="grid_menu" style="margin-top: 0.1rem;">



            <div class="item">
                <a href="help_center.html">
                    <i class="iconfont icon-tuandui c3"></i>
                    <h3>帮助中心</h3>
                </a>
            </div>
            <div class="item">
                <a href="call_center.html">
                    <i class="iconfont icon-iconfontmark c2"></i>
                    <h3>線上客服</h3>
                </a>
            </div>
        </div></div>
</div>
<!--底部导航-start-->
<style>

    .bgfooter {
        height: 2.13333rem;
        background: #1E1E29;
        position: absolute;display:none;

        bottom: 0;
        left: 0;
        width: 100%;
    }

    @media screen and (min-width: 1300px) {
        .bgfooter {
            height: 1.06667rem
        }
    }

    .bgfooter ul li {
        float: left;
        text-align: center;
        width: 50%
    }

    .bgfooter ul li .yello {
        color: #46B39D
    }

    .bgfooter ul li a {
        display: inline-block;
        cursor: pointer;
        color: #585858;
    }

    .bgfooter ul li a .icon {
        margin-top: .128rem
    }

    @media screen and (min-width: 1300px) {
        .bgfooter ul li a .icon {
            margin-top: .04267rem
        }
    }

    .bgfooter ul li a .icon .iconfont {
        font-size: 1.06667rem
    }

    @media screen and (min-width: 1300px) {
        .bgfooter ul li a .icon .iconfont {
            font-size: .59733rem
        }
    }

    .bgfooter ul li a .icon p {
        font-size: .55467rem;
        margin-top: .21333rem
    }
    .footer ul li{width:33.33%!important}
    @media screen and (min-width: 1300px) {
        .bgfooter ul li a .icon p {
            font-size: .29867rem;
            margin-top: .08533rem
        }
    }


</style>

<div class="foohi">
    <div class="footer">
        <ul>
            <li>
                <a  href="<?php echo url('index/index'); ?>">
                    <div class="icon">
                        <i class="icon-gongneng iconfont"></i>
                        <p>龟集市</p>
                    </div>
                </a>
            </li>

            <li>
                <a style="color:#fff" href="<?php echo url('service/index'); ?>"  class="yello" >
                    <div class="icon">
                        <i class="icon-yinxingqia iconfont"></i>
                        <p>服務中心</p>
                    </div>
                </a>
            </li>

            <li>
                <a href="<?php echo url('user/index'); ?>">
                    <div class="icon">
                        <i class="icon-my iconfont"></i>
                        <p>我的龟圈</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>

</div>






<script>



    var ifcanload = 0;
    function weburlview(weburls,id)
    {
        if (1==1) {
            //ifcanload = 1;

            var page = plus.webview.getWebviewById(id);
            if (page) {
                //
                var nwaiting = plus.nativeUI.showWaiting();//显示原生等待框




                var curdoghomeviewurl = page.getURL();
                if (curdoghomeviewurl == weburls) {
                    page.reload(true);
                    page.show();
                    nwaiting.close();
                    //page.show();
                }
                else {
                    //page.destroy();
                    location.href = weburls;
                    //page.loadURL(weburls);
                    //page.show();
                    nwaiting.close();

                }



                //page.reload(true);
                //if (id == "dogmarket")
                //{
                //    ajaxshowdoglist();
                //}
                //page.show();
            }
            else {
                var nwaiting = plus.nativeUI.showWaiting();//显示原生等待框
                var webview = plus.webview.create(weburls, id, { statusbar: { background: '#272834' } });//后台创建webview并打开show.html
                webview.addEventListener("loaded", function () { //注册新webview的载入完成事件
                    nwaiting.close(); //新webview的载入完毕后关闭等待框
                    //ifcanload = 0;
                    webview.show();//把新webview窗体显示出来，显示动画效果为速度150毫秒的右侧移入动画
                }, false);
            }
        }
        else
        {

        }


    }

</script>
<!--底部导航-end-->
</body>
</html>