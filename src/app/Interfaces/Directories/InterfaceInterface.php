<?php

namespace Matheusfsc28\LayerCraft\App\Interfaces\Directories;

interface InterfaceInterface
{
    public function createTemplate(string $className, ?string $namespace = null): string;
}