<?php

namespace Modules\Admin\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Admin extends Model{
    use HasFactory;

    // protected $table = 'task';
    // public $timestamps = false; 

    // public static function inserttugas(array $data){
    //     return DB::table('task')->insert($data);
    // }

    // public static function getPetugas(){
    //     return DB::table('users')->where('role', 'Petugas')->select('id','name')->get();
    // }

//     public static function getRiwayatTugas($dari = null, $sampai = null){
//         $query =  DB::table('task')->select('*')->orderBy('tgl_task','DESC');
//         if (!empty($dari) && !empty($sampai)) {
//             $query->whereBetween('tgl_task', [$dari, $sampai]);
//         }
//         $tasks = $query->get();
//         foreach ($tasks as $task) {
//             $task->nama_petugas = 'Petugas belum ditentukan';
//             if (!empty($task->petugas)) {
//                 $ids = explode(',', $task->petugas);
//                 $namaPetugas = DB::table('users')->whereIn('id', $ids)->pluck('name')->toArray();
//                 $task->nama_petugas = implode(', ', $namaPetugas);
//             }
//         }
//         return $tasks;
//     }

//     public static function countSampah(){
//         return DB::table('task')
//         ->whereDate('tgl_task', date('Y-m-d'))
//         ->sum('berat_sampah');
//     }

//    //
//     public static function getNotifikasiData(){
//         $user = Auth::user();

//         $query = DB::table('task')
//             ->where(function ($q) {
//                 $q->whereNull('rute')
//                 ->orWhere('rute', '')
//                 ->orWhereNull('berat_sampah')
//                 ->orWhere('berat_sampah', '');
//             });

//         if (!in_array($user->role, ['Admin', 'Superadmin'])) {
//             $query->whereRaw("FIND_IN_SET(?, CAST(petugas AS CHAR))", [$user->id]);
//         }

//         $jumlah_tugas_belum_selesai = $query->count();

//         // Ambil data belum selesai (rute atau berat_sampah masih kosong)
//         $unfinished = DB::table('task')
//             ->where(function ($q) {
//                 $q->whereNull('rute')
//                 ->orWhere('rute', '')
//                 ->orWhereNull('berat_sampah')
//                 ->orWhere('berat_sampah', '');
//             });

//             if (!in_array($user->role, ['Admin', 'Superadmin'])) {
//             $unfinished->whereRaw("FIND_IN_SET(?, CAST(petugas AS CHAR))", [$user->id]);
//         }

//         // Ambil tanggal paling awal dan paling akhir
//         $dari = $unfinished->min('tgl_task');
//         $sampai = $unfinished->max('tgl_task');

//         // Format jadi Y-m-d
//         $dari = $dari ? Carbon::parse($dari)->format('Y-m-d') : null;
//         $sampai = $sampai ? Carbon::parse($sampai)->format('Y-m-d') : $dari;

//         // Buat URL berdasarkan role user
//         $url = in_array($user->role, ['Admin', 'Superadmin'])
//             ? url("admin/admin/show?dari={$dari}&sampai={$sampai}")
//             : url("task/task?dari={$dari}&sampai={$sampai}");


//         return [
//             'jumlah_tugas_belum_selesai' => $jumlah_tugas_belum_selesai,
//             'dari' => $dari,
//             'url' => $url,
//         ];
//     }



}