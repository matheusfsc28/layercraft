<?php

namespace Matheusfsc28\LayerCraft\App\Interfaces\Directories;

interface ServiceInterface
{
    public function createTemplate(string $className, ?string $namespace = null): string;
}