<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:33:"./themes/hdindex/user\profit.html";i:1551682237;}*/ ?>
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
    <title>收益记录</title>
  </head>
  <style type="text/css">
    .profit{
      font-size: 0.186667rem;
      height: 0.833333rem;
      line-height: 0.833333rem;
      text-align: center;
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
    <div class="page PIGmoney">
      <div class="page-hd">
        <div class="header bor-1px-b">
    <div class="header-left">
        <a href="javascript:history.go(-1)" class="left-arrow"></a>
    </div>
    <div class="header-title">收益记录</div>
    <div class="header-right">
        <a href="#"></a>
    </div>
</div>
      </div>
      <div class="page-bd">
        <!-- 页面内容 -->
         <div class="top">
              <div class="fw_b color_3 num accumulated_income"><?php echo $user['total_share_integral']; ?></div>
              <span class="fs28 color_9 ">累计收益</span>
              <a href="javascript:;" class="fs26 butt" onclick="sell()">出售</a>
         </div>
         <div class="boxlist">
             <?php if(is_array($loglist) || $loglist instanceof \think\Collection || $loglist instanceof \think\Paginator): $i = 0; $__LIST__ = $loglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
             <div class="box">
                <div class="name fs26 color_3 bor_b">ID <?php echo $user['mobile']; ?><?php echo $v['note']; ?></div>
                <div class="info">
                   <div class="row"><span class="fs28 fw_b color_3">推荐收益奖励</span><span class="fs24 color_9"></span></div>
                   <div class="fs36 fw_b color_3"><?php echo $v['amount']; ?></div>
                </div>
              </div>
             <?php endforeach; endif; else: echo "" ;endif; ?>
              <!--<div class="box">-->
                  <!--<div class="name fs26 color_3 bor_b">ID 15693654785获得价值</div>-->
                  <!--<div class="info">-->
                     <!--<div class="row"><span class="fs28 fw_b color_3">推荐收益奖励</span><span class="fs24 color_9">2018.11.08 20:50:03</span></div> -->
                     <!--<div class="fs36 fw_b color_3">+6.3697</div>-->
                  <!--</div>-->
                <!--</div>-->
                <!--<div class="box">-->
                    <!--<div class="name fs26 color_3 bor_b">ID 15693654785获得价值</div>-->
                    <!--<div class="info">-->
                       <!--<div class="row"><span class="fs28 fw_b color_3">推荐收益奖励</span><span class="fs24 color_9">2018.11.08 20:50:03</span></div> -->
                       <!--<div class="fs36 fw_b color_3">+6.3697</div>-->
                    <!--</div>-->
                  <!--</div>-->
                  <!--<div class="box">-->
                      <!--<div class="name fs26 color_3 bor_b">ID 15693654785获得价值</div>-->
                      <!--<div class="info">-->
                         <!--<div class="row"><span class="fs28 fw_b color_3">推荐收益奖励</span><span class="fs24 color_9">2018.11.08 20:50:03</span></div> -->
                         <!--<div class="fs36 fw_b color_3">+6.3697</div>-->
                      <!--</div>-->
                    <!--</div>-->
         </div>

      </div>
    </div>
<script src="/public/static/index/assets/js/lib/jquery-2.1.4.js"></script>
<script src="/public/static/index/assets/js/jquery-weui.min.js"></script>
<script src="/public/static/index/assets/js/lib/fastclick.js"></script>
<script src="/public/static/index/assets/js/layer.js"></script>
<script src="/public/static/index/assets/js/ajaxplugin.js"></script>
<script>
    // $(function() {
    //     FastClick.attach(document.body);
    //     var url   = '/api/business/profit';
    //     var mehod = 'get';
    //     var data  = {};
    //     __ajax(url,data,mehod,function(res){
    //           $('.accumulated_income').html(res.data.accumulated_income);
    //           var data = $.isEmptyObject(res.data);
    //           if (!data) {
    //             console.log(res.data)
    //               var adopted_str= '';
    //               $.each(res.data.list, function(i, obj) {
    //                 adopted_str += '<div class="box">';
    //                 // adopted_str += '<div class="name fs26 color_3 bor_b">ID '+obj.user_id+'</div>';
    //                 adopted_str += '<div class="info">';
    //                 adopted_str += '<div class="row"><span class="fs28 fw_b color_3">'+obj.desc+'</span><span class="fs24 color_9">'+obj.change_time+'</span></div>';
    //                 adopted_str += '<div class="fs36 fw_b color_3">'+obj.user_money+'</div>';
    //                 adopted_str += '</div>';
    //                 adopted_str += '</div>';
    //               });
    //               $('.boxlist').append(adopted_str);
    //           }else{
    //             var adopted_str= '';
    //             adopted_str += '<div class="box">';
    //             adopted_str += '<div class="row profit">暂无收益</div>';
    //             adopted_str += '</div>';
    //             $('.boxlist').append(adopted_str);
    //           }
    //     });
    //
    // });
    function sell(){
        window.location.href = '/index/User/sell'
    //   var url = '/api/User/index';
    //   var mehod = 'post';
    //   __ajax('/api/business/is_yuyue',{},mehod,function(data){
    //     if(data.status == 0){
    //       layer.open({
    //           content: data.message
    //           ,time: 2
    //           ,skin: 'msg'
    //       });
    //       window.setTimeout(function(){
    //           window.location.href = '/index/User/authentication'
    //       },1000);
    //     }else{
    //       window.location.href = '/index/Usesr/sell'
    //     }
    // });
  }
</script>

  </body>
</html>
