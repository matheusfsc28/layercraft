<?php

namespace Matheusfsc28\LayerCraft\App\Models\Directories;

class Service
{
    public function template(string $className, ?string $namespace = null): string
    {
        $subClassName = lcfirst($className);
        $namespaceDeclaration = $namespace ? "namespace App\\Services\\$namespace;" : "namespace App\\Services;";
        return <<<EOD
<?php

$namespaceDeclaration

use App\\Repositories\\$namespace\\{$className}Repository;

class {$className}Service
{
    protected {$className}Repository \$repository;

    public function __construct({$className}Repository \$repository)
    {
        \$this->repository = \$repository;
    }
}
EOD;
    }
}
