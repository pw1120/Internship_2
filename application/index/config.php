<?php
return[
    // 视图输出字符串内容替换
    'view_replace_str' => [
        '__PUBLIC__'=>'/static/index',
        '__ADMIN__'=>'/static/admin',
    ],

    'paginate'               => [
        'type'      => 'page\Page',
        'var_page'  => 'page',
        'list_rows' => 15,
    ],
];