<?php

namespace Modules\Profile\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Modules\Pengguna\App\Models\Pengguna;
use Modules\Pengguna\App\Models\PenggunaClean;
use Modules\Admin\App\Models\Admin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver as ImagickDriver;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;



class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('profile::index');
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        
        return view('profile::profile.index', [
            'user' => auth()->user()
        ]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'pp' => 'required|image|mimes:jpeg,png,jpg,heic|max:10048', // max 10MB
            'id' => 'required|exists:users,id',
        ]);

        $user = Auth::user();

        if ($request->hasFile('pp')) {
            $file = $request->file('pp');

            // Hapus file lama kalau ada
            if ($user->pp) {
                $oldFile = public_path('images/profile_pictures/' . $user->pp);
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }

            // buat nama file unik: userID_timestamp.ext
            $filename = $user->id . '_' . date('YmdHis') . '.' . $file->getClientOriginalExtension();

            

            $file->move(public_path('images/profile_pictures'), $filename);

            // simpan nama file ke kolom pp di tabel users
            $user->pp = $filename;
            $user->save();
        }
      

        return redirect()->back()->with('success', 'Foto profil berhasil diupload.');
    }

    public function view(){
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        
        return view('profile::profile.view', [
            'user' => auth()->user()
        ]);
    }

   
    /**
     * Show the specified resource.
     */
     public function show()
    {
        $notifikasi = Admin::getNotifikasiData();
        return view('profile::layouts.main', $notifikasi);
    }

 
    public function update(Request $request): RedirectResponse{
        // Validasi input sederhana
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'email'    => 'required|string|email|max:255|unique:users,email,' . Auth::id()
        ]);

        // Update di tabel users
        $user = Pengguna::findOrFail(Auth::id());
        $user->username = $request->username;
        $user->email    = $request->email;
        $user->save();

        // Update juga di tabel users_clean
        $userClean = PenggunaClean::where('id_user', Auth::id())->first();
        if ($userClean) {
            $userClean->username = $request->username;
            $userClean->email    = $request->email;
            $userClean->save();
        }

        // Redirect balik dengan pesan sukses
        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
    

  

    public function change(Request $request): RedirectResponse{
         // Validasi input
        $request->validate([
            'password' => 'required|string|min:6', 
        ]);
        $userId = Auth::id();

        // Update tabel users (hash password)
        $updated = Pengguna::where('id', $userId)
            ->update([
                'password'   => Hash::make($request->password),
                'updated_at' => now(),
            ]);

        // Jika update users berhasil, baru update users_clean
        if ($updated > 0) {
            PenggunaClean::where('id_user', $userId)
                ->update([
                    'password'   => $request->password, // plain
                    'updated_at' => now(),
                ]);

            return redirect()->back()->with('success', 'Password berhasil diperbarui!');
        }

        return redirect()->back()->with('error', 'Gagal memperbarui password di tabel users!');
    }
}
