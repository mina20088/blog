<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Memory Settings
    |--------------------------------------------------------------------------
    |
    | This file contains memory-related settings for the application.
    |
    */

    // Default memory limit for PHP processes
    'limit' => env('PHP_MEMORY_LIMIT', '512M'),

    // Cache settings
    'cache' => [
        'gc_probability' => env('CACHE_GC_PROBABILITY', 100),
        'gc_divisor' => env('CACHE_GC_DIVISOR', 100),
    ],

    // View compilation memory settings
    'view_compilation' => [
        'memory_limit' => env('VIEW_COMPILATION_MEMORY_LIMIT', '512M'),
    ],
];
