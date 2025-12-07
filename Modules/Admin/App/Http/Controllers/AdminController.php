<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Admin\App\Models\Admin;
use Modules\Peta\App\Models\Peta;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends Controller
{
   

    public function view(){
        // $petugas = Admin::getPetugas();
        // $jumlah_titik = Peta::countLokasi();
        // $banyak_sampah = Admin::countSampah();
        return view('admin::admin.view');
    }

    public function shows()
    {
        // $notifikasi = Admin::getNotifikasiData();
        return view('admin::layouts.main');
    }

   
}
