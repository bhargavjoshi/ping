<?php

namespace BhargavJoshi\Ping\ServiceProviders;

use Illuminate\Support\ServiceProvider;

class PingServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Register deploy command.
        $this->commands(['BhargavJoshi\Ping\Commands\ForgeDeployCommand']);
    }
}