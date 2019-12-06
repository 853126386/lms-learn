<?php
if (!function_exists('shop_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function shop_asset($path, $secure = null)
    {
        $path = "vendor/aaronlee/laravel-wap-shop/" . $path;
        return app('url')->asset($path, $secure);
    }
}