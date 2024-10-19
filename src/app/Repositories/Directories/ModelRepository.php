<?php

namespace Matheusfsc28\LayerCraft\App\Repositories\Directories;

use Matheusfsc28\LayerCraft\App\Interfaces\Directories\ModelInterface;
use Matheusfsc28\LayerCraft\App\Models\Directories\Model;

class ModelRepository implements ModelInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function createTemplate(string $className, ?string $namespace = null): string
    {
        return $this->model->template($className, $namespace);
    }
}