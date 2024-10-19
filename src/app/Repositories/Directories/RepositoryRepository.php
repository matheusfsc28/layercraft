<?php

namespace Matheusfsc28\LayerCraft\App\Repositories\Directories;

use Matheusfsc28\LayerCraft\App\Interfaces\Directories\RepositoryInterface;
use Matheusfsc28\LayerCraft\App\Models\Directories\Repository;

class RepositoryRepository implements RepositoryInterface
{
    protected Repository $model;

    public function __construct(Repository $model)
    {
        $this->model = $model;
    }

    public function createTemplate(string $className, ?string $namespace = null): string
    {
        return $this->model->template($className, $namespace);
    }
}