<?php

namespace Matheusfsc28\LayerCraft\App\Repositories\Directories;

use Matheusfsc28\LayerCraft\App\Interfaces\Directories\ServiceInterface;
use Matheusfsc28\LayerCraft\App\Models\Directories\Service;

class ServiceRepository implements ServiceInterface
{
    protected Service $model;

    public function __construct(Service $model)
    {
        $this->model = $model;
    }

    public function createTemplate(string $className, ?string $namespace = null): string
    {
        return $this->model->template($className, $namespace);
    }
}