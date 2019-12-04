<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/12/4
 * Time: 10:26
 */
namespace AaronLee\LaravelShop\Wap\Member\Facades;
use Illuminate\Support\Facades\Facade;
/**
 * 提供给用户的工具类
 */
class Member extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \AaronLee\LaravelShop\Wap\Member\Member::class;
    }
}
