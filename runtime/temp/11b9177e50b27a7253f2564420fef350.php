<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:34:"./themes/admin/task\task_edit.html";i:1586620707;s:36:"E:\git\sanguo\themes\admin\base.html";i:1586619415;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title><?php echo $meta_title; ?></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="/public/static/Admin/js/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/public/static/Admin/css/font-awesome.min.css">
    <!--CSS引用-->
    
    <link rel="stylesheet" href="/public/static/Admin/css/admin.css">
    <!--[if lt IE 9]>
    <script src="/public/static/Admin/css/html5shiv.min.js"></script>
    <script src="/public/static/Admin/css/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="layui-layout layui-layout-admin">
    <!--头部-->
    <div class="layui-header header">
        <a href=""><img class="logo" src="/public/static/Admin/images/admin_logo.png" alt=""></a>
        <ul class="layui-nav" style="position: absolute;top: 0;right: 20px;background: none;">
            <li class="layui-nav-item"><a href="" data-url="<?php echo url('admin/system/clear'); ?>" id="clear-cache">清除缓存</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;"><?php echo session('admin_name'); ?></a>
                <dl class="layui-nav-child"> <!-- 二级菜单 -->
                    <dd><a href="<?php echo url('admin/admin/updatePassword'); ?>">修改密码</a></dd>
                    <dd><a href="<?php echo url('admin/login/logout'); ?>">退出登录</a></dd>
                </dl>
            </li>
        </ul>
    </div>

    <!--侧边栏-->
    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <ul class="layui-nav layui-nav-tree">
                <li class="layui-nav-item layui-nav-title"><a>管理菜单</a></li>
                <li class="layui-nav-item">
                    <a href="<?php echo url('admin/index/index'); ?>"><i class="fa fa-home"></i> 网站信息</a>
                </li>
                <?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): if( count($menu)==0 ) : echo "" ;else: foreach($menu as $key=>$vo): if(isset($vo['children'])): ?>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="<?php echo $vo['icon']; ?>"></i> <?php echo $vo['title']; ?></a>
                    <dl class="layui-nav-child">
                        <?php if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): if( count($vo['children'])==0 ) : echo "" ;else: foreach($vo['children'] as $key=>$v): ?>
                        <dd><a href="<?php echo url($v['name']); ?>"> <?php echo $v['title']; ?></a></dd>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </dl>
                </li>
                <?php else: ?>
                <li class="layui-nav-item">
                    <a href="<?php echo url($vo['name']); ?>"><i class="<?php echo $vo['icon']; ?>"></i> <?php echo $vo['title']; ?></a>
                </li>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>

                <li class="layui-nav-item" style="height: 30px; text-align: center"></li>
            </ul>
        </div>
    </div>

    <!--主体-->
    
<link type="text/css" rel="stylesheet" href="/public/static/Admin/jedate/test/jeDate-test.css">
<link type="text/css" rel="stylesheet" href="/public/static/Admin/jedate/skin/jedate.css">
<script type="text/javascript" src="/public/static/Admin/jedate/src/jedate.js"></script>
<style type="text/css">
    .right-arrow {
        position: absolute;
        width: 64px;
        margin-top: -0.2rem;
        right: 20px;
        height: 38px;
        line-height: 38px;
        padding: 0 18px;
        background-color: #009688;
        color: #fff;
        white-space: nowrap;
        text-align: center;
        font-size: 14px;
        border: none;
        border-radius: 2px;
        cursor: pointer;
    }
    .right-arrow:hover{
        color: #000;
    }
</style>
<div class="layui-body">
    <!--tab标签-->
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class=""><a href="<?php echo url('admin/Task/taskConfig'); ?>">抢购列表</a></li>
            <li class="layui-this">添加</li>
            <a href="javascript:history.go(-1)" class="right-arrow">返回</a>

        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <form class="layui-form form-container" action="<?php echo url('admin/Task/taskEdit'); ?>" method="post">

                    <div class="layui-form-item">
                        <label class="layui-form-label">名称</label>
                        <div class="layui-input-block">
                            <input type="text" name="name" value="<?php echo $taskInfo['name']; ?>" required lay-verify="required" placeholder="请输入名称" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">等级</label>
                        <div class="layui-input-block">
                            <input type="text" name="level" value="<?php echo $taskInfo['level']; ?>" required lay-verify="required" placeholder="请输入等级" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">封面</label>
                        <div class="layui-input-block">
                            <input type="text" name="img" value="<?php echo $taskInfo['img']; ?>" class="layui-input layui-input-inline" id="thumb">
                            <input type="file" name="image" class="layui-upload-file">
                        </div>
                    </div>



                    <div class="layui-form-item">
                        <label class="layui-form-label">预约积分</label>
                        <div class="layui-input-block">
                            <input type="text" name="pay_points" value="<?php echo $taskInfo['pay_points']; ?>" required lay-verify="required" placeholder="请输入预约积分" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">即抢积分</label>
                        <div class="layui-input-block">
                            <input type="text" name="qiang_points" value="<?php echo $taskInfo['qiang_points']; ?>" required lay-verify="required" placeholder="请输入即抢积分" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">最低价格</label>
                        <div class="layui-input-block">
                            <input type="text" name="min_price" value="<?php echo $taskInfo['min_price']; ?>"  required lay-verify="required" placeholder="请选择开抢时间" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">最高价格</label>
                        <div class="layui-input-block">
                            <input type="text" name="max_price" value="<?php echo $taskInfo['max_price']; ?>"  required lay-verify="required" placeholder="请输入最高价格" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">开抢时间</label>
                        <div class="layui-input-block">
                            <input type="text" name="start_time" value="<?php echo $taskInfo['start_time']; ?>" id="start-time" required lay-verify="required" placeholder="请选择开抢时间" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">结束时间</label>
                        <div class="layui-input-block">
                            <input type="text" name="end_time" value="<?php echo $taskInfo['end_time']; ?>" id="end-time" required lay-verify="required" placeholder="请选择开抢时间" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">周期</label>
                        <div class="layui-input-block">
                            <input type="text" name="cycle" value="<?php echo $taskInfo['cycle']; ?>" required lay-verify="required" placeholder="请输入产出周期" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">智能合约</label>
                        <div class="layui-input-block">
                            <input type="text" name="contract_revenue" value="<?php echo $taskInfo['contract_revenue']; ?>" required lay-verify="required" placeholder="请输入产出智能合约" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">可挖PIG</label>
                        <div class="layui-input-block">
                            <input type="text" name="pig" value="<?php echo $taskInfo['pig']; ?>" required lay-verify="required" placeholder="请输入可挖PIG" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">可挖DOGE(%)/天</label>
                        <div class="layui-input-block">
                            <input type="text" name="doge" value="<?php echo $taskInfo['doge']; ?>" required lay-verify="required" placeholder="请输入可挖DOGE" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">最大库存</label>
                        <div class="layui-input-block" style="width: 32%;">
                            <input type="text" name="max_stock" value="<?php echo $taskInfo['max_stock']; ?>" required lay-verify="required" placeholder="请输入最大库存" class="layui-input">
                        </div>
                    </div>


                     <div class="layui-form-item">
                        <label class="layui-form-label">是否积分商品</label>
                        <div class="layui-input-block" style="width: 32%;">

                            <input type="checkbox" name="is_integral_goods" lay-skin="switch"  lay-text="是|否" <?php if($taskInfo['is_integral_goods'] == 'on'): ?> checked <?php endif; ?>>
                        </div>
                    </div>


                    <div class="layui-form-item">
                        <label class="layui-form-label">价值（幸运/推广币）</label>
                        <div class="layui-input-block" style="width: 32%;">
                            <input type="text" name="integral_price" value="<?php echo $taskInfo['integral_price']; ?>" required lay-verify="required" placeholder="价格" class="layui-input">
                        </div>
                    </div>



                    <input type="hidden" name="id" value="<?php echo $taskInfo['id']; ?>">
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit lay-filter="*">保存</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <!--底部-->

</div>

<script>
    // 定义全局JS变量
    var GV = {
        base_url: "/public/static/Admin"
    };
</script>
<!--JS引用-->
<script src="/public/static/Admin/js/jquery.min.js"></script>
<script src="/public/static/Admin/js/layui/lay/dest/layui.all.js"></script>
<script src="/public/static/Admin/js/admin.js"></script>

<!--页面JS脚本-->

<script src="/public/static/Admin/js/layui/lay/modules/laydate.js"></script>
<script>
    high_nav("<?php echo url('index'); ?>");
    jeDate("#start-time",{
        isinitVal:true,
        format:"hh:mm"
    });
    jeDate('#end-time',{
        isinitVal:true,
        format:"hh:mm"
    })


</script>

</body>
</html>