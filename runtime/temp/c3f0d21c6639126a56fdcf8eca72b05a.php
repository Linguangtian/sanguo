<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:33:"./themes/hdindex/index\index.html";i:1575709380;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <style>
        *{ -webkit-touch-callout:none; -webkit-user-select:none; -khtml-user-select:none; -moz-user-select:none;-ms-user-select:none; user-select:none; }
        header, .top_fixed {-webkit-transform: translateZ(0);}
        .bghead{text-align: center; width: 100%; height: 3rem;line-height: 2rem;padding-top: 0.5rem;}
        .bghead .logo img {height: 1rem;}
        @media screen and (max-width: 320px) {
            .zc_goods_list .item .info { margin: 0rem !important; }
        }
        html {font-size: 6.25vw !important;}
        .footer, .top_fixed { -webkit-transform: translateZ(0);}
    </style>
    <title><?php echo (isset($config['site_title']) && ($config['site_title'] !== '')?$config['site_title']:'亞太區塊龜'); ?></title>
    <link rel="stylesheet" href="https://block-dog.oss-cn-beijing.aliyuncs.com/template/mobile/block/static/css/style.css?v13">
    <link rel="stylesheet" href="https://block-dog.oss-cn-beijing.aliyuncs.com/template/mobile/block/static/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="https://block-dog.oss-cn-beijing.aliyuncs.com/template/mobile/block/static/css/iconfont.css?v=1"/>
    <link rel="stylesheet" href="/public/static/hdindex/css/all.css"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
</head>
<body class="gray" style="background: #272834;">
<header class="top_fixed">
    <div class="content">
        <div class="ds-in-bl logo">
            <a href=""><img src="<?php echo (isset($config['index_img']) && ($config['index_img'] !== '')?$config['index_img']:'../../../public/static/Index/assets/images/guilogo.png'); ?>" alt="LOGO"></a>
        </div> </div>
</header>
<div class="bghead">
    <div class="content">
        <div class="ds-in-bl logo">
            <a href=""><img src="<?php echo (isset($config['index_img']) && ($config['index_img'] !== '')?$config['index_img']:'../../../public/static/Index/assets/images/guilogo.png'); ?>" alt="LOGO"></a>
        </div>
    </div>
</div>
<div class="banner"><img src="<?php echo (isset($config['banner_img']) && ($config['banner_img'] !== '')?$config['banner_img']:'../../../public/static/Index/assets/images/banner.png'); ?>"></div>
<div class="zc_goods_list clearfix">

    <?php if(is_array($piglist) || $piglist instanceof \think\Collection || $piglist instanceof \think\Paginator): $i = 0; $__LIST__ = $piglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pig): $mod = ($i % 2 );++$i;?>
    <div class="item" id="pig_level_<?php echo $pig['id']; ?>" data-actid="<?php echo $pig['id']; ?>"  data-endtime="<?php echo $pig['end_time']; ?>"  data-etime='<?php echo $nowday; ?><?php echo $pig['start_time']; ?>'>
        <img src="<?php echo $pig['img']; ?>"  height="4rem" >
        <div class="info"><h3><?php echo $pig['name']; ?><span style="margin-left:10px; font-size:0.5rem;color:#C4C4C4;">级别：<b  <?php if($pig['level'] == '国王'): ?> style="color:#d6c43b" <?php endif; ?>><?php echo $pig['level']; ?></b></span></h3>
            <p>價值：<b><?php echo $pig['min_price']; ?>-<?php echo $pig['max_price']; ?></b></p>
            <p>召唤時間：<b><?php echo $pig['start_time']; ?>-<?php echo $pig['end_time']; ?></b></p>
            <p>預約/即抢召唤粮草：<b><?php echo $pig['pay_points']; ?>/<?php echo $pig['qiang_points']; ?></b></p>
            <p>智能合約收益：<b><?php echo $pig['cycle']; ?>天/<?php echo number_format($pig['contract_revenue'],0); ?>%</b></p>
            <p>可挖WIA：<b><?php echo $pig['pig']; ?></b>枚</p>
            <p>可挖DOGE：收益<b><?php echo $pig['doge']; ?></b>%</p>
        </div>
        <div class="btn_box btns">
            <?php switch($pig['game_status']): case "0": ?> <a href="javascript:;" class="btn-buy-no buttoning level_btn fanzhi">繁殖中</a><?php break; case "1": ?> <a href="javascript:;" class="btn-apply buttoning" data-id="<?php echo $pig['id']; ?>">预约</a><?php break; case "2": ?> <a href="javascript:;" class="btn-buy-w buttoning">待召唤</a><?php break; case "3": ?> <a href="javascript:;" class="btn-buy-w buttoning">公布中</a><?php break; case "4": ?> <a href="javascript:;" class="btn-buy buttoning level_btn kaijiang" data-id="<?php echo $pig['id']; ?>" data-endtime="<?php echo $pig['end_time']; ?>">召唤</a><?php break; endswitch; ?>
        </div>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>


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
                <a class="yello"   href="<?php echo url('index/index'); ?>">
                    <div class="icon">
                        <i class="icon-gongneng iconfont"></i>
                        <p>乱世王者</p>
                    </div>
                </a>
            </li>

            <li>
                <a style="color:#fff" href="<?php echo url('service/index'); ?>"  >
                    <div class="icon">
                        <i class="icon-yinxingqia iconfont"></i>
                        <p>服務中心</p>
                    </div>
                </a>
            </li>

            <li>
                <a href="<?php echo url('user/index'); ?>">
                    <div class="icon">
                        <i class="icon-my iconfont"></i>
                        <p>我的锦囊</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>

</div>


<div class="index">
    <div class="page-bd">
        <div class="model">
            <div class="modelBG"></div>
            <div class="Box succeed" style="text-align: center;">
                <img src="/public/static/index/assets/images/succeedPig.png" alt="">
                <span class="fs36 fw_b">恭喜您<br>召唤成功!</span>
                <span class="fs36 fw_b"><a style="color:yellow" href="/index/User/adopt_log"  class="gotolog">前往召唤记录</a></span>
                <div class="closeBox" style="margin-top: 10%;" onclick="closeBox()"><img src="/public/static/index/assets/images/closeIcon.png" alt=""></div>
            </div>
            <div class="Box fail" style="text-align: center;">
                <img src="/public/static/index/assets/images/failPig.png" alt="" style="text-align: center">
                <span class="fs36 fw_b">好伤心<br>没召唤到区块武将</span>
                <!--<span class="fs36 fw_b"><a href="/dist/pages/adopt_log.html"  class="gotolog">前往召唤记录</a></span>-->
                <div class="closeBox" style="margin-top: 10%;" onclick="closeBox()"><img src="/public/static/index/assets/images/closeIcon.png" alt=""></div>
            </div>
            <div class="Box loading">

                <div class="qg_wait"><div id="loading-center"><div id="loading-center-absolute"><div id="object"></div><p>等待召唤結果<br>請不要關閉</p></div></div></div>

                <!--<div class="loadBox"><div></div><div></div><div></div><div></div><div></div></div>-->
                <!--<span class="fs36 fw_b">召唤中<br>请不要关闭</span>-->
            </div>
        </div>
        <div class="model3" id="model">
            <div class="modelBG3"></div>
            <div class="Box3 loading">
                <div class="loadBox3"><div></div><div></div><div></div><div></div><div></div></div>
            </div>
        </div>
    </div>
</div>
<audio src="/public/static/index/assets/audio/9888.wav" id="error"></audio>
<audio src="/public/static/index/assets/audio/10762.wav" id="success"></audio>

<!-- 游戏模块s -->
<input name="game_time" type="hidden" value="">
<input name="game_id" type="hidden" value="">
<input name="game_openaward" type="hidden" value="1000">
<input name="game_stage" type="hidden" value="">

<script src="/public/static/index/assets/js/lib/jquery-2.1.4.js"></script>
<script src="/public/static/index/assets/js/jquery-weui.min.js"></script>
<script src="/public/static/index/assets/js/lib/fastclick.js"></script>
<script src="/public/static/index/assets/js/layer.js"></script>
<script src="/public/static/index/assets/js/ajaxplugin.js"></script>

<script>
    $(function() {
        FastClick.attach(document.body);
    });
</script>
<script>
    $(function(){

        var serverTime = <?php echo $nowtime; ?> * 1000;
        var dateTime = new Date();
        if(serverTime==null || serverTime==undefined){
            var difference = 0;
        }else{
            var difference = dateTime.getTime() - serverTime;
        }
        var t1=setInterval(function() {

            $(".zc_goods_list .item").each(function() {
                var obj = $(this);
                var etime = obj.data('etime')
                var endtime = obj.data('endtime')
                var actid = obj.data('actid')
                etime=etime.replace("-","/").replace("-","/");
                if(etime != 0 && etime != undefined) {

                    var endTime = (new Date(etime)).getTime();
                    var nowTime = (new Date()).getTime();
                    var date3=(endTime-nowTime)+difference;
                    var myS = Math.floor(date3/1000);
                    var myhS = Math.floor(date3/100);


                    if(myS>=-120)
                    {
                        if(myhS<=0&&myhS>=-15)
                        {
                            $(this).find(".btn_box").html('<a href="javascript:;" class="btn-buy buttoning kaijiang" data-id="'+actid+'"  data-endtime="'+endtime+'">召唤</a>');
                        }
                        else if(myS<=90&&myS>=0)
                        {
                            // $(this).find(".btn-buy-no").html('繁殖中 <font style="color:#EE7600;font-weight:bold">'+myS+"</font>'S");
                            // $(this).find(".btn-apply").html('预约 <font style="color:#EE7600;font-weight:bold">'+myS+"</font>'S");
                            $(this).find(".btn-buy-w").html('待召唤 <font style="color:#EE7600;font-weight:bold">'+myS+"</font>'S");
                        }
                    }
                }
            });

        }, 1000);


        //阶段处理
        //点击抢购
        $(document).on('click','.kaijiang',function(){
            var id =  $(this).data('id');
            var endtime =  $(this).data('endtime');

            $('.model').show();
            //2019-3-12-----------
            $('.succeed').hide();
            $('.fail').hide();


            $.get('/index/Index/flash_buy',{id:id},function(data){

                //已经返回结果一次结果
                var _data = data;
                console.log(_data);
                if(_data.code == 1){
                    //alert('进入成功');
                    var _aw_time = $('input[name="game_openaward"]').val();

                    window.setTimeout(function(){
                        //查询次数
                        var sel_count =  10000;
                        var _interval = window.setInterval(function(){
                            console.log(sel_count);
                            if(sel_count > 0){
                                $.post('/index/Index/checkFlushOpen',{id:id,endtime:endtime},function(data){
                                    if(data.code == 1 || data.code == 2){
                                        window.clearInterval(_interval);
                                        if(data.code == 1){
                                            $('.loading').hide();
                                            $('.succeed').show();
                                            var success = document.getElementById('success');
                                            $('#pig_level_'+ id +' .btns').html('<a class="btn-buy-no buttoning level_btn fanzhi">繁殖中</a>')
                                            success.play();//audio.play();// 这个就是播放
                                        }else{
                                            $('.loading').hide();
                                            $('.fail').show();
                                            $('#pig_level_'+ id +' .btns').html('<a class="btn-buy-no buttoning level_btn fanzhi">繁殖中</a>')
                                            var error = document.getElementById('error');
                                            error.play();//audio.play();// 这个就是播放
                                        }
                                    }else{
                                        sel_count --;
                                    }
                                })
                            }else{
                                window.clearInterval(_interval);
                                $('.model').hide();
                                $('.loading').hide();
                                $('.fail').show();
                                var error = document.getElementById('error');
                                error.play();//audio.play();// 这个就是播放
                                layer.open({
                                    content: '网络异常'
                                    ,time: 2
                                    ,skin: 'msg'
                                });

                            }

                        },10000)
                    },_aw_time);
                }else{
                    $('.model').hide();
                    $('.loading').hide();
                    // $('.fail').show();
                    // var error = document.getElementById('error');
                    // error.play();//audio.play();// 这个就是播放

                    layer.open({
                        content:_data.msg
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                }
                //第二次访问查看是否有中奖
            });
        });

        //校验游戏
        var id = $('input[name=game_id]');
        var time =  $('input[name=game_time]');
        var openaward =  $('input[name=game_openaward]');
        var stage =  $('input[name=game_stage]');
        var timer;
        //checkGame();
        function checkGame(){
            var success = document.getElementById('success');
            var error = document.getElementById('error');
            local_ajax('/index/Index/checkGame',{},'get',function(data){
                var now = Math.floor(Date.now() / 1000);
                if(data.data.start_time < now && data.data.end_time > now){
                    $.get('/index/Index/yuyueStatus',{id:data.data.id},function (res) {
                        //console.log(res);
                        if (res.code==1) {
                            $('.model').show()
                            $('.succeed').hide();
                            $('.fail').hide();
                            $('.loading').show();
                            $.post('/index/Index/checkOpen',{id:data.data.id}).then(function(res){
                                if(res.code == 1){
                                    $('.succeed').show();
                                    $('.fail').hide();
                                    $('.loading').hide();
                                    success.play();
                                    $('#pig_level_'+ data.data.id +' .btns').html('<a class="btn-buy-no buttoning level_btn fanzhi">繁殖中</a>')
                                    clearInterval(timer);
                                    $('.model').show();
                                    //window.reload();
                                }else if(res.code == 2){
                                    $('.succeed').hide();
                                    $('.fail').show();
                                    $('.loading').hide();
                                    error.play();
                                    $('#pig_level_'+ data.data.id +' .btns').html('<a class="btn-buy-no buttoning level_btn fanzhi">繁殖中</a>')
                                    clearInterval(timer);
                                    $('.model').show();
                                    //window.reload();
                                }else if(res.code == 0){
                                    //$('.succeed').hide();
                                    // $('.fail').show();
                                    // $('.loading').hide();
                                    $('#pig_level_'+ data.data.id +' .btns').html('<a class="btn-buy-w buttoning">公布中</a>')
                                }else{
                                    $('.model').hide()
                                }
                            })
                        } else {
                            //$('#pig_level_'+ data.data.id +' .btns').html('<div class="button fs28 fw_b buttoning level_btn kaijiang" onclick="clickBuy('+data.data.id+')">召唤</div>')
                        }
                    })


                }else if(data.data.end_time < now){
                    $.get('/index/Index/yuyueStatus',{id:data.data.id},function (res) {
                        if(res.code==0){
                            $('#pig_level_'+ data.data.id +' .btns').html('<a class="btn-apply buttoning" data-id="'+data.data.id+'">预约</a>');
                        }else{
                            $('#pig_level_'+ data.data.id +' .btns').html('<a class="btn-buy-w buttoning">待召唤</a>')

                        }
                    })
                }
            })
        }

        $(document).on('click','.btn-apply',function(){
            let thisid = $(this).data('id');
            console.log($(this).data('id'));
            layer.open({
                content: '您确定要预约吗？'
                ,btn: ['确定', '取消']
                ,yes: function(index){
                    $.post('/index/Index/yuyue',{id:thisid}).then(function(res){
                        console.log(res);
                        if(res.code == 1){
                            $('#pig_level_'+ thisid +' .btns').html('<a class="btn-buy-w buttoning">待召唤</a>')
                        }else{
                            // $('#pig_level_'+ thisid +' .btns').html('<a class="btn-buy-w buttoning">待召唤</a>');
                            // clearInterval(timer);
                            // timer = setInterval(checkGame,3000);
                            checkGame();
                            layer.open({
                                content:res.msg
                                ,skin: 'msg'
                                ,time: 2 //2秒后自动关闭
                            });
                        }
                    })
                    layer.close(index);
                }
            });


        })

        // timer = setInterval(function(){
        //     checkGame();
        // },3000);

        // function detail(){
        // var success = document.getElementById('success');
        // var audio1 = document.getElementById('error');
        // success.play(); //这个就是播放
        // audio1.play(); //这个就是播放
        // }
    })
    function closeBox(){
        $('.model').hide();
    }
</script>
</body>
</html>
