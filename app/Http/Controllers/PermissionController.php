<?php
// app/Http/Controllers/PermissionController.php

namespace App\Http\Controllers;

use App\Services\ModuleScannerService;

class PermissionController extends Controller
{
    public function index(ModuleScannerService $scanner)
    {
        $modules = $scanner->scanModules();
        return view('permissions.index', compact('modules'));
    }
}

