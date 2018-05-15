<?php
namespace app\api\controller;
use app\common\wechat\Wechat;

class Index
{
    public function index()
    {
        $app = Wechat::getAPP('officialAccount') ;
        $app->server->push(function ($message) {
            switch ($message['MsgType']) {
                case 'event':
                    return '收到事件消息';
                    break;
                case 'text':
                    return '收到文字消息';
                    break;
                case 'image':
                    return '收到图片消息';
                    break;
                case 'voice':
                    return '收到语音消息';
                    break;
                case 'video':
                    return '收到视频消息';
                    break;
                case 'location':
                    return '收到坐标消息';
                    break;
                case 'link':
                    return '收到链接消息';
                    break;
                case 'file':
                    return '收到文件消息';
                // ... 其它消息
                default:
                    return '收到其它消息';
                    break;
            }
        });
        
        // 在 laravel 中：
        $response = $app->server->serve();
        
        // $response 为 `Symfony\Component\HttpFoundation\Response` 实例
        // 对于需要直接输出响应的框架，或者原生 PHP 环境下
        $response->send();
    }
}
