<?php

namespace Matheusfsc28\LayerCraft\App\Services\Directories;

use Matheusfsc28\LayerCraft\App\Repositories\Directories\ControllerRepository;
use Matheusfsc28\LayerCraft\App\Services\Base\BaseDirectoriesServices;


class ControllerService extends BaseDirectoriesServices
{
    protected ControllerRepository $repository;
    protected string $basePath;

    public function __construct(ControllerRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
        $this->basePath = "$this->appPath/Http/Controllers";
    }

    public function createTemplate(string $className, ?string $namespace = null): bool
    {
        $completeClassName = "{$className}Controller.php";
        $path = $this->createPath($this->basePath, $namespace);
        $template = $this->repository->createTemplate($className, $namespace);
        return $this->createFile("$path/$completeClassName", $template);
    }
}
