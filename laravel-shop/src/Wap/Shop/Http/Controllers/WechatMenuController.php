<?php
namespace AaronLee\LaravelShop\Wap\Shop\Http\Controllers;

class WechatMenuController extends Controller
{
    public function createMenu()
    {
        $app = app('wechat.official_account');

        $buttons = [
            [
                "type" => "view",
                "name" => "视频",
                "url"  => "http://v.qq.com/"
            ]
        ];
        $res=$app->menu->create($buttons);
        dd($res);


    }
}
