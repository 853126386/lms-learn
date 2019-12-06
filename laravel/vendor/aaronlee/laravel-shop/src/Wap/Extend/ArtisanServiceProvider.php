<?php
namespace AaronLee\LaravelShop\Wap\Extend;

use Illuminate\Foundation\Application as LaravelApplication;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use EasyWeChat\OfficialAccount\Application as OfficialAccount;
class ArtisanServiceProvider extends ServiceProvider{
    protected $commands=[
        Make\ClassMakeCommand::class,   //需要加载的命令文件
        Make\ControllerMakeCommand::class,   //需要加载的命令文件
        Make\ModelMakeCommand::class   //需要加载的命令文件
    ];
    public function register(){

        //3.注册命令
        $this->commands($this->commands);


    }

    /**
     *服务提供者注册完后执行
     */
    public function boot()
    {



    }




}