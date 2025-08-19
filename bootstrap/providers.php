<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\AuthServiceProvider::class,
    App\Providers\EventServiceProvider::class,
    App\Providers\RouteServiceProvider::class,
    App\Providers\BroadcastServiceProvider::class, // jika kamu pakai broadcasting
    App\Providers\AppProfileProvider::class,       // custom provider kamu
];
