<?php

namespace AshokDevatwal\CommunicationRelay\Facades;

use Illuminate\Support\Facades\Facade;

class SmsService extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * This tells Laravel which binding in the service container to resolve.
     */
    protected static function getFacadeAccessor()
    {
        return 'communication-relay-service';
    }
}
