<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:38:"./themes/hdindex/user\add_payment.html";i:1551682237;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
  <head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,viewport-fit=cover">
<link rel="stylesheet" href="/public/static/hdindex/assets/css/zpui.css"/>
<link rel="stylesheet" href="/public/static/hdindex/assets/css/all_black.css"/>
<script src="/public/static/index/assets/js/page.js"></script>
<style type="text/css">
  .weui-select-modal .weui-cells{
    height: 200px;
  }
</style>
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
    <title>添加支付方式</title>
  </head>
  <body>
   <div id="wrap" style="z-index: 1000000;
    position: fixed ! important;
    right: -25px;
    top: 8px;">
    <!-- 谷歌语言 -->
    <div id="google_translate_element"></div>
   </div>
    <div class="page verify">
      <div class="page-hd">
        <div class="header bor-1px-b">
    <div class="header-left">
        <a href="javascript:history.go(-1)" class="left-arrow"></a>
    </div>
    <div class="header-title">添加收款方式</div>
    <div class="header-right">
        <a href="#"></a>
    </div>
</div>
      </div>
      <div class="page-bd">
        <!-- 页面内容 -->
        <div class="fromBox">
          <div class="weui-cells__title fs28 color_3 fw_b">收款方式</div>
            <div class="weui-cells weui-cells_form">
              <div class="weui-cell weui-cell_access">
                <div class="weui-cell__bd">
                  <input class="weui-input fs28 fw_b type" type="text" readonly id="type" value="微信" />
                </div>
                <div class="weui-cell__ft"></div>
              </div>
            </div>

          <div class="weui-cells__title  fs28 color_3 fw_b "><span class="zhanghao">微信</span>账号</div>
              <div class="weui-cells weui-cells_form">
                <div class="weui-cell">
                  <div class="weui-cell__bd">
                    <input class="weui-input fs28 fw_b account" type="text" placeholder="请输入账号"/>
                  </div>
                </div>
              </div>

              <div class="weui-cells__title  fs28 color_3 fw_b ">收款人</div>
              <div class="weui-cells weui-cells_form">
                <div class="weui-cell">
                  <div class="weui-cell__bd">
                    <input class="weui-input fs28 fw_b name" type="text" placeholder="请输入收款人姓名"/>
                  </div>
                </div>
              </div> 

            <div class="bank_name1">
              <div class="weui-cells__title fs28 color_3 fw_b ">开户银行</div>
              <div class="weui-cells weui-cells_form">
                <div class="weui-cell weui-cell_access">
                  <div class="weui-cell__bd">
                    <input class="weui-input fs28 fw_b bank_name" type="text" readonly="readonly" id="bank_name" value="中国银行" />
                  </div>
                  <div class="weui-cell__ft"></div>
                </div>
              </div>
            </div>

            <div class="branch_name1">
              <div class="weui-cells__title  fs28 color_3 fw_b branch_name1">支行</div>
              <div class="weui-cells weui-cells_form">
                <div class="weui-cell">
                  <div class="weui-cell__bd">
                    <input class="weui-input fs28 fw_b branch_name" type="text" placeholder="请输入支行名称"/>
                  </div>
                </div>
              </div>
            </div>

            <div class="img1">
              <div class="weui-cells__title  fs28 color_3 fw_b imgs1">收款二维码</div>
              <div class="weui-cells weui-cells_form">
                <div class="weui-cell fileBox" style="padding-left: 0px">
                  <form id="head_pic" method="post" enctype="multipart/form-data">
                  <div class="weui-cell__bd">
                    <img src="" width="335px" style="height: 2.333333rem;" id="img">
                    <input id="uploaderInput" class="weui-uploader__input imgs"  onchange="loadimg(this)" type="file" accept="image/*" />
                  </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="weui-cells__title  fs28 color_3 fw_b">手机号</div>
            <div class="weui-cells weui-cells_form">
              <div class="weui-cell">
                <div class="weui-cell__bd">
                  <input class="weui-input fs28 fw_b mobile" type="text" readonly="readonly" value="<?php echo $user['mobile']; ?>"/>
                </div>
              </div>
            </div>

            <div class="weui-cells__title  fs28 color_3 fw_b">手机验证码</div>
            <div class="weui-cells weui-cells_form">
              <div class="weui-cell">
                <div class="weui-cell__bd">
                  <input class="weui-input fs28 fw_b code" type="text" placeholder="请输入验证码"/>
                </div>
               <div class="weui-cell__ft fs28 fw_b color_r" id="btnSendCode" onclick="sendMessage()">获取验证码</div> 
              </div>
            </div>
        </div>

        <div class="butBox"><div class="but">确认添加</div></div>
      </div>
    </div>
<script src="/public/static/index/assets/js/lib/jquery-2.1.4.js"></script>
<script src="/public/static/index/assets/js/jquery-weui.min.js"></script>
<script src="/public/static/index/assets/js/lib/fastclick.js"></script>
<script src="/public/static/index/assets/js/layer.js"></script>
<script src="/public/static/index/assets/js/ajaxplugin.js"></script>
<script src="/public/static/index/assets/js/ios.js"></script>
<script>
    $(function() {
        FastClick.attach(document.body);
        $("#img").hide();
    });
    $(document).ready(function(){
        var query = window.location.search.substring(1);
        var id = query.substring(3);
        if(id == 1){
            $('.zhanghao').html('支付宝');
            $('#type').attr('value','支付宝');
        }else if(id == 2){
            $('.zhanghao').html('微信');
            $('#type').attr('value','微信');
        }else if(id == 3){
            $('.zhanghao').html('银行卡');
            $('#type').attr('value','银行卡');
            $(".bank_name1").show();
            $(".branch_name1").show();
            $(".img1").hide();
        }
    });

  if (navigator.userAgent.match(/(iPhone|iPod|iPad);?/i)) { //ios
      $('body').on('blur','input',function(){
            window.scrollTo(0,0);
        })
    }

  //   var url = '/api/User/user_mobile';
  //   var mehod = 'post';
  //   var usermobile='';
  //   __oajax(url,{},mehod,function(data){
  //     // console.log(data.data.mobile);
  //     // var mobile = '13544227507';
  //     $('.mobile').val(data.data.mobile);
  //     usermobile=data.data.mobile;
  //     // $('.mobile').val(mobile);
  //
  // });
    var usermobile = $('.mobile').val()

    $("#type").select({
      title: "开户银行",
      items: ["微信", "支付宝","银行卡"],
      id: [1, 2,3]
    });
    $("#bank_name").select({
      flex: 1,
      title: "收款方式",
      items: ["中国银行",
              "中国建设银行",
              "中国工商银行", 
              "中国农业银行",
              "中国邮政储蓄银行",
              "招商银行",
              "交通银行",
              "中国光大银行",
              "中国民生银行",
              "平安银行",
              "浦发银行",
              "中信银行",
              "兴业银行",
              "华夏银行",
              "广发银行"],
    });
    if (type == '银行卡') {
              $(".bank_name1").show();
              $(".branch_name1").show();
              $(".img1").hide();
    }else{
          $(".bank_name1").hide();
          $(".branch_name1").hide();
          $(".img1").show();
    }

    $('#type').change(function(){
        var type = $('#type').val();
        $('.zhanghao').html(type)
        if (type == '银行卡') {
              $(".bank_name1").show();
              $(".branch_name1").show();
              $(".img1").hide();
        }else{
              $(".bank_name1").hide();
              $(".branch_name1").hide();
              $(".img1").show();
        }
    })
    /*$("#uploaderInput").change(function (e) {
      var _this = this;
      let type = ['jpeg','jpg','png'];
      var file = e.target.files[0] || e.dataTransfer.files[0];
      var img       = $('#uploaderInput').get(0).files[0];
      var img_type  = img.type.split("/")[1];
      if( type.indexOf(img_type) == -1  ){
        layer.open({
              content: '图片格式必须是:jpg,jpeg,png'
              ,skin: 'msg'
              ,time: 1 //2秒后自动关闭
        });
        return false;
      }
      if (file) {
          var reader = new FileReader();
          reader.onload = function () {
              $("#img").attr("src", this.result);
              $("#uploaderInput").hide();
              $("#img").show();
              var url       = '/api/payment/upload_base64_paycode'
              var mehod = 'post';
              a_load(url,{img:this.result},mehod,function(data){
                  if(data.status == 200){
                    window.return_img = data.data
                  }else {
                      layer.open({
                      content: data.message
                      ,skin: 'msg'
                      ,time: 1 //2秒后自动关闭
                    });
                  }
              });
          }
          reader.readAsDataURL(file);
      }
    });*/
    $('.but').click(function(){
      var url       = '/index/User/add_payment'
      var data      = {}
      data.c_type   = $('#type').val();
      //data.type     = 1;
      data.account  = $('.account').val();
      data.bank_name  = $('.bank_name').val();
      data.branch_name= $('.branch_name').val();
      data.mobile   = $('.mobile').val();
      data.name     = $('.name').val();
      data.imgs     = window.return_img;
      data.code     = $('.code').val();

      if(!data.account){
          layer.open({
              content: '请输入账号'
              ,skin: 'msg'
              ,time: 1 //2秒后自动关闭
          });
          return false;
      }
      if(!data.name){
          layer.open({
              content: '请输入收款人'
              ,skin: 'msg'
              ,time: 1 //2秒后自动关闭
          });
          return false;
      }
      if (data.c_type == '支付宝' || data.c_type == '微信') {
        if (!data.imgs) {
          layer.open({
              content: '请上传收款二维码'
              ,skin: 'msg'
              ,time: 1 //2秒后自动关闭
          });
          return false;
        }
      }

      if ( data.c_type == '银行卡'){

        if(!data.branch_name){
          layer.open({
              content: '请输入支行名称'
              ,skin: 'msg'
              ,time: 1 //2秒后自动关闭
          });
          return false;
        }
      }
  
      // console.log(data);return;
      var mehod = 'post';
      __ajax(url,data,mehod,function(data){
          if(data.code == 1){
            layer.open({
              content: data.msg
              ,skin: 'msg'
              ,time: 1 //2秒后自动关闭
            });
            window.setTimeout(function(){
              window.history.go(-1);
            },1000);
          }else {
              layer.open({
              content: data.msg
              ,skin: 'msg'
              ,time: 1 //2秒后自动关闭
            });
          }
      });
    })


    function loadimg(uploadfile){

       /* if (navigator.userAgent.match(/(iPhone|iPod|iPad);?/i)) { //ios
          system_alert('photo');
         // window.app.Photo();
        }else{
          uploadImage(uploadfile)
        }*/

        uploadImage(uploadfile)
    }

    function uploadImage(e){
      var _this = this;
      var type = ['jpeg','jpg','png'];
      var file = e.files[0] ;
      var img       = $('#uploaderInput').get(0).files[0];
      var img_type  = img.type.split("/")[1];
      if( type.indexOf(img_type) == -1  ){
        layer.open({
              content: '图片格式必须是:jpg,jpeg,png'
              ,skin: 'msg'
              ,time: 1 //2秒后自动关闭
        });
        return false;
      }
      if (file) {
          var reader = new FileReader();
          reader.onload = function () {
              $("#img").attr("src", this.result);
              $("#uploaderInput").hide();
              $("#img").show();
              var url       = '/api/Upload/upload_base64_paycode'
              var mehod = 'post';
              a_load(url,{img:this.result},mehod,function(data){
                  console.log(data)
                  if(data.status == 200){
                    window.return_img = data.data
                  }else {
                      layer.open({
                      content: data.message
                      ,skin: 'msg'
                      ,time: 3 //2秒后自动关闭
                    });
                  }
              });
          }
          reader.readAsDataURL(file);
      }
    }

    function AppReturnBase64Image(base64imag){
       var form = document.getElementById("head_pic");
        // 用表单来初始化
        var formData = new FormData();   //这里连带form里的其他参数也一起提交了,如果不需要提交其他参数可以直接FormData无参数的构造函数
   
        formData.append("head_pic",convertBase64UrlToBlob(base64imag));
        var url       = '/api/Upload/upload_base64_paycode'
        var mehod = 'post';

        var e = layer.open({
              type:2
          });
          $.ajax({
          type: "POST",
          url: url,
          data: formData,
          dataType: 'json',
          cache: false,
          contentType: false, /*不可缺*/
          processData: false, /*不可缺*/
          success: function (data) {
              layer.close(e);

              if(data.status == 200){
                 var img = data.data.imgpath;
                  $("#img").attr("src",img );
                  $("#img").show();
                    window.return_img = img
                  }else {
                      layer.open({
                      content: data.message
                      ,skin: 'msg'
                      ,time: 1 //2秒后自动关闭
                    });
              }

          },
          error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("上传失败，请检查网络后重试");
            return false;
          }
        });

      }
   /* var src = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAkCAYAAABIdFAMAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAHhJREFUeNo8zjsOxCAMBFB/KEAUFFR0Cbng3nQPw68ArZdAlOZppPFIBhH5EAB8b+Tlt9MYQ6i1BuqFaq1CKSVcxZ2Acs6406KUgpt5/LCKuVgz5BDCSb13ZO99ZOdcZGvt4mJjzMVKqcha68iIePB86GAiOv8CDADlIUQBs7MD3wAAAABJRU5ErkJggg';
    AppReturnBase64Image(src);*/
  
    function convertBase64UrlToBlob(urlData){  
      
        var bytes=window.atob(urlData.split(',')[1]);        //去掉url的头，并转换为byte  

        //处理异常,将ascii码小于0的转换为大于0  
        var ab = new ArrayBuffer(bytes.length);  
        var ia = new Uint8Array(ab);  
        for (var i = 0; i < bytes.length; i++) {  
            ia[i] = bytes.charCodeAt(i);  
        }  

        return new Blob( [ab] , {type : 'image/png'});  
    }

  var count = 60;
  var curCount;

  function sendMessage() {  
      curCount = count;  
      var mobile = usermobile;
      var code = $(".code").val();

      
      var reg1 = /\d{1,}/;
      var reg2 = /^1[3456789]\d{9}$/;

      if(!reg1.test(mobile)){
        layer.open({
              content: '请输入手机号码!'
              ,skin: 'msg'
              ,time: 1 //2秒后自动关闭
            });
        return false;
      } else if (!reg2.test(mobile)){
        layer.open({
              content: '请输入正确的手机号码!'
              ,skin: 'msg'
              ,time: 1 //2秒后自动关闭
            });
        return false;
      }

      var url       = '/index/Login/smsCode'
      var data      = {}
      var mehod = 'post';
      data.mobile   = usermobile;
      data.scene   = 6
      __ajax(url,data,mehod,function(data){
          if (data.code == 1) {
              layer.open({
                  content: data.msg,
                  skin: 'msg',
                  time: 3 //2秒后自动关闭
              });
              $("#btnSendCode").attr("disabled", "true");
              InterValObj = window.setInterval(SetRemainTime, 1000);
          }else{
              layer.open({
                  content: data.message,
                  skin: 'msg',
                  time: 3 //2秒后自动关闭
              });
              return false;
          }
      })
  }

  //timer处理函数  
  function SetRemainTime() {
      if (curCount <= 0) {
          window.clearInterval(InterValObj);//停止计时器
          $("#btnSendCode").removeAttr("disabled");//启用按钮  
          $("#btnSendCode").html("发送验证码");
      }  
      else {  
          curCount--;  
          $("#btnSendCode").html(curCount + "秒重新发送");  
      }
  }
</script>

<style type="text/css">
    .bodybg-alert {
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 9998;
        background: #000000;
        filter: alpha(opacity:50);
        opacity: 0.5;
        -moz-opacity: 0.5;
        -khtml-opacity: 0.5;
    }

    .bodybg-alert-content {
        position: fixed;
        height: 40px;
        line-height: 40px;
        top: 50%;
        width: 100%;
        z-index: 99999;
        text-align: center;
    }

    .bodybg-alert-content span {
        background: #FFFFFF;
        padding: 0 20px;
        height: 40px;
        line-height: 40px;
        display: inline-block;
        min-width: 120px;
        border-radius: 5px;
        font-size: 14px;
    }
</style>
<script type="text/javascript">
    function system_alert(_message, _time) {
        var _time = _time ? _time * 1000 : 2000;
        var bodybg = '<div class="bodybg-alert"></div>';
        var bodybgcotnet = '<div class="bodybg-alert-content"><span>' + _message + '</span></div>';
        $('body').append(bodybg).append(bodybgcotnet);
        setTimeout(function () {
            $('.bodybg-alert').remove('');
            $('.bodybg-alert-content').remove('');
        }, _time);
    }
</script>
 
  </body>
</html>
