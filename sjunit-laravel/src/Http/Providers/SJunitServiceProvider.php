<?php
namespace AaronLee\SJunitLaravel\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Route;
class SJunitServiceProvider extends ServiceProvider{


    public function register(){

     $this->registerRoutes();
        // 指定的组件的名称，自定义的资源目录地址
        $this->loadViewsFrom(
            __DIR__.'/../../resources/views', 'sjunit'
        );
    }


    public function boot(){


    }


    // 参考别人的写法
    // 对于源码熟悉更好一些
    private function registerRoutes()
    {
//        dd(__DIR__.'/../Http/route.php');
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes.php');
        });
    }

    private function routeConfiguration()
    {
        return [
            // 定义访问路由的域名

            // 是定义路由的命名空间
            'namespace' => 'AaronLee\SJunitLaravel\Http\Controllers',
            // 这是前缀
            'prefix' => 'aaron',
            // 这是中间件
            'middleware' => 'web',
        ];
    }

}