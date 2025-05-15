<?php

namespace Uvatechs\LivewireSweetAlert;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Uvatechs\LivewireSweetAlert\Components\SweetAlert;

class LivewireSweetAlertServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'livewire-sweetalert');
        Livewire::component('sweet-alert', SweetAlert::class);
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/livewire-sweetalert'),
        ], 'views');
    }

    public function register()
    {
        //
    }
}