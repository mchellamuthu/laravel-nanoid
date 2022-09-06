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

        
        Str::macro('generateNanoID', function ($size=null, $prefix=null, $seperator=null, $timestamp=false) {
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
