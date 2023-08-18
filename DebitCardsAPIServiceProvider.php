<?php

namespace DebitCardsAPI;

use Illuminate\Support\ServiceProvider;

class DebitCardsAPIServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/dcapi.php' => config_path('dcapi.php'),
        ], 'config');
    }
}
