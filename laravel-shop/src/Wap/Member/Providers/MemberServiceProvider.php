<?php
namespace AaronLee\LaravelShop\Wap\Member\Providers;

use Illuminate\Foundation\Application as LaravelApplication;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use EasyWeChat\OfficialAccount\Application as OfficialAccount;
class MemberServiceProvider extends ServiceProvider{
    protected $middlewareGroup=[
    ];
    protected $routeMiddleware=[
        "wechat.oauth"=>\Overtrue\LaravelWeChat\Middleware\OAuthAuthenticate::class//微信认证中间件
    ];
    protected $commands=[
        \AaronLee\LaravelShop\Wap\Member\Console\Commands\InstallCommand::class   //需要加载的命令文件
    ];
    public function register(){

        $this->registerRoutes();

        // 指定的组件的名称，自定义的资源目录地址
        $this->loadViewsFrom(
            __DIR__.'/../../resources/views', 'shop'
        );
        //加载配置文件member.php
        $this->mergeConfigFrom(__DIR__.'/../Config/member.php', "wap.member");

        $this->registerpublishing();

        //该命令相当于执行服务提供者

        $this->registerRouteMiddleware();
    }


    //注册中间件

    /**
     *服务提供者注册完后执行
     */
    public function boot()
    {

        //1
        $this->loadMemberAuthConfig();

        //2
        $this->loadMigrations();

        //3
        $this->commands($this->commands);


        $this->app->singleton("wechat.official_account.default", function ($laravelApp) {
            $app = new OfficialAccount(array_merge(config('wechat.defaults', []), config("wechat.official_account.default", [])));

            if (config('wechat.defaults.use_laravel_cache')) {
                $app['cache'] = $laravelApp['cache.store'];
            }
            $app['request'] = $laravelApp['request'];
            return $app;
        });
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
     *发布配置文件   php artisan vendor:publish --provider="AaronLee\LaravelShop\Wap\Member\Providers\MemberServiceProvider"
     */
    protected function registerpublishing()
    {
        if ( $this->app->runningInConsole()) {
            $this->publishes([ __DIR__.'/../Config'=> config_path('wap')], 'laravel-shop-wap-member');
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