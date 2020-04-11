<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:30:"./themes/admin/admin\edit.html";i:1551682237;s:42:"D:\phpstudy_pro\WWW\themes\admin\base.html";i:1575605567;}*/ ?>
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
            <li class=""><a href="<?php echo url('index'); ?>">管理员</a></li>
            <li class=""><a href="<?php echo url('add'); ?>">添加管理员</a></li>
            <li class="layui-this">编辑管理员</li>
            <a href="javascript:history.go(-1)" class="right-arrow">返回</a>

        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <form class="layui-form form-container" action="<?php echo url('update'); ?>" method="post">
                    <div class="layui-form-item">
                        <label class="layui-form-label">用户名</label>
                        <div class="layui-input-block">
                            <input type="text" name="username" value="<?php echo $admin_user['username']; ?>" required  lay-verify="required" placeholder="请输入用户名" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">密码</label>
                        <div class="layui-input-block">
                            <input type="password" name="password" value="" placeholder="（选填）如不修改则留空" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">重复密码</label>
                        <div class="layui-input-block">
                            <input type="password" name="confirm_password" value="" placeholder="（选填）如不修改则留空" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">状态</label>
                        <div class="layui-input-block">
                            <input type="radio" name="status" value="1" title="启用" <?php if($admin_user['status']==1): ?> checked="checked"<?php endif; ?>>
                            <input type="radio" name="status" value="0" title="禁用" <?php if($admin_user['status']==0): ?> checked="checked"<?php endif; ?>>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">所属权限组</label>
                        <div class="layui-input-block">
                            <select name="group_id" lay-verify="required">
                                <?php if(is_array($auth_group_list) || $auth_group_list instanceof \think\Collection || $auth_group_list instanceof \think\Paginator): if( count($auth_group_list)==0 ) : echo "" ;else: foreach($auth_group_list as $key=>$vo): ?>
                                <option value="<?php echo $vo['id']; ?>" <?php if($admin_user['group_id']==$vo['id']): ?> selected="selected"<?php endif; ?>><?php echo $vo['title']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <input type="hidden" name="id" value="<?php echo $admin_user['id']; ?>">
                            <button class="layui-btn" lay-submit lay-filter="*">更新</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <!--底部-->
    <div class="layui-footer footer">
        <div class="layui-main">
            <p>源码来自倾城源码</p>
        </div>
    </div>
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

<script>
    high_nav("<?php echo url('index'); ?>");
</script>

</body>
</html>