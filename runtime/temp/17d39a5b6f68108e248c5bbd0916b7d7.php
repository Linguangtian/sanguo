<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:37:"./themes/hdindex/user\doge_money.html";i:1551682237;}*/ ?>
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
    <title>DOGE币</title>
  </head>
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
    <div class="header-title">DOGE币</div>
    <div class="header-right">
        <a href="#"></a>
    </div>
</div>
      </div>
      <div class="page-bd">
        <!-- 页面内容 -->
         <div class="top">
              <div class="fw_b color_3 num doge_money"><?php echo $user['doge']; ?></div>
              <!-- <span class="fs28 color_9">≈3933.6584HKD</span> -->
              <a href="doge_draw.html" class="fs26 butt">提取</a>
         </div>
         <div class="boxlist">
            <?php if(is_array($doge_list) || $doge_list instanceof \think\Collection || $doge_list instanceof \think\Paginator): $i = 0; $__LIST__ = $doge_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$doge): $mod = ($i % 2 );++$i;?>
              <div class="box">
                  <!--<div class="name fs26 color_3 bor_b">区块编号<?php echo $doge['id']; ?></div>-->
                  <div class="info">
                     <div class="row"><span class="fs28 fw_b color_3"><?php echo $doge['note']; ?></span><span class="fs24 color_9"><?php echo $doge['create_time']; ?></span></div>
                     <div class="fs36 fw_b color_3"><?php echo $doge['amount']; ?></div>
                  </div>
                </div>
             <?php endforeach; endif; else: echo "" ;endif; ?>
                <!--<div class="box">-->
                    <!--<div class="name fs26 color_3 bor_b">区块编号201811048494484445213</div>-->
                    <!--<div class="info">-->
                       <!--<div class="row"><span class="fs28 fw_b color_3">推荐收益奖励</span><span class="fs24 color_9">2018.11.08 20:50:03</span></div> -->
                       <!--<div class="fs36 fw_b color_3">+6.3697</div>-->
                    <!--</div>-->
                  <!--</div>-->
                  <!--<div class="box">-->
                      <!--<div class="name fs26 color_3 bor_b">区块编号201811048494484445213</div>-->
                      <!--<div class="info">-->
                         <!--<div class="row"><span class="fs28 fw_b color_3">推荐收益奖励</span><span class="fs24 color_9">2018.11.08 20:50:03</span></div> -->
                         <!--<div class="fs36 fw_b color_3">+6.3697</div>-->
                      <!--</div>-->
                    <!--</div> -->
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
    // });
    // var url       = '/api/business/doge_money'
    // var data      = {}
    // var mehod     = 'get';
    // __ajax(url,data,mehod,function(data){
    //       console.log(data.data)
    //     $('.doge_money').html(data.data.doge_money);
    //
    //       var str = html ='';
    //       $.each(data.data.list, function(i, obj) {
    //         str += '<div class="box">';
    //         str += '<div class="name fs26 color_3 bor_b">区块编号'+obj.order_sn+'</div>';
    //         str += '<div class="info">';
    //         str += '<div class="row"><span class="fs28 fw_b color_3">'+obj.desc+'</span><span class="fs24 color_9">'+obj.add_time+'</span></div>';
    //         str += '<div class="fs36 fw_b color_3">'+obj.doge_money+'</div>';
    //         str += '</div>';
    //         str += '</div>';
    //       });
    //       $(".boxlist").append(str);
    // });
</script>
    <script></script>
     
  </body>
</html>