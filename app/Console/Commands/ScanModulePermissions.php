<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Nwidart\Modules\Facades\Module;

class ScanModulePermissions extends Command
{
    protected $signature = 'permission:scan-modules';
    protected $description = 'Scan all module controllers and register permissions';

    // Daftar controller yang akan di-exclude
    protected $excludedControllers = [
        'ConfirmPasswordController',
        'ForgotPasswordController',
        'LoginController',
        'RegisterController',
        'ResetPasswordController',
        'VerificationController'
    ];

    public function handle()
    {
        $modules = Module::all();

        foreach ($modules as $module) {
            $this->processModule($module);
        }

        $this->info('Module permissions scanned successfully!');
    }

    protected function processModule($module)
    {
        $moduleName = $module->getName();
          // Skip scanning for Auth module jika ingin mengecualikan seluruh module
          if ($moduleName === 'Auth') {
            $this->info("Skipping Auth module...");
            return;
        }
        $controllersPath = $module->getPath().'/Http/Controllers';

        if (File::exists($controllersPath)) {
            $controllers = File::allFiles($controllersPath);

            foreach ($controllers as $controller) {
                $this->processController($moduleName, $controller);
            }
        }
    }

    protected function processController($moduleName, $controllerFile)
    {
        $controllerName = $controllerFile->getFilenameWithoutExtension();
        // Cek apakah controller termasuk dalam excluded list
        if (in_array($controllerName, $this->excludedControllers)) {
            $this->info("Skipping excluded controller: {$controllerName}");
            return;
        }

        $className = "Modules\\{$moduleName}\\Http\\Controllers\\{$controllerName}";
        
        try {
            $reflection = new \ReflectionClass($className);
            
            foreach ($reflection->getMethods() as $method) {
                if ($method->isPublic() && !str_starts_with($method->name, '_')) {
                    $this->registerPermission(
                        module: $moduleName,
                        controller: str_replace('Controller', '', $controllerName),
                        method: $method->name
                    );
                }
            }
        } catch (\ReflectionException $e) {
            $this->error("Error processing {$className}: ".$e->getMessage());
        }
    }

    // Method untuk menentukan apakah suatu method harus diregister
    protected function shouldRegisterMethod($method)
    {
        return $method->isPublic() && 
               !str_starts_with($method->name, '_') &&
               $method->class === $method->getDeclaringClass()->name;
    }

    protected function registerPermission($module, $controller, $method)
{
    $permissionName = strtolower("{$module}.{$controller}.{$method}");
    $displayName = ucfirst($module) . ' - ' . ucfirst($controller) . ' - ' . $method;
    $routePath = strtolower("{$module}/{$controller}/{$method}");

    \App\Models\Permission::updateOrCreate(
        ['name' => $permissionName],
        [
            'module_name' => $module,
            'controller_name' => $controller,
            'method_name' => $method,
            'display_name' => $displayName,
            'route' => $routePath,
            'guard_name' => 'web'
        ]
    );

    $this->info("Registered: {$permissionName}");
}
}
