<?php

namespace App\Services;

use Nwidart\Modules\Facades\Module;
use Illuminate\Support\Str;
 
class ModuleScannerService
{
    

public function scanModules()
{
    $modules = Module::all();
    $result = [];

    foreach ($modules as $module) {
        $moduleName = $module->getName();
        
        // Cek di 2 lokasi berbeda
        $paths = [
            $module->getPath().'/Http/Controllers',
            $module->getPath().'/App/Http/Controllers'
        ];

        foreach ($paths as $path) {
            if (file_exists($path)) {
                $result[$moduleName] = $this->scanModuleControllers($path, $moduleName);
                break; // Stop setelah ketemu
            }
        }
    }

    return $result;
}

    protected function scanModuleControllers($path, $moduleName)
    {
        $controllers = [];
         // Handle nested Auth folder
        if ($moduleName === 'Auth' && file_exists($path.'/Auth')) {
            $path .= '/Auth';
        }
        
        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path)
        );

        foreach ($files as $file) {
            if ($file->isDir() || $file->getExtension() !== 'php') {
                continue;
            }

            $controllerName = $file->getBasename('.php');
            $methods = $this->getControllerMethods($file->getPathname());
            
            if (!empty($methods)) {
                $controllers[$controllerName] = $this->formatMethods($methods, $moduleName, $controllerName);
            }
        }

        return $controllers;
    }

    protected function getControllerMethods($filePath)
    {
        $content = file_get_contents($filePath);
        preg_match_all('/public function (\w+)\(/', $content, $matches);
        
        return array_filter($matches[1], function($method) {
            return !Str::startsWith($method, '_') && 
                   !in_array($method, ['__construct', 'middleware']);
        });
    }

    protected function formatMethods($methods, $moduleName, $controllerName)
    {
        return array_map(function($method) use ($moduleName, $controllerName) {
            return [
                'method' => $method,
                'route' => strtolower("$moduleName/".Str::kebab(str_replace('Controller', '', $controllerName))."/".Str::kebab($method))
            ];
        }, $methods);
    }
}