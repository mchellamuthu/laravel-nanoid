<?php

namespace Chella\Nanoid;

use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;

class NanoIdServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/nanoid.php' => config_path('nanoid.php'),
        ]);

        Str::macro('getNanoId', function () {
            return NanoidGenerator::getNanoId();
        });
        Str::macro('generateId', function ($size, $prefix, $seperator, $timestamp) {
            return NanoidGenerator::generateId($size, $prefix, $seperator, $timestamp);
        });
    }
    public function register()
    {
        $this->app->singleton(NanoidGenerator::class, function () {
            return new NanoidGenerator();
        });
    }
}
