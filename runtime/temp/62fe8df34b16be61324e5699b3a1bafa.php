<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:37:"./themes/hdindex/user\invitation.html";i:1551682237;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,viewport-fit=cover">
    <link rel="stylesheet" href="/public/static/hdindex/assets/css/zpui.css"/>
    <link rel="stylesheet" href="/public/static/hdindex/assets/css/all_black.css"/>
    <script src="/public/static/index/assets/js/page.js"></script>
    <script src="https://cdn.jsdelivr.net/clipboard.js/1.5.12/clipboard.min.js"></script>

    <title>邀请好友</title>
</head>
<style type="text/css">
    .loginsignup2 img {
        width: 120px;
        height: 100px;
    }
    .loginsignup2{
        margin-top: 50px;
    }
    img {
        margin: 0 auto;
        width: 150px;
        height: 150px;
    }
    .appoint .weui-cells {
        background-color: transparent;
        margin: 0 0 50px 0;
    }

    html,
    body {
        background: url(<?php echo (isset($config['hb_img']) && ($config['hb_img'] !== '')?$config['hb_img']:'../../../public/static/Index/assets/images/loginbg.png'); ?>) no-repeat;
        background-size: cover;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    /* 隐藏顶部浮动栏选项  */
    body {
        position: static !important;
        top: 0px !important;
    }

    iframe.goog-te-banner-frame {
        display: none !important;
    }

    .goog-logo-link {
        display: none !important;
    }

    .goog-te-gadget {
        color: transparent !important;
        overflow: hidden;
    }

    .goog-te-balloon-frame {
        display: none !important;
    }

    /*使原始文本弹出窗口隐藏*/
    .goog-tooltip {
        display: none !important;
    }

    .goog-tooltip:hover {
        display: none !important;
    }

    .goog-text-highlight {
        background-color: transparent !important;
        border: none !important;
        box-shadow: none !important;
    }

    /* 语言选择框颜色 */
    .goog-te-combo {
        background-color: #848CB5;
        border-radius: 8px;
    }

    .page-bd {
        background-color: transparent;
    }
    .invitate{
        text-align: center;
        padding: 9px 15px;
        min-height: 20px;
        line-height: 20px;
        border: 1px solid #787878;
        font-size: 14px;
        width: 200px;
        margin: auto;
        border-radius: 10px;
        color: #fff;
        background-color: #009688;
        margin-bottom: 20px;
    }
    .name{
        height: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #949494;
        font-size: 25px;

    }
</style>
<body>
<div id="wrap" style="z-index: 1000000;
    position: fixed ! important;
    right: -25px;
    top: 8px;">
    <!-- 谷歌语言 -->
    <div id="google_translate_element"></div>
</div>
<div class="page appoint">
    <div class="page-hd">
        <div class="header bor-1px-b">
            <div class="header-left">
                <a href="javascript:history.go(-1)" class="left-arrow"></a>
            </div>
            <div class="header-title">分享</div>
            <div class="header-right">
                <a href="#"></a>
            </div>
        </div>
    </div>
    <div class="page-bd">
        <!-- 页面内容 -->
        <div class="flool loginsignup2">
            <img src="<?php echo (isset($config['login_img']) && ($config['login_img'] !== '')?$config['login_img']:'../../../public/static/Index/assets/images/logo-login.png'); ?>" alt="WIA DOG" />
            <div class="name">
                <?php echo (isset($config['site_title']) && ($config['site_title'] !== '')?$config['site_title']:'亞太區塊龜'); ?>
            </div>
        </div>
        <div class="weui-cells">
            <img src="<?php echo $codeurl; ?>" alt="">
        </div>

        <div style="text-align: center;font-size: 0.213333rem;" class="btn invitate mcopy" link-url="<?php echo $url; ?>" data-clipboard-text="<?php echo $userinfo['mobile']; ?>">
            复制邀请码
        </div>
        <div class="copy btn invitate" style="text-align: center;font-size: 0.213333rem;color:#fff" data-clipboard-text="<?php echo $url; ?>">
            复制邀请链接
        </div>

        <!--<div style="text-align: center;font-size: 0.213333rem;"><a href="" target="_blank" class="img_url">点我保存图片</a>-->
        </div>
    </div>
</div>
<script src="/public/static/index/assets/js/lib/jquery-2.1.4.js"></script>
<script src="/public/static/index/assets/js/jquery-weui.min.js"></script>
<script src="/public/static/index/assets/js/lib/fastclick.js"></script>
<script src="/public/static/index/assets/js/layer.js"></script>
<script src="/public/static/index/assets/js/ajaxplugin.js"></script>
<script src="/public/static/index/assets/js/clipboard.min.js"></script>

<script>
    // $(function() {
    //     FastClick.attach(document.body);
    //       var url = '/api/user/share_image';
    //       var type = 'get';
    //       __ajax(url,{},type,function(data){
    //         console.log(data.data)
    //         if (data.status == 200) {
    //           console.log(data.data)
    //           window.url = data.data.url;
    //           $('.img_url').attr('href', data.data.img_url);
    //           var str = '';
    //           str += '<img src="'+data.data.img_url+'" alt="" >';
    //           $('.weui-cells').append(str);
    //         }
    //       })
    // });

</script>
<script type="text/javascript">
    $('.copy').click(function () {
        var clipboard = new ClipboardJS('.copy');
        clipboard.on('success', function(e) {
            layer.open({
                content: '复制成功'
                ,skin: 'msg'
                ,time: 1 //2秒后自动关闭
            })
            e.clearSelection();
        });
        clipboard.on('error', function(e) {
            layer.open({
                content: '复制失败'
                ,skin: 'msg'
                ,time: 1 //2秒后自动关闭
            })
        });
    });
    $('.mcopy').click(function () {
        var clipboard = new ClipboardJS('.mcopy');
        clipboard.on('success', function(e) {
            layer.open({
                content: '复制成功'
                ,skin: 'msg'
                ,time: 1 //2秒后自动关闭
            })
            e.clearSelection();
        });
        clipboard.on('error', function(e) {
            layer.open({
                content: '复制失败'
                ,skin: 'msg'
                ,time: 1 //2秒后自动关闭
            })
        });
    });
    var clipboard = new ClipboardJS('.btn', {
        text: function () {
            return window.url;
        }
    });

    clipboard.on('success', function (e) {
        console.log(e);
    });

    clipboard.on('error', function (e) {
        console.log(e);
    });
</script>
<style type="text/css">
    .fs30 {
        padding-bottom: 20px
    }
</style>

</body>
</html>
