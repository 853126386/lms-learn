<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/12/4
 * Time: 10:21
 */
namespace AaronLee\LaravelShop\Wap\Member;
use Illuminate\Support\Facades\Auth;
class member{


    public   function guard()
    {
        return Auth::guard('member');
    }

    public  function __call($method,$param)
    {
        $this->guard()->$method(...$param);
    }



}