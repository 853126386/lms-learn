<?php
Route::get('wechat/user','AuthorizationsController@wechatStore')->middleware("wechat.oauth");