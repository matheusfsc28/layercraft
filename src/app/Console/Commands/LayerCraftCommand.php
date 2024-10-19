<?php

namespace Matheusfsc28\LayerCraft\App\Console\Commands;

use Matheusfsc28\LayerCraft\App\Services\Directories\ControllerService;
use Matheusfsc28\LayerCraft\App\Services\Directories\InterfaceService;
use Matheusfsc28\LayerCraft\App\Services\Directories\ModelService;
use Matheusfsc28\LayerCraft\App\Services\Directories\RepositoryService;
use Matheusfsc28\LayerCraft\App\Services\Directories\ServiceService;
use Illuminate\Console\Command;

class LayerCraftCommand extends Command
{
    protected $signature = 'layercraft {name}';
    protected $description = 'Creates the layered structure (Controller, Service, Interface, Repository, Model)';

    public function __construct(
        protected ControllerService $controllerService,
        protected InterfaceService $interfaceService,
        protected ModelService $modelService,
        protected RepositoryService $repositoryService,
        protected ServiceService $serviceService,
    ) {
        parent::__construct();
    }

    public function handle(): void
    {
        try {
            $name = $this->argument('name');
            if (!$name) throw new \Exception("No name provided ( EX: php artisan layercraft className)");

            $pathParts = explode('\\', $name);
            $className = array_pop($pathParts);
            $namespace = implode('/', $pathParts);

            $this->controllerService->createTemplate($className, $namespace);
            $this->interfaceService->createTemplate($className, $namespace);
            $this->modelService->createTemplate($className, $namespace);
            $this->repositoryService->createTemplate($className, $namespace);
            $this->serviceService->createTemplate($className, $namespace);

            $this->info('Layered structure created successfully!');
        } catch (\Exception $e) {
            $this->error('Error creating layered structure: ' . $e->getMessage());
        }
    }
}
