<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Application route groups
    |--------------------------------------------------------------------------
    |
    | Here we can define route group configurations to trim our route files
    |
    */

    'dashboard' => [
        'as' => 'dashboard.',
        'prefix' => 'dashboard',
        'middleware' => 'auth',
        'namespace' => 'Dashboard'
    ],
];