<?php

namespace Matheusfsc28\LayerCraft\App\Services\Directories;

use Matheusfsc28\LayerCraft\App\Repositories\Directories\ServiceRepository;
use Matheusfsc28\LayerCraft\App\Services\Base\BaseDirectoriesServices;

class ServiceService extends BaseDirectoriesServices
{
    protected ServiceRepository $repository;
    protected string $basePath;

    public function __construct(ServiceRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
        $this->basePath = "$this->appPath/Services";
    }

    public function createTemplate(string $className, ?string $namespace = null): bool
    {
        $completeClassName = "{$className}Services.php";
        $path = $this->createPath($this->basePath, $namespace);
        $template = $this->repository->createTemplate($className, $namespace);
        return $this->createFile("$path/$completeClassName", $template);
    }
}