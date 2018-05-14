<?php
return [
    'adminEmail' => 'admin@example.com',
    'WECHAT' => [
        'debug'  => true,
        'app_id' => 'wx380ea6546932c781',
        'secret' => '882ad46c379241101fb6e7d199fcf10f',
        'token'  => 'yjwechat',
    
        // 'aes_key' => null, // 可选
    
        'log' => [
            'level' => 'debug',
            'file'  => '/frontend/runtime/logs/yjwechat.log', // XXX: 绝对路径！！！！
        ],
    
        //...
    ]
];
