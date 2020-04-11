<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:30:"./themes/admin/user\index.html";i:1575709269;s:49:"C:\Users\87031\Desktop\zxc\themes\admin\base.html";i:1575605567;}*/ ?>
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
    
<div class="layui-body">
    <!--tab标签-->
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class="layui-this">用户管理</li>
            <li class=""><a href="<?php echo url('admin/user/add'); ?>">添加用户</a></li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">


                <form class="layui-form layui-form-pane" action="<?php echo url('admin/user/index'); ?>" method="get">
                    <div class="layui-inline">
                        <label class="layui-form-label">关键词</label>
                        <div class="layui-input-inline">
                            <input type="text" name="keyword" value="<?php echo $keyword; ?>" placeholder="请输入关键词" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <button class="layui-btn">搜索</button>
                    </div>
                    <div class="layui-inline" style="margin: 0 50px;">
                        <label class="layui-form-label" style="width: 120px;">正常用户数量</label>
                        <div class="layui-input-inline" style="width: 50px;">
                            <input type="text" name=""  value="<?php echo $user_num['normal']; ?>" placeholder="" class="layui-input" disabled>
                        </div>

                    </div>
                    <div class="layui-inline" style="margin: 0 50px;">
                        <label class="layui-form-label" style="width: 120px;">冻结用户数量</label>
                        <div class="layui-input-inline" style="width: 50px;">
                            <input type="text" name=""  value="<?php echo $user_num['frozen']; ?>" placeholder="" class="layui-input" disabled>
                        </div>

                    </div>

                </form>
                <br>
                <form class="layui-form layui-form-pane" action="<?php echo url('admin/user/index'); ?>" method="get">
                    <div class="layui-inline">
                        <label class="layui-form-label">排序字段</label>
                        <div class="layui-input-inline">
                            <select name="order_by" id="">
                                <option value="id">ID</option>
                                <option value="mobile">手机号</option>
                                <option value="pay_points">粮草</option>
                                <option value="share_integral">推广收益</option>
                                <option value="contract_revenue">智能合约收益</option>
                                <option value="pig">PIG币</option>
                                <option value="doge">DOGE币</option>
                            </select>
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">顺序</label>
                        <div class="layui-input-inline">
                            <select name="sort" id="">
                                <option value="asc">正序</option>
                                <option value="desc">倒序</option>
                            </select>
                        </div>
                    </div>
                    <div class="layui-inline">
                        <button class="layui-btn">筛选</button>
                    </div>

                </form>
                <hr>
                <div id="ajaxreturn">

                </div>
                <form action="" id="form2">
                <input type="hidden" name="order_by">
                <input type="hidden" name="sort">
                </form>
                <table id="tab" class="layui-table">
                    <thead>
                    <tr>
                        <th style="width: 30px;" onclick="sort('id')">ID</th>
                        <th class="thsort">手机号</th>
                        <th>用户名</th>
                        <th>推荐人</th>
                        <th>一级线下人数</th>
                        <th>二级下线人数</th>
                        <th>三级下线人数</th>
                        <th>粮草</th>

                        <th>推广收益</th>
                        <th>智能合约收益</th>
<!--                        <th>PIG</th>-->
<!--                        <th>DOGE</th>-->
                         <th>状态</th>
                        <th>创建时间</th>
                        <th>注册IP</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($user_list) || $user_list instanceof \think\Collection || $user_list instanceof \think\Paginator): if( count($user_list)==0 ) : echo "" ;else: foreach($user_list as $key=>$vo): ?>
                    <tr>
                        <td><?php echo $vo['id']; ?></td>

                        <td><?php echo $vo['mobile']; ?></td>
                        <td><?php echo $vo['nickname']; ?></td>
                        <td><?php echo !empty($vo['pusername'])?$vo['pusername'] : '系统推荐'; ?></td>
                        <td><?php echo $vo['firstcnt']; ?></td>
                        <td><?php echo $vo['secondcnt']; ?></td>
                        <td><?php echo $vo['thirdcnt']; ?></td>
                        <td><?php echo $vo['pay_points']; ?></td>
                        <td><?php echo $vo['share_integral']; ?></td>
                        <td><?php echo $vo['contract_revenue']; ?></td>
<!--                        <td><?php echo $vo['pig']; ?></td>-->
<!--                        <td><?php echo $vo['doge']; ?></td>-->
                        <td>
                            <?php echo !empty($vo['status'])?'正常' : '冻结'; ?>
                        </td>

                        <td><?php echo date('Y-m-d H:i:s',$vo['create_time']); ?></td>
                        <th><?php echo $vo['reg_ip']; ?></th>
                        <td>
                            <a href="<?php echo url('admin/user/edit',['id'=>$vo['id']]); ?>" class="layui-btn layui-btn-normal layui-btn-mini">编辑</a>
                           <!--  <a href="<?php echo url('admin/user/delete',['id'=>$vo['id']]); ?>" class="layui-btn layui-btn-danger layui-btn-mini ajax-delete">删除</a> -->
                            <?php if($vo['status'] == 1): ?>
                            <a href="<?php echo url('admin/user/activate',['id'=>$vo['id'],'status'=>0]); ?>" class="layui-btn layui-btn-danger layui-btn-mini jh-btn">冻结</a>
                            <?php else: ?><a href="<?php echo url('admin/user/activate',['id'=>$vo['id'],'status'=>1]); ?>" class="layui-btn  layui-btn-mini jh-btn">解冻</a>
                            <?php endif; ?>
                            <a href="<?php echo url('admin/wealth/setwealth',['id'=>$vo['id']]); ?>" class="layui-btn layui-btn-mini">充值扣款</a>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
                <!--分页-->
                <?php echo $user_list->render(); ?>
            </div>
        </div>
        <div style="display: none" id='hide'>
            <div class="layui-form-item">
                <label class="layui-form-label">类型</label>
                <div class="layui-input-block">
                    <select name="identity" lay-verify="required">
                        <option value="0">普通会员</option>
                        <option value="1">经理</option>
                        <option value="2">高级经理</option>
                        <option value="3">总监</option>
                    </select>
                </div>
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