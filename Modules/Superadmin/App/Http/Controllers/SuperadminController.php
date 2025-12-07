<?php

namespace Modules\Superadmin\App\Http\Controllers;

use Modules\Superadmin\App\Models\Role;
use Modules\Superadmin\App\Models\Superadmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\ModuleScannerService;



class SuperadminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $scanner;
    public function __construct(ModuleScannerService $scanner)
    {
        $this->scanner = $scanner;
    }

    public function index()
    {
        $roles = Superadmin::all();
        return view('superadmin::superadmin.index', compact('roles'));
    }

    public function view(){
        
        return view('superadmin::superadmin.view'); 
    }

    public function role(Request $request){
        $modules = $this->scanner->scanModules(); 
        $id = $request->id;
        $role = Superadmin::getRole($id); 
        return view('superadmin::superadmin.role', compact('modules','id','role'));
    }

    public function store(Request $request): RedirectResponse{
        $roleId = $request->input('id.0'); 
        $permissions = $request->input('permissions', []); 

        if (!$roleId) {
            return redirect()->back()->with('error', 'Role ID tidak ditemukan');
        }

        $role = Superadmin::getRole($roleId);

        if (!$role) {
            return redirect()->back()->with('error', 'Role tidak ditemukan');
        }

        $role->permissions = json_encode($permissions);
        $role->save();

        return redirect()->back()->with('success', 'Permissions berhasil di-update.');
    }

}
