<?php

namespace Arifszn\AdvancedValidation;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang/', 'advancedValidation');

        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/advancedValidation'),
        ]);
    }
}
