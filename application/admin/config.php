<?php
return [

   'view_replace_str'  =>  [
        '__PUBLIC__'=>'/static/admin',
        '__IMG__'=>'/static',
    ],

    'template'               => [
        // 模板后缀
        'view_suffix'  => 'html',
    ],

    'paginate'               => [
        'type'      => 'bootstrap',
        'var_page'  => 'num',
        'list_rows' => 3,
    ],
    
];
