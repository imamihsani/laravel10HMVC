<?php 
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckAccess
{
    public function handle(Request $request, Closure $next)
    {
        // $allowedForGuests = ['login', 'home']; // Tambahkan 'home' di sini

        // if (auth()->check()) {
        //     // Blok akses /login jika sudah login
        //     if ($request->is('login')) {
        //         return redirect()->route('profile');
        //     }
        // } else {
        //     // Blok semua route kecuali /login dan /home
        //     if (!$request->is($allowedForGuests)) {
        //         return redirect()->route('login');
        //     }
        // }

        // return $next($request);

        // ******** everyone can access home, login or not
        if ($request->is('home')) {  // ********
            return $next($request);  // ********
        }


        $allowedForGuests = ['login', 'home', 'home/*']; //yg boleh diakses unutk publik

        $alwaysAllowed = ['login', 'logout']; //yg selalu dibolehin
        if ($request->is($alwaysAllowed)) {  
            return $next($request);          
        }

        // --------------------------
        // 1. Jika user TIDAK login
        // --------------------------
        if (!auth()->check()) {
            if ($request->is('logout')) {      
                return redirect()->route('login'); 
            }
            if (!$request->is($allowedForGuests)) {
                return redirect()->route('login');
            }
            return $next($request);
        }

        // --------------------------
        // 2. Jika user SUDAH login
        // --------------------------
        if ($request->is('login')) {
            return redirect()->route('profile');
        }
        

        // --------------------------
        // 3. CEK PERMISSION ROLE
        // --------------------------
        $user = auth()->user();

        $role = DB::table('role')
            ->where('nama_role', $user->role)
            ->first();

        // Jika role tidak ditemukan
        if (!$role) {
            abort(403, 'Role not found');
        }

        // Decode JSON permissions
        $permissions = json_decode($role->permissions ?? '[]', true);

        // Ambil URL saat ini
        $current = trim($request->path(), '/'); 
        // contoh -> admin/admin/view

        // Normalisasi: jika hanya module/controller -> itu index
        $segment = explode('/', $current);
        if (count($segment) === 2) {
            $current = "{$segment[0]}/{$segment[1]}";
        }

        // Jika URL TIDAK ADA dalam permissions → blokir
        if (!in_array($current, $permissions)) {
            abort(404);
        }

        return $next($request);
    }
}