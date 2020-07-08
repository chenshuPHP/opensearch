<?php
namespace Dachen\Opensearch;
use Illuminate\Support\ServiceProvider;


class AliOpenSearchProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // 发布配置文件
        $this->publishes([
            __DIR__.'/config/opensearch.php' => config_path('opensearch.php'),
        ],'config');
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('opensearch', function ($app) {
            return new AliOpenSearch($app['config']);
        });
    }
}
