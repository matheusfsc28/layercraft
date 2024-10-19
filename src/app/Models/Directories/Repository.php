<?php

namespace Matheusfsc28\LayerCraft\App\Models\Directories;

class Repository
{
    public function template(string $className, ?string $namespace = null): string
    {
        $namespaceDeclaration = $namespace ? "namespace App\\Repositories\\$namespace;" : "namespace App\\Repositories;";
        $useModelDeclaration = $namespace ? "use App\\Models\\$namespace\\{$className};" : "use App\\Models\\{$className};";
        $useInterfaceDeclaration = $namespace ? "use App\\Interfaces\\$namespace\\{$className}Interface;" : "use App\\Interfaces\\{$className}Interface;";
        return <<<EOD
<?php

$namespaceDeclaration

$useModelDeclaration
$useInterfaceDeclaration

class {$className}Repository implements {$className}Interface
{
    
    protected {$className} \$model;

    public function __construct({$className} \$model)
    {
        \$this->model = \$model;
    }

    // Implement interface methods here
}
EOD;
    }
}
