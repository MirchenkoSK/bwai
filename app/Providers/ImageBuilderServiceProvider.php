<?php

namespace App\Providers;

use App\Helpers\ImageBuilder;
use Illuminate\Support\ServiceProvider;

class ImageBuilderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('imagebuilder', function() {
            return new ImageBuilder();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
