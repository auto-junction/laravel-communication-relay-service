<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Communication Relay Service API Key
    |--------------------------------------------------------------------------
    |
    | This key is used to authenticate requests to the Communication Relay 
    | Service (CRS). You can set this in your .env file:
    |
    | CRS_API_KEY=your-api-key-here
    |
    */
    'api_key' => env('CRS_API_KEY', 'none'),

    /*
    |--------------------------------------------------------------------------
    | OTP Endpoint
    |--------------------------------------------------------------------------
    |
    | The API endpoint for sending One Time Password (OTP) requests through CRS. 
    | Define this in your .env file:
    |
    | CRS_OTP_ENDPOINT=https://api.example.com/otp
    |
    */
    'otp_end_point' => env('CRS_OTP_ENDPOINT', 'none'),

    /*
    |--------------------------------------------------------------------------
    | Verify OTP Endpoint
    |--------------------------------------------------------------------------
    |
    | The API endpoint for verify One Time Password (OTP) requests through CRS. 
    | Define this in your .env file:
    |
    | CRS_VERIFY_OTP_ENDPOINT=https://api.example.com/otp
    |
    */
    'verify_otp_end_point' => env('CRS_VERIFY_OTP_ENDPOINT', 'none'),

    /*
    |--------------------------------------------------------------------------
    | SMS Endpoint
    |--------------------------------------------------------------------------
    |
    | The API endpoint for sending SMS messages through CRS. 
    | Define this in your .env file:
    |
    | CRS_SMS_ENDPOINT=https://api.example.com/sms
    |
    */
    'sms_end_point' => env('CRS_SMS_ENDPOINT', 'none'),

    /*
    |--------------------------------------------------------------------------
    | Source Environment
    |--------------------------------------------------------------------------
    |
    | This value identifies the source of requests (for logging or tracking).
    | It can be set as "Development" if using on development environment.
    | Example in .env:
    |
    | CRS_SOURCE=Production
    |
    */
    'source' => env('CRS_SOURCE', 'Development'),

];
