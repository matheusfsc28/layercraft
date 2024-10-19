<?php

namespace Matheusfsc28\LayerCraft\App\Models\Directories;

class InterfaceModel
{
    public function template(string $className, ?string $namespace = null): string
    {
        $namespaceDeclaration = $namespace ? "namespace App\\Interfaces\\$namespace;" : "namespace App\\Interfaces;";
        return <<<EOD
<?php

$namespaceDeclaration

interface {$className}Interface
{
    // Define interface methods here
}
EOD;
    }
}
