<?php

namespace Providers;

use Aws\Sdk;
use Illuminate\Support\ServiceProvider;

class AwsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Providers\AwsServiceProvider', function ($app) {
            putenv('AWS_PHP_CACHE_DIR=' . storage_path() . '/meta');
            return new Sdk([
                'region'      => 'us-east-1',
                'validation'  => true,
                'version'     => 'latest'
            ]);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [ 'Providers\AwsServiceProvider' ];
    }
}
