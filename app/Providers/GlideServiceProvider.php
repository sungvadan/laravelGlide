<?php


namespace App\Providers;


use App\Service\ImageUrlGenerator;
use Illuminate\Support\ServiceProvider;

class GlideServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton(ImageUrlGenerator::class, function () {
            return new ImageUrlGenerator(env('GLIDE_SECURE_KEY'));
        });
    }
}
