<?php
/*
'''''''''''''''''''''''''''''''''''''''''''''''''''''''''
源码来自108源码网分享 rc108.com
''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
 */

return [
    // +----------------------------------------------------------------------
    // | 后台模板设置
    // +----------------------------------------------------------------------

    'template' => [
        // 模板路径
        'view_path' => './themes/admin/'
    ],
        // 视图输出字符串内容替换
    'view_replace_str'      => [
        '__UPLOAD__' => '/public/uploads',
        '__STATIC__' => '/public/static/Admin',
        '__IMAGES__' => '/public/static/Admin/images',
        '__JS__'     => '/public/static/Admin/js',
        '__CSS__'    => '/public/static/Admin/css',
    ],
];