<?php

namespace Matheusfsc28\LayerCraft\App\Services\Directories;

use Matheusfsc28\LayerCraft\App\Repositories\Directories\InterfaceRepository;
use Matheusfsc28\LayerCraft\App\Services\Base\BaseDirectoriesServices;
use Illuminate\Support\Facades\File;

class InterfaceService extends BaseDirectoriesServices
{
    protected InterfaceRepository $repository;
    protected string $basePath;

    public function __construct(InterfaceRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
        $this->basePath = "$this->appPath/Interfaces";
    }

    public function createTemplate(string $className, ?string $namespace = null): bool
    {
        $completeClassName = "{$className}Interface.php";
        $path = $this->createPath($this->basePath, $namespace);
        $template = $this->repository->createTemplate($className, $namespace);
        $this->createFile("$path/$completeClassName", $template);
        return $this->updateAppServiceProvider($className, $namespace);
    }

    private function updateAppServiceProvider(string $className, ?string $namespace = null): bool
    {
        $providerFile = "$this->appPath/Providers/AppServiceProvider.php";

        try {
            $providerContent = File::get($providerFile);
        } catch (\Exception $e) {
            colorDump("Could not found the app provider", 'yellow');
            return false;
        }

        $usesStatement = $this->setUsesStatement($providerContent, $className, $namespace);

        $updatedContent = $this->insertUsesInProvider($providerContent, $usesStatement);
        $updatedContent = $this->addBindToRegister($updatedContent, $usesStatement['interfaceName'], $usesStatement['repositoryName']);

        return File::put($providerFile, $updatedContent);
    }

    private function setUsesStatement(string $providerContent, string $className, ?string $namespace = null): array
    {
        $pathInterface = $namespace ? "use App\Interfaces\\$namespace\\" : "use App\Interfaces\\";
        $pathRepository = $namespace ? "use App\Repositories\\$namespace\\" : "use App\Repositories\\";

        preg_match_all('/^use\s+(.+?);$/m', $providerContent, $matches);

        foreach ($matches[1] as $useStatement) {
            $classParts = explode('\\', $useStatement);
            $classNameInUse = end($classParts);

            if (!empty($classNameInUse) && in_array($classNameInUse, ["{$className}Interface", "{$className}Repository"])) {
                $interfaceName = $namespace . $className . "Interface";
                $repositoryName = $namespace . $className . "Repository";

                return [
                    'useInterface'   => "$pathInterface{$className}Interface as $interfaceName;",
                    'useRepository'  => "$pathRepository{$className}Repository as $repositoryName;",
                    'interfaceName'  => $interfaceName,
                    'repositoryName' => $repositoryName,
                ];
            }
        }

        $interfaceName = $className . "Interface";
        $repositoryName = $className . "Repository";

        return [
            'useInterface'   => "$pathInterface$interfaceName;",
            'useRepository'  => "$pathRepository$repositoryName;",
            'interfaceName'  => $interfaceName,
            'repositoryName' => $repositoryName
        ];
    }

    private function insertUsesInProvider(string $providerContent, array $usesStatement): string
    {
        preg_match_all('/^use\s.+;$/m', $providerContent, $matches);

        if (!empty($matches[0])) {
            $lastUseStatement = end($matches[0]);
            $position = strpos($providerContent, $lastUseStatement) + strlen($lastUseStatement);
        } else {
            $position = strpos($providerContent, 'namespace') + strlen('namespace') + 1;
        }

        $postUseContent = substr($providerContent, $position);

        $newContent = substr($providerContent, 0, $position)
            . "\n" . trim($usesStatement['useInterface']) . "\n"
            . trim($usesStatement['useRepository']) . "\n"
            . $postUseContent;

        return $newContent;
    }

    private function addBindToRegister(string $providerContent, string $interfaceClass, string $repositoryClass): string
    {
        $pattern = '/public\s+function\s+register\(\)\s*(?::\s*\w+)?\s*\{/';

        if (preg_match($pattern, $providerContent, $matches, PREG_OFFSET_CAPTURE)) {
            $position = $matches[0][1] + strlen($matches[0][0]);

            if (strpos($providerContent, "\$this->app->bind($interfaceClass::class") === false) {
                $bindStatement = "\n\t\t\$this->app->bind($interfaceClass::class, $repositoryClass::class);";

                if (strpos($providerContent, $bindStatement) === false) {
                    $newContent = substr($providerContent, 0, $position)
                        . $bindStatement
                        . substr($providerContent, $position);

                    return $newContent;
                }
            }
        }

        return $providerContent;
    }
}
