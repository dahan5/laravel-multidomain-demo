<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [
        /*
         * Application Service Providers...
         */
        App\Domain\Foo\Providers\AppServiceProvider::class,
        App\Domain\Foo\Providers\AuthServiceProvider::class,
    ],
];
