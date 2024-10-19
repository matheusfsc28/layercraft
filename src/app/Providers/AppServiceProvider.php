<?php

namespace Matheusfsc28\LayerCraft\App\Providers;

use Illuminate\Support\ServiceProvider;
use Matheusfsc28\LayerCraft\App\Interfaces\Directories\ControllerInterface;
use Matheusfsc28\LayerCraft\App\Interfaces\Directories\InterfaceInterface;
use Matheusfsc28\LayerCraft\App\Interfaces\Directories\ModelInterface;
use Matheusfsc28\LayerCraft\App\Interfaces\Directories\RepositoryInterface;
use Matheusfsc28\LayerCraft\App\Interfaces\Directories\ServiceInterface;
use Matheusfsc28\LayerCraft\App\Repositories\Directories\ControllerRepository;
use Matheusfsc28\LayerCraft\App\Repositories\Directories\InterfaceRepository;
use Matheusfsc28\LayerCraft\App\Repositories\Directories\ModelRepository;
use Matheusfsc28\LayerCraft\App\Repositories\Directories\RepositoryRepository;
use Matheusfsc28\LayerCraft\App\Repositories\Directories\ServiceRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ControllerInterface::class, ControllerRepository::class);
        $this->app->bind(ServiceInterface::class, ServiceRepository::class);
        $this->app->bind(RepositoryInterface::class, RepositoryRepository::class);
        $this->app->bind(ModelInterface::class, ModelRepository::class);
        $this->app->bind(InterfaceInterface::class, InterfaceRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
