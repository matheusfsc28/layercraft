<?php

namespace Matheusfsc28\LayerCraft\App\Repositories\Directories;

use Matheusfsc28\LayerCraft\App\Interfaces\Directories\ControllerInterface;
use Matheusfsc28\LayerCraft\App\Models\Directories\Controller;

class ControllerRepository implements ControllerInterface
{
    protected Controller $model;

    public function __construct(Controller $model)
    {
        $this->model = $model;
    }

    public function createTemplate(string $className, ?string $namespace = null): string
    {
        return $this->model->template($className, $namespace);
    }
}