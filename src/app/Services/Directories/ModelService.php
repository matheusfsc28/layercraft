<?php

namespace Matheusfsc28\LayerCraft\App\Services\Directories;

use Matheusfsc28\LayerCraft\App\Repositories\Directories\ModelRepository;
use Matheusfsc28\LayerCraft\App\Services\Base\BaseDirectoriesServices;

class ModelService extends BaseDirectoriesServices
{
    protected ModelRepository $repository;
    protected string $basePath;

    public function __construct(ModelRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
        $this->basePath = "$this->appPath/Models";
    }

    public function createTemplate(string $className, ?string $namespace = null): bool
    {
        $completeClassName = "{$className}.php";
        $path = $this->createPath($this->basePath, $namespace);
        $template = $this->repository->createTemplate($className, $namespace);
        return $this->createFile("$path/$completeClassName", $template);
    }
}
