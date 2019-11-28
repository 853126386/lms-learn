<?php
namespace AaronLee\LaravelShop\Wap\Member\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Route;
class MemberServiceProvider extends ServiceProvider{


    public function register(){

        $this->registerRoutes();
        // 指定的组件的名称，自定义的资源目录地址
        $this->loadViewsFrom(
            __DIR__.'/../../resources/views', 'shop'
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
            $this->loadRoutesFrom(__DIR__.'/../Http/routes.php');
        });
    }

    private function routeConfiguration()
    {
        return [
            // 定义访问路由的域名

            // 是定义路由的命名空间
            'namespace' => 'AaronLee\LaravelShop\Wap\Member\Http\Controllers',
            // 这是前缀
            'prefix' => 'wap/member',
            // 这是中间件
            'middleware' => 'web',
        ];
    }


}