<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:36:"./themes/hdindex/user\adopt_log.html";i:1575617302;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
  <head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,viewport-fit=cover">
<link rel="stylesheet" href="/public/static/hdindex/assets/css/zpui.css"/>
<link rel="stylesheet" href="/public/static/hdindex/assets/css/all_black.css"/>
<script src="/public/static/index/assets/js/page.js"></script>
<!-- <script src="/public/static/index/assets/js/google_translate/element.js"></script> -->

    <title>召唤记录</title>
  </head>
  <style type="text/css">
    .appeal{
      width: 0.633333rem;
      height: 0.373333rem;
      background-color: #f4c300;
      border-radius: 0.066667rem;
      display: flex;
      -webkit-justify-content: center;
      margin: 0 auto;
    }
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
  <body>
  <div id="wrap" style="z-index: 1000000;
    position: fixed ! important;
    right: -20px;
    top: 7px;">
    <!-- 谷歌语言 -->
    <div id="google_translate_element"></div>

  </div>
    <div class="page logs">
      <div class="page-hd">
        <div class="header bor-1px-b">
    <div class="header-left">
        <a href="javascript:history.go(-1)" class="left-arrow"></a>
    </div>
    <div class="header-title">召唤记录</div>
    <div class="header-right">
        <a href="#"></a>
    </div>
</div>
      </div>
      <div class="page-bd">
        <!-- 页面内容 -->
        <div class="weui-tab">
          <div class="weui-navbar">
            <a class="weui-navbar__item weui-bar__item--on color_9" href="#tab1">召唤中
            </a>
            <a class="weui-navbar__item color_9" href="#tab2"> 已召唤 </a>
            <a class="weui-navbar__item color_9" href="#tab3"> 取消/申诉 </a>
            <!-- <a class="weui-navbar__item color_9" href="#tab4">已销毁</a> -->
          </div>
          <div class="weui-tab__bd">

            <div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active">

              <?php if(is_array($loglist) || $loglist instanceof \think\Collection || $loglist instanceof \think\Paginator): $i = 0; $__LIST__ = $loglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;if($vl['status'] <= '2'): ?>
            <div class="Box">
                <div class="titie fs26 color_3 bor_b">
                  <span class="fw_b">武将编号:<?php echo $vl['order_no']; ?></span> <span class="color_r">区块写入中</span>
                </div>
                <div class="content fs26 color_3">
                  <div>区块猪:<?php echo $vl['pig_info']['name']; ?></div>
                  <div>价值：<span class="color_r fw_b"><?php echo $vl['price']; ?></span>≈<?php echo $vl['price']; ?>PIG</div>
                  <div>智能合约收益：<span class="color_r fw_b"><?php echo $vl['pig_info']['cycle']; ?>天/<?php echo $vl['pig_info']['contract_revenue']; ?>%</span></div>
                  <div>获得收益：<span class="color_r fw_b">201.52</span></div>
                  <div>召唤时间：<?php echo date("Y.m.d H:i:s",$vl['create_time']); ?></div>
                </div>
              <?php if($vl['status'] == '1'): ?>
              <div class="button"><div class="fs30 fw_b color_r" onclick="detail('<?php echo $vl['id']; ?>')">付款</div></div>
              <?php endif; if($vl['status'] == '2'): ?>
              <!--<div class="button"><div class="fs30 fw_b color_r">待确认</div>-->
                <div class="button"><div class="fs30 fw_b color_r">待确认</div></div>
              <?php endif; ?>
              </div>
              <?php endif; endforeach; endif; else: echo "" ;endif; ?>
              <!-- <div class="more fs24 color_9"><span>点击加载更多历史数据</span><img src="/public/static/index/assets/images/more.png" alt=""></div> -->
            </div>
            <div id="tab2" class="weui-tab__bd-item">

              <?php if(is_array($loglist) || $loglist instanceof \think\Collection || $loglist instanceof \think\Paginator): $i = 0; $__LIST__ = $loglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;if($vl['status'] == '3'): ?>
              <div class="Box">
                <div class="titie fs26 color_3 bor_b">
                  <span class="fw_b">武将编号:<?php echo $vl['order_no']; ?></span> <span class="color_r">已完成(收益中)</span>
                </div>
                <div class="content fs26 color_3">
                  <div>区块猪:<?php echo $vl['pig_info']['name']; ?></div>
                  <div>价值：<span class="color_r fw_b"><?php echo $vl['price']; ?></span>≈<?php echo $vl['price']; ?>PIG</div>
                  <div>智能合约收益：<span class="color_r fw_b"><?php echo $vl['pig_info']['cycle']; ?>天/<?php echo $vl['pig_info']['contract_revenue']; ?>%</span></div>
                  <div>获得收益：<span class="color_r fw_b"><?php echo $vl['user_pig']['total_revenue']; ?></span></div>
                  <div>召唤时间：<?php echo date("Y.m.d H:i:s",$vl['user_pig']['create_time']); ?></div>
                  <div class="butt color_r fw_b fs30">锁仓</div>
                </div>

              </div>
              <?php endif; endforeach; endif; else: echo "" ;endif; ?>

              <!-- <div class="more fs24 color_9"><span>点击加载更多历史数据</span><img src="/public/static/index/assets/images/more.png" alt=""></div> -->
            </div>


            <div id="tab3" class="weui-tab__bd-item">

              <?php if(is_array($sslist) || $sslist instanceof \think\Collection || $sslist instanceof \think\Paginator): $i = 0; $__LIST__ = $sslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ls): $mod = ($i % 2 );++$i;?>

              <div class="Box">

                <div class="titie fs26 color_3 bor_b">
                  <span class="fw_b">申述理由</span><span class="color_9"><?php echo date("Y-m-d H:i:s",$ls['create_time']); ?></span>
                </div>
                <div class="content fs26 color_3">
                  <div class="reason"><?php echo $ls['content']; ?></div>
                  <div class="top fs24 color_9">武将编号:<?php echo $ls['pig_no']; ?></div>
                </div>
              </div>

              <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <!--<div id="tab4" class="weui-tab__bd-item">-->
               <!--<div class="Box">-->
                <!--<div class="titie fs26 color_3 bor_b">-->
                  <!--<span class="fw_b">申述理由</span><span class="color_9">2018.11.18 20:30:52</span>-->
                <!--</div>-->
                <!--<div class="content fs26 color_3">  -->
                  <!--<div class="reason">召唤啦，却没有显示在已召唤</div>-->
                  <!--<div class="top fs24 color_9">武将编号:201811048494484445213</div>-->
                <!--</div>-->
              <!--</div>-->
            <!--</div>-->

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
    //     var url   = '/api/business/adopt_log';
    //     var mehod = 'get';
    //     var data  = {};
    //     __ajax(url,data,mehod,function(res){
    //
    //           console.log(res.data);
    //           var adoption = $.isEmptyObject(res.data.adoption);//召唤中
    //           var adopted = $.isEmptyObject(res.data.adopted);//已召唤
    //           var appeal = $.isEmptyObject(res.data.appeal);//申诉中
    //           var destroy=$.isEmptyObject(res.data.destroy);//申诉中
    //
    //
    //
    //           if (!adoption) {
    //               var str= '';
    //               console.log(111);
    //               console.log(res.data);
    //               $.each(res.data.adoption, function(i, obj) {
    //                 str += '<a href="javascript:;" onclick="detail('+obj.order_id+')">';
    //                 str += '<div class="Box">';
    //                 str += '<div class="titie fs26 color_3 bor_b">';
    //                 str += '<span class="fw_b">武将编号:'+obj.pig_order_sn+'</span> <span class="color_r">区块写入中</span>';
    //                 str += '</div>';
    //                 str += '<div class="content fs26 color_3">';
    //                 str += '<div>武将:'+obj.goods_name+'</div>';
    //                 str += '<div>价值：<span class="color_r fw_b">'+obj.pig_price+'</span>≈'+obj.pig_currency+'DSC</div>';
    //                 str += '<div>智能合约收益：<span class="color_r fw_b">'+obj.contract_days+'天/'+obj.income_ratio+'%</span></div>';
    //                 str += '<div>获得收益：<span class="color_r fw_b">'+obj.profit+'</span></div>';
    //                 str += '<div>召唤时间：'+obj.establish_time+'</div>';
    //                 str += '<div class="confirm_time'+obj.order_id+'" onclick="ddd()">确认剩余时间：<span class="color_r fw_b remaining_time'+obj.order_id+'" id="remaining_time'+obj.order_id+'" data-time="'+obj.remaining_time+'"></span></div>';
    //                 if (obj.img_url) {
    //                   str += '<div class="button"><div class="fs30 fw_b color_r">待确认</div><a href="javascript:;" class="right fs30 fw_b color_r" onclick="appeal('+obj.order_id+')">申诉</a></div>';
    //                 } else {
    //                   str += '<div class="button"><div class="fs30 fw_b color_r" onclick="detail('+obj.order_id+')">付款</div></div>';
    //                 }
    //                 str += '</div>';
    //                 str += '</div>';
    //                 str += '</a>';
    //                   var maxtime = obj.remaining_time;
    //                   var order_id= obj.order_id;
    //                    console.log(maxtime)
    //                   timer = setInterval(function(){
    //                     if (maxtime >= 0) {
    //                         var seconds = Math.floor(maxtime % 60);
    //                         var minutes = Math.floor(maxtime / 60 % 60);
    //                         var hour = Math.floor((maxtime / 3600) % 24); //计算小时，换算有多少小时，取余，24小时制除以24，余出多少小时
    //                         // var day = Math.floor(maxtime / (60 * 60 * 24));
    //                         msg =  hour + "小时" + minutes + "分" + seconds + "秒";
    //                         console.log(msg);
    //                         //$(".remaining_time"+order_id).eq(i).html(msg);
    //                         $("#remaining_time"+order_id).html(msg);
    //                         --maxtime;
    //                     } else{
    //                         $(".confirm_time"+order_id).eq(0).remove();
    //
    //                         clearInterval(timer);
    //                     }
    //                   }, 1000);
    //                 });
    //
    //               $('#tab1').append(str);
    //           }else{
    //               var str = ''
    //               str += '<div class="more fs24 color_9"><span>暂无数据</span>';
    //               $('#tab1').append(str);
    //           }
    //           if(!adopted) {
    //               var str = '';
    //               console.log(222);
    //               console.log(res.data);
    //               $.each(res.data.adopted, function(i, obj) {
    //                 // str += '<a href="javascript:;" onclick="detail('+obj.order_id+')">';
    //                 str += '<div class="Box">';
    //                 str += '<div class="titie fs26 color_3 bor_b">';
    //                 str += '<span class="fw_b">武将编号:'+obj.pig_order_sn+'</span>';
    //                 if (obj.pay_status == 1) {
    //                   str += '<span class="color_r">交易中</span>';
    //                 }
    //                 str += '</div>';
    //                 str += '<div class="content fs26 color_3">';
    //                 str += '<div>武将:'+obj.goods_name+'</div>';
    //                 str += '<div>价值：<span class="color_r fw_b">'+obj.price+'</span>≈'+obj.pig_currency+'DSC</div>';
    //                 str += '<div>智能合约收益：<span class="color_r fw_b">'+obj.contract_days+'天/'+obj.income_ratio+'%</span></div>';
    //                 str += '<div>获得收益：<span class="color_r fw_b">'+obj.profit+'</span></div>';
    //                 str += '<div>召唤时间：'+obj.buy_time+'</div>';
    //                 str += '<div>成熟时间：'+obj.end_time+'</div>';
    //                 if (obj.sell_user_id != 0) {
    //                       // str += '<div class="button"><div class="fs30 fw_b color_r" onclick="detail('+obj.order_id+')">查看详情</div></div>';
    //                 }
    //                 str += '</div>';
    //                 str += '</div>';
    //                 // str += '</a>';
    //               });
    //               $('#tab2').append(str);
    //           }else{
    //               var str = ''
    //               str += '<div class="more fs24 color_9"><span>暂无数据</span>';
    //               $('#tab2').append(str);
    //           }
    //           if(!appeal) {
    //               var str = '';
    //               console.log(333);
    //               console.log(res.data.appeal);
    //               $.each(res.data.appeal, function(i, obj) {
    //
    //                 str += '<div class="Box">';
    //                 str += '<div class="titie fs26 color_3 bor_b">';
    //                 str += '<a href="javascript:;" onclick="detail('+obj.order_id+')">';
    //                 str += '<span class="fw_b">申述理由</span><span class="color_9">'+obj.appeal_time+'</span>';
    //                 str += '</div>';
    //                 str += '<div class="content fs26 color_3">';
    //                 str += '<div class="reason">'+obj.remark+'</div>';
    //                 str += '<div class="top fs24 color_9">武将编号:'+obj.pig_order_sn+'</div>';
    //                 str += '</a>';
    //                 if(obj.purchase_user_id==obj.appeal_user_id){
    //                 str += '<div class="button"><div data-orderid="'+obj.order_id+'" class="fs30 fw_b color_r cancelappeal">取消申诉</div></div>';
    //                 }
    //                 str += '</div>';
    //                 str += '</div>';
    //
    //               });
    //               $('#tab3').append(str);
    //           }else{
    //               var str = ''
    //               str += '<div class="more fs24 color_9"><span>暂无数据</span>';
    //               $('#tab3').append(str);
    //           }
    //
    //            if(!destroy) {
    //               var str = '';
    //               console.log(222);
    //               console.log(res.destroy);
    //               $.each(res.data.destroy, function(i, obj) {
    //                 // str += '<a href="javascript:;" onclick="detail('+obj.order_id+')">';
    //                 str += '<div class="Box">';
    //                 str += '<div class="titie fs26 color_3 bor_b">';
    //                 str += '<span class="fw_b">武将编号:'+obj.pig_order_sn+'</span>';
    //                 if (obj.pay_status == 1) {
    //                   str += '<span class="color_r">交易中</span>';
    //                 }
    //                 str += '</div>';
    //                 str += '<div class="content fs26 color_3">';
    //                 str += '<div>武将:'+obj.goods_name+'</div>';
    //                 str += '<div>价值：<span class="color_r fw_b">'+obj.price+'</span>≈'+obj.pig_currency+'DSC</div>';
    //                 str += '<div>智能合约收益：<span class="color_r fw_b">'+obj.contract_days+'天/'+obj.income_ratio+'%</span></div>';
    //                 str += '<div>获得收益：<span class="color_r fw_b">'+obj.profit+'</span></div>';
    //                 str += '<div>召唤时间：'+obj.buy_time+'</div>';
    //                 str += '<div>销毁时间：'+obj.deltime+'</div>';
    //                 if (obj.sell_user_id != 0) {
    //                       str += '<div class="button"><div class="fs30 fw_b color_r" onclick="detail('+obj.order_id+')">查看详情</div></div>';
    //                 }
    //                 str += '</div>';
    //                 str += '</div>';
    //                 // str += '</a>';
    //               });
    //               $('#tab4').append(str);
    //           }else{
    //               var str = ''
    //               str += '<div class="more fs24 color_9"><span>暂无数据</span>';
    //               $('#tab4').append(str);
    //           }
    //     });
     function appeal(order_id){
       window.location.href = '/dist/pages/buyer_appeal.html?order_id='+order_id
     }
    function detail(id){
      window.location.href = '/index/User/adopt_detail?id='+id
    }
</script>
    <script>


      $(document).on("click",".cancelappeal",function () {
          var orderid=$(this).data('orderid');
          var url   = '/api/business/cancel_appeal';

          /* if(confirm("确定要取消申诉吗？"))
            {*/
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
           /*}*/

      })

      $(function() {
        var p_str = $(".content p");
        var boxheight = 0;
        for (var i = 0; i < p_str.length; i++) {
          var boxheight = parseFloat($(p_str[i]).css("lineHeight")) * 4;
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





    </script>

</body>

</html>
