<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:35:"./themes/hdindex/user\bankcard.html";i:1551682237;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,viewport-fit=cover">
    <link rel="stylesheet" href="/public/static/hdindex/assets/css/zpui.css"/>
    <link rel="stylesheet" href="/public/static/hdindex/assets/css/all_black.css"/>
    <script src="/public/static/index/assets/js/page.js"></script>
    <style>
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
    </style>
    <title>我的錢包</title>
</head>
<style type="text/css">
    .close-popup {
        float: right;
        height: 0.333333rem;
        line-height: 0.333333rem;
    }
    .close-popups {
        float: right;
        height: 0.333333rem;
        line-height: 0.333333rem;
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
            <div class="header-title">我的錢包</div>
            <div class="header-right">
                <a href="#"></a>
            </div>
        </div>
    </div>
    <div class="page-bd">
        <!-- 页面内容 -->
        <div class="weui-cells">
            <div class="weui-cell box bankCard" style="display: flex;justify-content: center;color: red;">必须填写实名银行卡</div>
            <?php if(is_array($paymentlist) || $paymentlist instanceof \think\Collection || $paymentlist instanceof \think\Paginator): $k = 0; $__LIST__ = $paymentlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bank): $mod = ($k % 2 );++$k;?>
                <div class="weui-cell box bankCard">
                    <div class="weui-cell__hd">
                        <img src="<?php echo $bank['logo']; ?>" alt="" onclick="edit_payment('<?php echo $bank['id']; ?>')">
                    </div>
                    <div class="weui-cell__bd">
                        <div class="fs28 color_9">账户名称:<span class="color_3"><?php echo $bank['accountname']; ?></span></div>
                        <img src="<?php echo $bank['icon']; ?>" class="close-popup" onclick="<?php echo $bank['icontype']; ?>">
                        <div class="fs28 color_9">账号:<span class="color_3"><?php echo $bank['account']; ?></span></div>
                        <div class="fs28 color_9">账户类型:
                            <span class="color_3"><?php echo $bank['name']; ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>

            <!--<div class="weui-cell box bankCard">-->
            <!--<div class="weui-cell__hd">-->
            <!--<img src="/public/static/index/assets/images/weixinpay.png" alt="">-->
            <!--</div>-->
            <!--<div class="weui-cell__bd">-->
            <!--<div class="fs28 color_9">账户名称:<span class="color_3">我的女神</span></div>-->
            <!--<a href="javascript:;" onclick="del('+obj.id+')"><img src="/public/static/index/assets/images/icon_trash3.png" class="close-popup"></a>-->
            <!--<div class="fs28 color_9">账号:<span class="color_3">19563698756</span></div>-->
            <!--<div class="fs28 color_9">账户类型:<span class="color_3">微信支付</span></div>-->
            <!--</div>-->
            <!--</div>-->

        </div>
        <div style=" line-height:20px;font-size: 14px;padding-top: 10px;margin: 13px; color: rebeccapurple;">
            <p>为确保能一次性通过审核，请按如下几点上传:</p>
            <p>1，所有收款方式的实名信息必须和要提交实名认证的实名一致。</p>
            <p>2，支付宝账号一定要确保输入账号能进行付款操作，不要关闭支付宝应用中的‘通过邮箱找到我’或‘通过手机号找到我’的隐私功能</p>
            <p>3，微信不要关闭通过手机号添加好友的功能。</p>
            <p>4，一定要认真填写银行卡收款信息。</p>
            <p>5，至少要上传银行卡，支付宝，微信三种收款方式。</p>
            <p style="color: #f20;">***请认真填写并上传收款方式，一旦通过审核，不得再修改和添加，银行卡收款方式不允许关闭***</p>
        </div>

        <!--<a href="<?php echo url('add_payment'); ?>" class="butBox">
            <div class="but">添加</div>
        </a>-->
    </div>
</div>
<script src="/public/static/index/assets/js/lib/jquery-2.1.4.js"></script>
<script src="/public/static/index/assets/js/jquery-weui.min.js"></script>
<script src="/public/static/index/assets/js/lib/fastclick.js"></script>
<script src="/public/static/index/assets/js/layer.js"></script>
<script src="/public/static/index/assets/js/ajaxplugin.js"></script>
<script>
    $(function () {
        FastClick.attach(document.body);
    });
    // $(function(){
    //     var url       = '/api/payment/user_payment'
    //     var data      = {}
    //     var mehod     = 'get';
    //     var str       = '';
    //     __ajax(url,data,mehod,function(data){
    //       if (data.status == 200 ) {
    //         console.log(data.data)
    //         $.each(data.data, function(i, obj) {
    //             //str += '<a href="javascript:;" onclick="edit_payment('+obj.id+')">';
    //             str += '<div class="weui-cell box bankCard">';
    //             str += '<div class="weui-cell__hd">';
    //             str += '<img src="/public/static/index/assets/images/'+obj.type+'.png" alt="">';
    //             str += '</div>';
    //             str += '<div class="weui-cell__bd">';
    //             str += '<div class="fs28 color_9">账户名称:<span class="color_3 name" id="name">'+obj.name+'</span></div>';
    //             str += '<a href="javascript:;" onclick="del('+obj.id+')"><img src="/public/static/index/assets/images/icon_trash3.png" class="close-popup"></a>';
    //             str += '<div class="fs28 color_9">账号:<span class="color_3">'+obj.account+'</span></div>';
    //             str += '<div class="fs28 color_9">账户类型:<span class="color_3">'+obj.pay_name+'</span></div>';
    //             str += '</div>';
    //             str += '</div>';
    //            // str += '</a>';
    //           });
    //         $('.weui-cells').append(str);
    //       } else {
    //
    //         if(data.status == -1){
    //             str += '<div class="butBox" style="color:red;">';
    //             str +=  '您的收款账号存在异常,请联系管理员修改';
    //             str += '</div>';
    //         }else{
    //             str += '<div class="butBox">';
    //             str +=  '暂未添加银行卡';
    //             str += '</div>';
    //         }
    //
    //         $('.weui-cells').append(str);
    //       }
    //   });
    // })
    function edit_payment(id, type) {
        window.location.href = '/index/User/edit_payment?id=' + id;
    }
    function add_payment(id) {
        window.location.href = '/index/User/add_payment?id=' + id;
    }

    function del_payment(id) {
        console.log(id)
        //询问框
        layer.open({
            content: '您确定要删除吗？'
            , btn: ['确定', '取消']
            , yes: function (index) {
                var url = '/index/User/del_payment';
                var data = {};
                data.id = id;
                var mehod = 'post';
                __ajax(url, data, mehod, function (data) {
                    if (data.code == 1) {
                        //提示
                        layer.open({
                            content: data.msg
                            , skin: 'msg'
                            , time: 2 //2秒后自动关闭
                        });
                        window.setTimeout(function () {
                            location.reload();
                        }, 1000);
                    } else {
                        //提示
                        layer.open({
                            content: data.msg
                            , skin: 'msg'
                            , time: 2 //2秒后自动关闭
                        });
                    }
                });
                layer.close(index);
            }
        });
    }
</script>

</body>
</html>
