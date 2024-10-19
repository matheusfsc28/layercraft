<?php

namespace Matheusfsc28\LayerCraft\App\Interfaces\Directories;

interface RepositoryInterface
{
    public function createTemplate(string $className, ?string $namespace = null): string;
}