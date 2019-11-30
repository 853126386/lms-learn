<?php


return [
  "auth"=>[
      //设置守卫为member
      'guard' => 'member',
      'guards' => [
          'member' => [
              'driver' => 'session',
              'provider' => 'users',
          ]
      ],
      'providers' => [
          'users' => [
              'driver' => 'eloquent',
              'model' => AaronLee\LaravelShop\Wap\Member\Models\User::class,
          ],
      ]
  ]


];