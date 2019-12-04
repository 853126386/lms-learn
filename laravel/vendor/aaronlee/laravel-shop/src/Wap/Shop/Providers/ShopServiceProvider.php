<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/12/4
 * Time: 15:14
 */
namespace AaronLee\LaravelShop\Wap\Shop\Providers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
class ShopServiceProvider extends \Illuminate\Support\ServiceProvider{




    public function register()
    {
        //注册路由
        $this->registerRoutes();

        // 指定的组件的名称，自定义的资源目录地址
        $this->loadViewsFrom(
            __DIR__.'/../Resources/views', 'wap-shop'
        );
        //加载配置文件shop.php
        $this->mergeConfigFrom(__DIR__.'/../Config/shop.php', "wap.shop");

        //发布静态资源
        $this->registerpublishing();

        //该命令相当于执行服务提供者

//        $this->registerRouteMiddleware();

    }


    /**
     *服务提供者注册完后执行
     */
    public function boot()
    {

        //1
//        $this->loadMemberAuthConfig();

        //2
//        $this->loadMigrations();

        //3
//        $this->commands($this->commands);


//        $this->app->singleton("wechat.official_account.default", function ($laravelApp) {
//            $app = new OfficialAccount(array_merge(config('wechat.defaults', []), config("wechat.official_account.default", [])));
//
//            if (config('wechat.defaults.use_laravel_cache')) {
//                $app['cache'] = $laravelApp['cache.store'];
//            }
//            $app['request'] = $laravelApp['request'];
//            return $app;
//        });
    }

    /**
     *根据member.php文件更新容器中config配置
     */
    protected function loadMemberAuthConfig(){
        config(Arr::dot(config('wap.member.wechat', []), 'wechat.'));
        config(Arr::dot(config('wap.member.auth', []), 'auth.'));
    }

    /**
     *加载数据库迁移文件
     */
    protected function loadMigrations()
    {
        if($this->app->runningInConsole()){ //判断是否是命令行执行
            $this->loadMigrationsFrom(__DIR__.'/../Database/migrations/');
        }
    }

    /**
     *发布静态文件   php artisan vendor:publish --provider="AaronLee\LaravelShop\Wap\Member\Providers\MemberServiceProvider"
     */
    protected function registerpublishing()
    {
        if ( $this->app->runningInConsole()) {
            $this->publishes([ __DIR__.'/../Resources/assets'=> public_path('vendor/aaronlee/laravel-wap-shop')], 'laravel-shop-wap-shop');

        }
    }

    /**
     *注册路由中间件
     */

    protected function registerRouteMiddleware(){
        foreach ($this->routeMiddleware as $k=>$v){
            $this->app['router']->aliasMiddleware($k,$v);
        }

        foreach ($this->middlewareGroup as $k=>$v){
            $this->app['router']->middlewareGroup($k,$v);
        }
    }




    /**
     * 注册路由 [参考别人的写法,对于源码熟悉更好一些]
     */

    private function registerRoutes()
    {
//        dd(__DIR__.'/../Http/route.php');
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../Routes/shop.php');
        });
    }

    private function routeConfiguration()
    {
        return [
            // 定义访问路由的域名
            // 是定义路由的命名空间
            'namespace' => 'AaronLee\LaravelShop\Wap\Shop\Http\Controllers',
            // 这是前缀
            'prefix' => 'wap/shop',
            // 这是中间件
            'middleware' => 'web',
        ];
    }




}