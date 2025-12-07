<?php

namespace Modules\Pengguna\App\Http\Controllers;
use Modules\Pengguna\App\Models\Pengguna;
use Modules\Pengguna\App\Models\PenggunaClean;
use Modules\Admin\App\Models\Admin;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $list_pengguna = Pengguna::all();
        // return view('pengguna::pengguna.index', compact('list_pengguna'));
        $sadm = Pengguna::where('role', 'Superadmin')->get();
        $cmu = Pengguna::where('role', 'Common User')->get();
        return view('pengguna::pengguna.index', compact('sadm', 'cmu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $role = $request->query('rl'); 
        return view('pengguna::pengguna.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse{
            // dd($request->all());

         // Validasi data array, minimal validasi satu elemen supaya tidak error
        $request->validate([
            'name.*'        => 'required|string|max:255',
            'username.*'    => 'required|string|max:255',
            'gender.*'      => 'required|string|max:11',
            'email.*'       => 'required|string|max:255',
            'password.*'    => 'required|string|max:255',
            'role.*'          => 'nullable|string|max:50',
        ]);

        $data = [];
        $dataClean = [];

        // Loop sesuai jumlah data yang dikirim, bisa pakai salah satu array sebagai patokan
        $count = count($request->input('name'));

        for ($i = 0; $i < $count; $i++) {
            $data[] = [
                'name' => $request->input('name')[$i],
                'username' => $request->input('username')[$i],
                'gender' => $request->input('gender')[$i],
                'email'       => $request->input('email')[$i] ?? null,
                'password' => Hash::make($request->input('password')[$i] ?? ''),
                'role'         => $request->input('role')[$i] ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $userId = DB::table('users')->insertGetId($data[$i]);

            $dataClean[] = [
                'id_user'    => $userId,
                'username'   => $request->input('username')[$i],
                'email'      => $request->input('email')[$i] ?? null,
                'password'   => $request->input('password')[$i] ?? '',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert batch
        // Pengguna::insertBatch($data);
        // PenggunaClean::insertBatch($dataClean);
        DB::table('users_clean')->insert($dataClean);



        return redirect()->back()->with('success', 'Data pengguna berhasil disimpan!');
        

    }

    /**
     * Show the specified resource.
     */
    public function show()
    {
        $notifikasi = Admin::getNotifikasiData();
        return view('pengguna::layouts.main', $notifikasi);
    }


   
}
