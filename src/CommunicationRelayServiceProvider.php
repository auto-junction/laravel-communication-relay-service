<?php

namespace AshokDevatwal\CommunicationRelay;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use AshokDevatwal\CreditScore\Services\CibilServiceInterface;
use AshokDevatwal\CreditScore\Services\CrediSureService;
use AshokDevatwal\CreditScore\Services\IntegrityMasterService;

use AshokDevatwal\CreditScore\Commands\UpdateScore;

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
