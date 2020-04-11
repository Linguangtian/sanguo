<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:39:"./themes/hdindex/user\transfer_log.html";i:1575617302;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,viewport-fit=cover" />
    <link rel="stylesheet" href="/public/static/hdindex/assets/css/zpui.css" />
    <link rel="stylesheet" href="/public/static/hdindex/assets/css/all_black.css" />
    <script src="/public/static/index/assets/js/page.js"></script>
    <style>
        /* 隐藏顶部浮动栏选项  */
        body { position: static !important; top:0px !important; }
        iframe.goog-te-banner-frame { display: none !important; }
        .goog-logo-link { display:none !important; }
        .goog-te-gadget { color: transparent !important; overflow: hidden;}
        .goog-te-balloon-frame{display: none !important;}

        /*使原始文本弹出窗口隐藏*/
        .goog-tooltip {display: none !important;}
        .goog-tooltip:hover {display: none !important;}
        .goog-text-highlight {background-color: transparent !important; border: none !important; box-shadow: none !important;}

        /* 语言选择框颜色 */
        .goog-te-combo {background-color:#848CB5; border-radius:8px;}
    </style>
    <title>转让记录</title>
</head>
<body>
<div id="wrap" style="z-index: 1000000;
    position: fixed ! important;
    right: -25px;
    top: 8px;">
    <!-- 谷歌语言 -->
    <div id="google_translate_element"></div>
</div>
<div class="page logs">
    <div class="page-hd">
        <div class="header bor-1px-b">
            <div class="header-left">
                <a href="javascript:history.go(-1)" class="left-arrow"></a>
            </div>
            <div class="header-title">
                转让记录
            </div>
            <div class="header-right">
                <a href="#"></a>
            </div>
        </div>
        <div class="page-bd">
            <!-- 页面内容 -->
            <div class="weui-tab">
                <div class="weui-navbar">
                    <a class="weui-navbar__item weui-bar__item--on color_9" href="#tab1" id="toptab1">待转让</a>
                    <a class="weui-navbar__item color_9" href="#tab2" id="toptab2"> 转让中 </a>
                    <a class="weui-navbar__item color_9" href="#tab3"> 已完成 </a>
                    <a class="weui-navbar__item color_9" href="#tab4"> 取消/申诉 </a>
                </div>
                <div class="weui-tab__bd">
                    <div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active">
                        <div>
                            <?php if(is_array($userpigs) || $userpigs instanceof \think\Collection || $userpigs instanceof \think\Paginator): $i = 0; $__LIST__ = $userpigs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pig): $mod = ($i % 2 );++$i;?>
                            <div class="Box">
                                <div class="titie fs26 color_3 bor_b">
                                    <span class="fw_b">武将编号:<?php echo $pig['order_no']; ?></span>
                                    <!--<span class="color_r">收益中</span>-->
                                </div>
                                <div class="content fs26 color_3">
                                    <div>
                                        武将:<?php echo $pig['pig_name']; ?>
                                    </div>
                                    <div>
                                        价值：
                                        <span class="color_r fw_b"><?php echo $pig['price']; ?></span>≈<?php echo $pig['price']; ?>PIG
                                    </div>
                                    <div>
                                        智能合约收益：
                                        <span class="color_r fw_b"><?php echo $pig['pig_info']['cycle']; ?>天/<?php echo $pig['pig_info']['contract_revenue']; ?>%</span>
                                    </div>

                                    <div>
                                        买入时间：<?php echo date("Y-m-d H:i:s",$pig['create_time']); ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div> 
                        <!-- <div class="more fs24 color_9"><span>点击加载更多历史数据</span><img src="/public/static/index/assets/images/more.png" alt=""></div> -->
                    </div>

                    <div id="tab2" class="weui-tab__bd-item">
                        <div>
                        <?php if(is_array($tralist) || $tralist instanceof \think\Collection || $tralist instanceof \think\Paginator): $i = 0; $__LIST__ = $tralist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;if($vl['status'] <= 2): ?>
                        <div class="Box">
                            <div class="titie fs26 color_3 bor_b">
                                <span class="fw_b">武将编号:<?php echo $vl['order_no']; ?></span>
                                <span class="color_r">区块写入中</span>
                            </div>
                            <div class="content fs26 color_3">
                                <!--<div>-->
                                    <!--原武将编号：201810196553381332221-->
                                <!--</div>-->
                                <div>
                                    武将:
                                    <span class="color_r fw_b"><?php echo $vl['pig_name']; ?></span>
                                </div>
                                <div>
                                    价值：
                                    <span class="color_r fw_b"><?php echo $vl['price']; ?></span>≈<?php echo $vl['price']; ?>PIG
                                </div>
                                <div>
                                    智能合约收益：
                                    <span class="color_r fw_b"><?php echo $vl['pig_info']['cycle']; ?>天/<?php echo $vl['pig_info']['contract_revenue']; ?>%</span>
                                </div>
                                <div>
                                    召唤方：<?php echo $vl['username']; ?>
                                </div>
                                <div>
                                    转让时间：<?php echo date("Y.m.d H:i:s",$vl['create_time']); ?>
                                </div>
                                <!--<div>-->
                                    <!--确认剩余时间：-->
                                    <!--<span class="color_r fw_b">1小时26分45秒</span>-->
                                <!--</div>-->
                            </div>
                            <div class="button">
                                <?php if($vl['status'] == '1'): ?>
                                <div class="fs30 fw_b color_r">
                                    待支付
                                </div>
                                <?php endif; if($vl['status'] == '2'): ?>
                                <div class="fs30 fw_b color_r" onclick="detail(<?php echo $vl['id']; ?>)">
                                    查看
                                </div>
                                <?php endif; ?>
                                <a href="<?php echo url('appeal',['id'=>$vl['id']]); ?>" class="right fs30 fw_b color_r">申诉</a>
                            </div>
                        </div>
                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <!-- <div class="more fs24 color_9"><span>点击加载更多历史数据</span><img src="/public/static/index/assets/images/more.png" alt=""></div> -->
                    </div>

                    <div id="tab3" class="weui-tab__bd-item">
                        <div>
                            <?php if(is_array($tralist) || $tralist instanceof \think\Collection || $tralist instanceof \think\Paginator): $i = 0; $__LIST__ = $tralist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;if($vl['status'] == 3): ?>
                            <div class="Box">
                                <div class="titie fs26 color_3 bor_b">
                                    <span class="fw_b">武将编号:<?php echo $vl['order_no']; ?></span>
                                    <span class="color_r">已完成</span>
                                </div>
                                <div class="content fs26 color_3">
                                    <!--<div>-->
                                        <!--原武将编号：201810196553381332221-->
                                    <!--</div>-->
                                    <div>
                                        武将:<?php echo $vl['pig_info']['name']; ?>
                                    </div>
                                    <div>
                                        价值：
                                        <span class="color_r fw_b"><?php echo $vl['price']; ?></span>≈<?php echo $vl['pig_info']['pig']; ?>PIG
                                    </div>

                                    <div>
                                        转让时间：<?php echo date("Y-m-d H:i:s",$vl['create_time']); ?>
                                    </div>
                                </div>
                            </div>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                    <div id="tab4" class="weui-tab__bd-item">
                        <div>
                            <?php if(is_array($sslist) || $sslist instanceof \think\Collection || $sslist instanceof \think\Paginator): $i = 0; $__LIST__ = $sslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ls): $mod = ($i % 2 );++$i;?>
                            <div class="Box">
                                <div class="titie fs26 color_3 bor_b">
                                    <span class="fw_b">申述理由</span>
                                    <span class="color_9"><?php echo date("Y-m-d H:i:s",$ls['create_time']); ?></span>
                                </div>
                                <div class="content fs26 color_3">
                                    <div class="reason">
                                        <?php echo $ls['content']; ?>
                                    </div>
                                    <div class="top fs24 color_9">
                                        武将编号:<?php echo $ls['pig_no']; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
    <script src="/public/static/index/assets/js/lib/jquery-2.1.4.js"></script>
    <script src="/public/static/index/assets/js/jquery-weui.min.js"></script>
    <script src="/public/static/index/assets/js/lib/fastclick.js"></script>
    <script src="/public/static/index/assets/js/layer.js"></script>
    <script src="/public/static/index/assets/js/ajaxplugin.js"></script>
    <script>
        $(function() {
            FastClick.attach(document.body);
        });

        // var url   = '/api/business/transfer_log';
        // var mehod = 'get';
        // var data  = {};
        // __ajax(url,data,mehod,function(res){
        //       // console.log(res.data);
        //       // console.log($.isEmptyObject(res.data.adopted));
        //       var transferon = $.isEmptyObject(res.data.transferon);
        //       var transfer   = $.isEmptyObject(res.data.transfer);
        //       var transfered = $.isEmptyObject(res.data.transfered);
        //       var appeal     = $.isEmptyObject(res.data.appeal);
        //       if (!transferon) {
        //           var str= '';
        //           // console.log(111);
        //           // console.log(res.data);
        //
        //           $.each(res.data.transferon, function(i, obj) {
        //             str += '<div class="Box">';
        //             // str+= '<div class="titie fs26 color_3 bor_b">';
        //             // str += '<span class="fw_b">武将编号:'+obj.pig_order_sn+'</span> <span class="color_r">收益中</span>';
        //             // str += '</div>';
        //             str += '<div class="content fs26 color_3">';
        //             str += '<div>武将:'+obj.goods_name+'</div>';
        //             str += '<div>价值：<span class="color_r fw_b">'+obj.price+'</span>≈'+obj.pig_currency+'DSC</div>';
        //             str += '<div>智能合约收益：<span class="color_r fw_b">'+obj.contract_days+'天/'+obj.income_ratio+'%</span></div>';
        //             str += '<div>获得收益：<span class="color_r fw_b">'+obj.profit+'</span></div>';
        //             str += '<div>买入时间：'+obj.buy_time+'</div>';
        //             str += '</div>';
        //             str += '</div>';
        //           });
        //           $('#tab1').append(str);
        //       }else{
        //           str += ''
        //           var str = '<div class="more fs24 color_9"><span>暂无数据</span>';
        //           $('#tab1').append(str);
        //       }
        //       if(!transfer) {
        //           var str = '';
        //           // console.log(222);
        //           // console.log(res.data);
        //           $.each(res.data.transfer, function(i, obj) {
        //             str += '<a href="javascript:;" onclick="detail('+obj.order_id+')">';
        //             str += '<div class="Box">';
        //             str += '<div class="titie fs26 color_3 bor_b">';
        //             str += '<span class="fw_b">武将编号:'+obj.pig_order_sn+'</span>';
        //             str += '</div>';
        //             str += '<div class="content fs26 color_3">';
        //             // str += '<div>原武将编号：201810196553381332221</div>';
        //             str += '<div>武将:'+obj.goods_name+'</div>';
        //             str += '<div>价值：<span class="color_r fw_b">'+obj.pig_price+'</span>≈'+obj.pig_currency+'DSC</div>';
        //             str += '<div>智能合约收益：<span class="color_r fw_b">'+obj.contract_days+'天/'+obj.income_ratio+'%</span></div>';
        //             str += '<div>召唤方：'+obj.nickname+'</div>';
        //             str += '<div>转让时间：'+obj.establish_time+'</div>';
        //             str += '<div class="confirm_time'+obj.order_id+'">确认剩余时间：<span class="color_r fw_b remaining_time'+obj.order_id+'">'+obj.remaining_time+'</span></div>';
        //             str += '</div>';
        //             if (obj.img_url) {
        //                 str += '<div class="button"><div class="fs30 fw_b color_r" onclick="detail('+obj.order_id+')">确认</div><a href="javascript:;" class="right fs30 fw_b color_r" onclick="appeal('+obj.order_id+')">申诉</a></div>';
        //                 str += '</div>';
        //             } else {
        //                 str += '<div class="button"><div class="fs30 fw_b color_r">待支付</div><a href="javascript:;" class="right fs30 fw_b color_r" onclick="appeal('+obj.order_id+')">申诉</a></div>';
        //                  str += '</div>';
        //             }
        //            /* str += '<div class="button"><div class="fs30 fw_b color_r" onclick="confirm('+obj.order_id+')">确认</div><a href="javascript:;" class="right fs30 fw_b color_r" onclick="appeal('+obj.order_id+')">申诉</a></div>';
        //             str += '</div>';*/
        //             str += '</a>';
        //                 var maxtime = obj.remaining_time;
        //                 var order_id= obj.order_id;
        //                 // console.log(maxtime);
        //                 timer = setInterval(function(){
        //                   if (maxtime >= 0) {
        //                       var seconds = Math.floor(maxtime % 60);
        //                       var minutes = Math.floor(maxtime / 60 % 60);
        //                       var hour = Math.floor((maxtime / 3600) % 24); //计算小时，换算有多少小时，取余，24小时制除以24，余出多少小时
        //                       // var day = Math.floor(maxtime / (60 * 60 * 24));
        //                       msg =  minutes + "分" + seconds + "秒";
        //                       $('.remaining_time'+order_id).html( /*day + "天" +*/ hour + "小时" + minutes + "分" + seconds + "秒");
        //                       --maxtime;
        //                   } else{
        //                       $(".confirm_time"+order_id).remove();
        //                       clearInterval(timer);
        //                   }
        //                 }, 1000);
        //           });
        //           $('#tab2').append(str);
        //       }else{
        //           str += ''
        //           var str = '<div class="more fs24 color_9"><span>暂无数据</span>';
        //           $('#tab2').append(str);
        //       }
        //       if(!transfered) {
        //           var str = '';
        //           // console.log(333);
        //           // console.log(res.data);
        //           $.each(res.data.transfered, function(i, obj) {
        //             str += '<a href="javascript:;" onclick="detail('+obj.order_id+')">';
        //             str += '<div class="Box">';
        //             str += '<div class="titie fs26 color_3 bor_b">';
        //             str += '<span class="fw_b">武将编号:'+obj.pig_order_sn+'</span>';
        //             str += '</div>';
        //             str += '<div class="content fs26 color_3">';
        //             // str += '<div>原武将编号：201810196553381332221</div>';
        //             str += '<div>武将:'+obj.goods_name+'</div>';
        //             str += '<div>价值：<span class="color_r fw_b">'+obj.pig_price+'</span>≈'+obj.pig_currency+'DSC</div>';
        //             str += '<div>智能合约收益：<span class="color_r fw_b">'+obj.contract_days+'天/'+obj.income_ratio+'%</span></div>';
        //             str += '<div>转让时间：'+obj.establish_time+'</div>';
        //             str += '</div>';
        //             str += '</div>';
        //             str += '</a>';
        //           });
        //           $('#tab3').append(str);
        //       }else{
        //           str += ''
        //           var str = '<div class="more fs24 color_9"><span>暂无数据</span>';
        //           $('#tab3').append(str);
        //       }
        //       if(!appeal) {
        //           var str = '';
        //           // console.log(444);
        //           // console.log(res.data);
        //           $.each(res.data.appeal, function(i, obj) {
        //
        //             str += '<div class="Box">';
        //             str += '<div class="titie fs26 color_3 bor_b">';
        //             str += '<a href="javascript:;" onclick="detail('+obj.order_id+')">';
        //             str += '<span class="fw_b">申述理由</span><span class="color_9">'+obj.appeal_time+'</span>';
        //             str += '</div>';
        //             str += '<div class="content fs26 color_3">';
        //             str += '<div class="reason">'+obj.remark+'</div>';
        //             str += '<div class="top fs24 color_9">武将编号:'+obj.pig_order_sn+'</div>';
        //             str += '</a>';
        //             if(obj.sell_user_id==obj.appeal_user_id){
        //                 str += '<div class="button"><div data-orderid="'+obj.order_id+'" class="fs30 fw_b color_r cancelappeal">取消申述</div></div>';
        //             }
        //             str += '</div>';
        //             str += '</div>';
        //
        //           });
        //           $('#tab4').append(str);
        //       }else{
        //           str += ''
        //           var str = '<div class="more fs24 color_9"><span>暂无数据</span>';
        //           $('#tab4').append(str);
        //       }
        // });

        function confirm(order_id){
            window.location.href = '/dist/pages/transfer_detail.html?order_id='+order_id
        }
        function appeal(order_id){
            window.location.href = '/dist/pages/appeal.html?order_id='+order_id
        }
        function detail(id){
            window.location.href = '/index/User/transfer_detail?id='+id
        }

    </script>
    <script>



        $(function() {
            let p_str = $(".content p");
            let boxheight = 0;
            for (var i = 0; i < p_str.length; i++) {
                let boxheight = parseFloat($(p_str[i]).css("lineHeight")) * 4;
                if ($(p_str[i]).height() > boxheight) {
                    $(p_str[i]).css("display", "-webkit-box");
                    $(p_str[i])
                        .parents(".Box")
                        .find(".more")
                        .css("display", "flex");
                }
            }
            $('.more').on('click',function(){
                $(this).siblings('.content').find('p').css('-webkit-line-clamp','inherit')
                $(this).hide();
            })
        });

        var url = document.location.href;
        var arr=url.split("#");
        var len=arr.length;

        if(len==2 ){
            if(arr[1]=="transfer"){
                $("#tab1").removeClass("weui-tab__bd-item--active");
                $("#toptab1").removeClass("weui-bar__item--on");
                $("#tab2").addClass("weui-tab__bd-item--active");
                $("#toptab2").addClass("weui-bar__item--on");
            }
        }

        $(document).on("click",".cancelappeal",function () {
            var orderid=$(this).data('orderid');
            var url   = '/api/business/cancel_appeal';

            $.ajax({
                type : "POST",
                url:url,
                dataType:"json",
                data : {orderid:orderid},// 你的formid
                success: function(data){
                    alert(data.message);
                    if(data.status==1){
                        window.location.reload();
                    }

                }
            });


        })


    </script>
</div>
</body>
</html>