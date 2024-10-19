<?php

namespace Matheusfsc28\LayerCraft\App\Services\Base;

use Illuminate\Support\Facades\File;
use function app_path;

class BaseDirectoriesServices
{
    public string $appPath;

    public function __construct()
    {
        $this->appPath = app_path();
    }

    public function createPath(string $basePath, ?string $namespace = null): string
    {
        $fullPath = $namespace ? "$basePath/$namespace" : $basePath;

        if (!File::isDirectory($fullPath)) {
            File::makeDirectory($fullPath, 0755, true);
            colorDump("Directory created: $fullPath");
        }

        return $fullPath;
    }

    public function createFile(string $path, string $content): bool
    {
        if (File::exists($path)) {
            colorDump("File already exists: $path", 'yellow');
            return false;
        }

        File::put($path, $content);
        colorDump("File created: $path");
        return true;
    }
}
