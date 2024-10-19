<?php

namespace Matheusfsc28\LayerCraft\App\Services\Directories;

use Matheusfsc28\LayerCraft\App\Repositories\Directories\RepositoryRepository;
use Matheusfsc28\LayerCraft\App\Services\Base\BaseDirectoriesServices;

class RepositoryService extends BaseDirectoriesServices
{
    protected RepositoryRepository $repository;
    protected string $basePath;

    public function __construct(RepositoryRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
        $this->basePath = "$this->appPath/Repositories";
    }

    public function createTemplate(string $className, ?string $namespace = null): bool
    {
        $completeClassName = "{$className}Repository.php";
        $path = $this->createPath($this->basePath, $namespace);
        $template = $this->repository->createTemplate($className, $namespace);
        return $this->createFile("$path/$completeClassName", $template);
    }
}