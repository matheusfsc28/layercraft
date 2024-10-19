<?php

namespace Matheusfsc28\LayerCraft\App\Models\Directories;

class Model
{
    public function template(string $className, ?string $namespace = null): string
    {
        $namespaceDeclaration = $namespace ? "namespace App\\Models\\$namespace;" : "namespace App\\Models;";
        return <<<EOD
<?php

$namespaceDeclaration

use Illuminate\Database\Eloquent\Model;

class {$className} extends Model
{
    // Define the model here
}
EOD;
    }
}
