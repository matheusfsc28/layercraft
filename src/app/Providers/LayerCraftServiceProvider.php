<?php

namespace Matheusfsc28\LayerCraft\App\Providers;

use Matheusfsc28\LayerCraft\App\Console\Commands\LayerCraftCommand;
use Illuminate\Support\ServiceProvider;

class LayerCraftServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
            LayerCraftCommand::class,
        ]);
    }

    public function boot()
    {
        //
    }
}
