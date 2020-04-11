<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:42:"./themes/hdindex/user\reservation_log.html";i:1575709269;}*/ ?>
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
    <title>预约</title>
  </head>
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
    <div class="header-title">预约</div>
    <div class="header-right">
        <a href="#"></a>
    </div>
</div>
      </div>
      <div class="page-bd">
        <!-- 页面内容 -->
        <div class="weui-cells">
            <?php if(is_array($loglist) || $loglist instanceof \think\Collection || $loglist instanceof \think\Paginator): $i = 0; $__LIST__ = $loglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pig): $mod = ($i % 2 );++$i;?>
           <div class="weui-cell box">
            <div class="weui-cell__bd">
              <div class="fs28 color_3 fw_b top">
                <?php echo $pig['pig_name']; ?>
                  <span class="fs24 color_9">
                      <?php switch($pig['status']): case "0": ?>(未开始)<?php break; case "1": ?>(已抢到)<?php break; case "2": ?>(未抢到，已退回)<?php break; endswitch; ?>
                  </span>
              </div>
              <div class="fs24 color_9"><?php echo date("Y-m-d H:i:s",$pig['create_time']); ?></div>
            </div>
            <div class="weui-cell__ft">
              <div class="fs30 color_3 fw_b top"><?php echo $pig['pay_points']; ?></div>
              <div class="fs24 color_9">花费粮草</div>
            </div>
          </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
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
    // var url   = '/api/business/reservation_log';
    // var mehod = 'get';
    // var data  = {};
    // __ajax(url,data,mehod,function(res){
    //       console.log(res.data);
    //       var data = $.isEmptyObject(res.data);
    //       if (!data) {
    //           var adopted_str= '';
    //           console.log(111);
    //           console.log(res.data);
    //           $.each(res.data, function(i, obj) {
    //             adopted_str+= '<div class="weui-cell box">';
    //             adopted_str += '<div class="weui-cell__bd">';
    //             adopted_str += '<div class="fs28 color_3 fw_b top">';
    //             adopted_str += ''+obj.goods_name+'<span class="fs24 color_9">('+obj.reservation_status+')</span>';
    //             adopted_str += '</div>';
    //             adopted_str += '<div class="fs24 color_9">'+obj.reservation_time+'</div>';
    //             adopted_str += '</div>';
    //             adopted_str += '<div class="weui-cell__ft">';
    //             adopted_str += '<div class="fs30 color_3 fw_b top">'+obj.pay_points+'</div>';
    //             adopted_str += '<div class="fs24 color_9">花费粮草</div>';
    //             adopted_str += '</div>';
    //             adopted_str += '</div>';
    //           });
    //           $('.weui-cells').append(adopted_str);
    //       }else{
    //           var adopted_str = '<div style="text-align: center;padding-top:20px"><span>暂无数据</span>';
    //           $('.weui-cells').append(adopted_str);
    //       }
    // });
</script>
    <script></script>
     
  </body>
</html>
