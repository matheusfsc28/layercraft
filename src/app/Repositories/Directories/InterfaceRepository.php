<?php

namespace Matheusfsc28\LayerCraft\App\Repositories\Directories;

use Matheusfsc28\LayerCraft\App\Interfaces\Directories\InterfaceInterface;
use Matheusfsc28\LayerCraft\App\Models\Directories\InterfaceModel;

class InterfaceRepository implements InterfaceInterface
{
    protected InterfaceModel $model;

    public function __construct(InterfaceModel $model)
    {
        $this->model = $model;
    }

    public function createTemplate(string $className, ?string $namespace = null): string
    {
        return $this->model->template($className, $namespace);
    }
}