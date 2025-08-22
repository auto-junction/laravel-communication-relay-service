<?php

namespace AshokDevatwal\CommunicationRelay;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use AshokDevatwal\CommunicationRelay\Services\SmsService;

class CommunicationRelayServiceProvider extends ServiceProvider
{
    public function register() {
        // Merge Configuration
        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'communication-relay-service');

        // Bind the SmsService class to the container
        $this->app->singleton('communication-relay-service', function ($app) {
            return new SmsService();
        });
    }
}
