<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:32:"./themes/hdindex/user\index.html";i:1578813387;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>我的</title>
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
    <script src="/public/static/index/assets/js/ajaxplugin.js"></script>
    <script src="https://block-dog.oss-cn-beijing.aliyuncs.com/template/mobile/block/static/js/common14.js?v=1.82"  type="text/javascript" ></script>
    <meta name="referrer" content="no-referrer">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />


</head>
<body class="gray">

<style>
    .my_center_top ,.top_fixed{position:static!important;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;top:unset!important;left:unset!important;
        z-index:unset!important;
        -webkit-text-size-adjust: none;
        -webkit-tap-highlight-color: transparent;}
    .footer{position:absolute!important;bottom:0px; z-index:unset!important;  -webkit-transform:unset!important; }
</style>
<div class="my_center_top" style="padding-top: 1rem;">
    <a class="setting" href="set.html"><i class="iconfont icon-gongnengjianyi"></i></a>
    <div class="user_info">
        <div class="t">
            <h3><?php echo $user['nickname']; ?><span style="margin-left: .7rem; font-size: .5rem; color:#ffd100;"></span><?php echo $userlevel['name']; ?></h3>
            <p>ID/手機：<?php echo $user['mobile']; ?></p>
        </div>
    </div>
    <div class="account_info">
        <ul>
            <li><a href="<?php echo url('pig_currency'); ?>"><h3><?php echo $user['pig']; ?></h3><span>WIA/華高鏈</span></a></li>
            <li><a href="<?php echo url('doge_money'); ?>"><h3><?php echo $user['doge']; ?></h3><span>DOGE/王者币</span></a></li>
            <li><a href="<?php echo url('blessings_log'); ?>"><h3><?php echo $user['pay_points']; ?></h3><span>粮草</span></a></li>
            <li><a href="<?php echo url('profit_log'); ?>"><h3><?php echo $contract_revenue; ?></h3><span>纍計收益</span></a></li>
            <li><a href="javascript:;"><h3><?php echo $user_pigs; ?></h3><span>總資產</span></a></li>
            <li><a href="<?php echo url('profit'); ?>"><h3><?php echo $user['share_integral']; ?></h3><span>推薦收益</span></a></li>
        </ul>
    </div>
</div>

<div class="grid_menu2" style="margin-bottom: 0.4rem;">
    <div class="item">
        <a href="<?php echo url('adopt_log'); ?>">
            <i class="iconfont icon-mairu"></i>
            <h3>召唤記錄</h3>
        </a>
    </div>
    <div class="item">
        <a href="<?php echo url('transfer_log'); ?>">
            <i class="iconfont icon-maichu"></i>
            <h3>轉讓記錄</h3>
        </a>
    </div>
    <div class="item">
        <a href="<?php echo url('reservation_log'); ?>">
            <i class="iconfont icon-yiwancheng-"></i>
            <h3>預約記錄</h3>
        </a>
    </div>
</div>

<div class="grid_menu" style="margin-top: 0.1rem;">
    <div class="item">
        <a href="<?php echo url('safety_center'); ?>">
            <i class="iconfont icon-anquan c1"></i>
            <h3>安全中心</h3>
        </a>
    </div>
    <div class="item">
        <a href="javascript:checkAuth();">
            <i class="iconfont icon-z045 c2"></i>
            <h3>實名認證</h3>
        </a>
    </div>
    <div class="item">
        <a href="<?php echo url('bankcard'); ?>">
            <i class="iconfont icon-qia c3"></i>
            <h3>我的錢包</h3>
        </a>
    </div>
    <div class="item">
        <a href="<?php echo url('team'); ?>">
            <i class="iconfont icon-tuandui c4"></i>
            <h3>我的團隊</h3>
        </a>
    </div>
    <div class="item">
        <a href="javascript:checkAuthToInvit();">
            <i class="iconfont icon-erweima c3"></i>
            <h3>邀請好友</h3>
        </a>
    </div>
    <div class="item">
        <a href="<?php echo url('system_message'); ?>">
            <i class="iconfont icon-iconfontmark c2"></i>
            <h3>系統消息</h3>
        </a>
    </div>
	
	
</div>

<div style="text-align:center;">
	<a href="https://www.huzhan.com/ishop21339/" target="_blank"><span style="font-size:16px;color:#FFFFFF;"></span></a> 
</div>

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
                        <p>乱世王者</p>
                    </div>
                </a>
            </li>

            <li>
                <a style="color:#fff" href="<?php echo url('service/index'); ?>" >
                    <div class="icon">
                        <i class="icon-yinxingqia iconfont"></i>
                        <p>服務中心</p>
                    </div>
                </a>
            </li>

            <li>
                <a href="<?php echo url('user/index'); ?>" class="yello">
                    <div class="icon">
                        <i class="icon-my iconfont"></i>
                        <p>我的锦囊</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>

</div>





<script>


    function checkAuth(){
        local_ajax('/index/User/isAuthApi',{},'get',function (res) {
            if(res.data.hasBank == 1){
                if(res.data.isStatus == 1){
                    layer.open({
                        content: '你已经认证过了!'
                        ,skin: 'msg'
                        ,time: 1 //2秒后自动关闭
                    })
                }else if(res.data.isStatus == 0){
                    layer.open({
                        content: '實名審核中!'
                        ,skin: 'msg'
                        ,time: 1 //2秒后自动关闭
                    })
                }else{
                    window.location.href="<?php echo url('authentication'); ?>";
                }
            }else{
                layer.open({
                    content: '請先在我的錢包中添加銀行卡!'
                    ,skin: 'msg'
                    ,time: 1 //2秒后自动关闭
                })
            }
        });
    }

    function checkAuthToInvit(){
        local_ajax('/index/User/isAuthApi',{},'get',function (res) {
            if(res.data.hasBank == 1){
                if(res.data.isAuth == 1){
                    window.location.href="<?php echo url('invitation'); ?>";
                }else if(res.data.isStatus == 0){
                    layer.open({
                        content: '實名審核中!'
                        ,skin: 'msg'
                        ,time: 1 //2秒后自动关闭
                    })
                }else{
                    layer.open({
                        content: '請先實名!'
                        ,skin: 'msg'
                        ,time: 1 //2秒后自动关闭
                    })
                }
            }else{
                layer.open({
                    content: '請先實名!'
                    ,skin: 'msg'
                    ,time: 1 //2秒后自动关闭
                })
            }
        });
    }

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

</body>
</html>
