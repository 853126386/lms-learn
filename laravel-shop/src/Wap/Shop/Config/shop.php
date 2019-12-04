<?php
return [
    "wechat" => [
        "buttons" => [
            [
                "type" => "view",
                "name" => "laravel-shop",
                "url"  => env('APP_URL', 'http://127.0.0.1').'/wap/shop',
            ], [
                "name"       => "果然很帅",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "百度一下",
                        "url"  => "http://www.baidu.com/"
                    ],
                    [
                        "type" => "click",
                        "name" => "我很牛逼",
                        "key" => "V1001_GOOD"
                    ],
                ],
            ],
        ]
    ]
];
?>