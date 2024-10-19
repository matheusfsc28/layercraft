<?php

namespace Matheusfsc28\LayerCraft\App\Models\Directories;

class Controller
{
    public function template(string $className, ?string $namespace = null): string
    {
        $subClassName = lcfirst($className);
        $namespaceDeclaration = $namespace ? "namespace App\\Http\\Controllers\\$namespace;" : "namespace App\\Http\\Controllers;";
        return <<<EOD
<?php

$namespaceDeclaration

use App\\Http\\Controllers\\Controller;
use App\\Services\\{$namespace}\\{$className}Service;
use Illuminate\\Http\\Request;

class {$className}Controller extends Controller
{
    protected {$className}Service \$service;

    public function __construct({$className}Service \$service)
    {
        \$this->service = \$service;
    }

    // Define controller methods here
}
EOD;
    }
}
