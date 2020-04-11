<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:41:"./themes/hdindex/user\system_message.html";i:1551682237;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
  <head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,viewport-fit=cover">
<link rel="stylesheet" href="/public/static/hdindex/assets/css/zpui.css"/>
<link rel="stylesheet" href="/public/static/hdindex/assets/css/all_black.css"/>
<style type="text/css">
  .news .Box .content {
    margin: 0.2rem 0.2rem 0;
    padding-bottom: 0.2rem;
    overflow: hidden;
    
  }

  .box_show{
     max-height: 1.5rem;
     text-overflow: ellipsis;
    white-space: nowrap;
  }

  .cli_show{
      text-align: center;
      display: block !important;
      padding-top: 10px;
  }
</style>

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
    <title>系统消息</title>
  </head>
  <body>
   <div id="wrap" style="z-index: 1000000;
    position: fixed ! important;
    right: -25px;
    top: 8px;">
    <!-- 谷歌语言 -->
    <div id="google_translate_element"></div>
   </div>
    <div class="page news">
      <div class="page-hd">
        <div class="header bor-1px-b">
    <div class="header-left">
        <a href="javascript:history.go(-1)" class="left-arrow"></a>
    </div>
    <div class="header-title">系统消息</div>
    <div class="header-right">
        <a href="#"></a>
    </div>
</div>
      </div>
      <div class="page-bd">
        <!-- 页面内容 -->
        <div class="weui-tab">
          <div class="weui-navbar">
            <a class="weui-navbar__item weui-bar__item--on color_9" id="tab11" href="#"
              >全部消息
            </a>
            <a class="weui-navbar__item color_9" id="tab12" href="#"> 系统消息 </a>
            <a class="weui-navbar__item color_9" id="tab13" href="#"> 活动通知 </a>
          </div>
          <div class="weui-tab__bd">
            <div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active">
                <?php if(is_array($newslist) || $newslist instanceof \think\Collection || $newslist instanceof \think\Paginator): $i = 0; $__LIST__ = $newslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$news): $mod = ($i % 2 );++$i;?>
              <div class="Box">
                <div class="titie fs26 color_3 bor_b fw_b">
                  <?php echo $news['title']; ?>:<?php echo $news['create_time']; ?>
                </div>
                <div class="content fs26 color_3">
                 <?php echo htmlspecialchars_decode($news['content']); ?>
                </div>
                <!--<div class="more fs24 color_9">-->
                  <!--<span>点击查看更多</span-->
                  <!--&gt;<img src="/public/static/index/assets/images/more.png" alt="" />-->
                <!--</div>-->
              </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
              </div>
            <div id="tab2" class="weui-tab__bd-item">
                <?php if(is_array($newslist) || $newslist instanceof \think\Collection || $newslist instanceof \think\Paginator): $i = 0; $__LIST__ = $newslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$news): $mod = ($i % 2 );++$i;if($news['cate'] == '1'): ?>
               <div class="Box">
                    <div class="titie fs26 color_3 bor_b fw_b">
                      <?php echo $news['title']; ?>:<?php echo $news['create_time']; ?>
                    </div>
                    <div class="content fs26 color_3">
                      <!--<p>-->
                        <!--温馨提示:随着区块武将集市持续火爆，越来越多的玩家参与进来，为了保证交易的顺畅进行和玩家的资金安全，请大家-->
                        <!--自行检查并修改自己的收款账户-->
                      <!--</p>-->
                        <?php echo htmlspecialchars_decode($news['content']); ?>
                    </div>
                    <div class="more fs24 color_9">
                      <span>点击查看更多</span
                      ><img src="/public/static/index/assets/images/more.png" alt="" />
                    </div>
                  </div>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div id="tab3" class="weui-tab__bd-item">
                <?php if(is_array($newslist) || $newslist instanceof \think\Collection || $newslist instanceof \think\Paginator): $i = 0; $__LIST__ = $newslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$news): $mod = ($i % 2 );++$i;if($news['cate'] == '2'): ?>
                <div class="Box">
                    <div class="titie fs26 color_3 bor_b fw_b">
                        <?php echo $news['title']; ?>:<?php echo $news['create_time']; ?>
                    </div>
                    <div class="content fs26 color_3">
                        <!--<p>-->
                            <!--温馨提示:随着区块武将集市持续火爆，越来越多的玩家参与进来，为了保证交易的顺畅进行和玩家的资金安全，请大家-->
                            <!--自行检查并修改自己的收款账户-->
                        <!--</p>-->
                        <?php echo htmlspecialchars_decode($news['content']); ?>
                    </div>
                    <!--<div class="more fs24 color_9">-->
                      <!--<span>点击查看更多</span-->
                      <!--&gt;<img src="/public/static/index/assets/images/more.png" alt="" />-->
                    <!--</div>-->
                </div>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
             <!--  <div class="noNew">
                <img src="/public/static/index/assets/images/noNew.png" alt="" /><span
                  class="fs26 color_3"
                  >抱歉，您暂时没有要处理的消息~</span
                >
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="/public/static/index/assets/js/lib/jquery-2.1.4.js"></script>
<script src="/public/static/index/assets/js/jquery-weui.min.js"></script>
<!-- <script src="/public/static/index/assets/js/lib/fastclick.js"></script> -->
<script src="/public/static/index/assets/js/layer.js"></script>
<script src="/public/static/index/assets/js/ajaxplugin.js"></script>
<script>
  $('#tab11').click(function () {
      $('#tab1').show();
      $('#tab2').hide();
      $('#tab3').hide();
  })
  $('#tab12').click(function () {
      $('#tab2').show();
      $('#tab1').hide();
      $('#tab3').hide();
  })
  $('#tab13').click(function () {
      $('#tab3').show();
      $('#tab2').hide();
      $('#tab1').hide();
  })

    // var url = '/api/help/system_message';
    // var mehod = 'get';
    // __ajax(url,{},mehod,function(res){
    //           console.log(res.data);
    //           var all_list    = $.isEmptyObject(res.data.all_list);
    //           var system_list = $.isEmptyObject(res.data.system_list);
    //           var activity_list = $.isEmptyObject(res.data.activity_list);
    //           if (!all_list) {
    //               console.log(all_list);
    //               var str= '';
    //
    //               $.each(res.data.all_list, function(i, obj) {
    //                 str+= '<div class="Box">';
    //                 str+= '<div class="titie fs26 color_3 bor_b fw_b">系统消息:'+obj.create_time;
    //                 str += '</div>';
    //                 str += '<div class="content fs26 color_3 test cli_box box_show">';
    //                 str += '<p>'+obj.content+'</p>';
    //                 str += '</div>';
    //                 str += '<div class="more fs24 color_9 cli_show">';
    //                 str += '<span>点击查看更多</span><img src="/public/static/index/assets/images/more.png" alt="" />';
    //                 str += '</div>';
    //                 str += '</div>';
    //               });
    //               $('#tab1').append(str);
    //           }else{
    //               var str = ''
    //               str += '<div class="noNew">';
    //               str += '<img src="/public/static/index/assets/images/noNew.png" alt="" /><span class="fs26 color_3">抱歉，您暂时没有要处理的消息~</span>';
    //               str += '</div>';
    //               $('#tab1').append(str);
    //           }
    //           if (!system_list) {
    //               var str= '';
    //
    //               $.each(res.data.system_list, function(i, obj) {
    //                 str+= '<div class="Box">';
    //                 str+= '<div class="titie fs26 color_3 bor_b fw_b">系统消息:'+obj.create_time;
    //                 str += '</div>';
    //                 str += '<div class="content fs26 color_3 test cli_box box_show">';
    //                 str += '<p>'+obj.content+'</p>';
    //                 str += '</div>';
    //                 str += '<div class="more fs24 color_9 cli_show">';
    //                 str += '<span>点击查看更多</span><img src="/public/static/index/assets/images/more.png" alt="" />';
    //                 str += '</div>';
    //                 str += '</div>';
    //               });
    //               $('#tab2').append(str);
    //           }else{
    //               var str = ''
    //               str += '<div class="noNew">';
    //               str += '<img src="/public/static/index/assets/images/noNew.png" alt="" /><span class="fs26 color_3">抱歉，您暂时没有要处理的消息~</span>';
    //               str += '</div>';
    //               $('#tab2').append(str);
    //           }
    //           if(!activity_list) {
    //               var str = '';
    //
    //               $.each(res.data.activity_list, function(i, obj) {
    //                 str+= '<div class="Box">';
    //                 str+= '<div class="titie fs26 color_3 bor_b fw_b">活动通知:'+obj.create_time;
    //                 str += '</div>';
    //                 str += '<div class="content fs26 color_3 test cli_box box_show">';
    //                 str += '<p>'+obj.content+'</p>';
    //                 str += '</div>';
    //                 str += '<div class="more fs24 color_9 cli_show">';
    //                 str += '<span>点击查看更多</span><img src="/public/static/index/assets/images/more.png" alt="" />';
    //                 str += '</div>';
    //                 str += '</div>';
    //               });
    //               $('#tab3').append(str);
    //           }else{
    //               var str = ''
    //               str += '<div class="noNew">';
    //               str += '<img src="/public/static/index/assets/images/noNew.png" alt="" /><span class="fs26 color_3">抱歉，您暂时没有要处理的消息~</span>';
    //               str += '</div>';
    //               $('#tab3').append(str);
    //           }
    //
    //           var p_str = $(".content p");
    //           var boxheight = 0;
    //           console.log(p_str)
    //           for (var i = 0; i < p_str.length; i++) {
    //             let boxheight = parseFloat($(p_str[i]).css("lineHeight")) * 4;
    //               console.log(boxheight)
    //
    //             if ($(p_str[i]).height() > boxheight) {
    //               console.log(p_str[i])
    //
    //               $(p_str[i]).css("display", "-webkit-box");
    //               $(p_str[i]).parents(".Box").find(".more").css("display", "flex");
    //             }
    //           }
    //
    //          $('.cli_show').click(function(e){
    //             var result=$(this).siblings('.cli_box').toggleClass('box_show');
    //             if(result.hasClass('box_show')){
    //               $(this).html('点击查看更多');
    //             }else{
    //                $(this).html('收回信息');
    //             }
    //          });
    //     });
</script>
  <!--   <script>
      $(function() {
        let p_str = $(".content p");
        let boxheight = 0;
        console.log(p_str)
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
      
      
      
    </script> -->
      
  </body>
</html>
