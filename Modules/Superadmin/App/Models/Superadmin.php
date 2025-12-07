<?php

namespace Modules\Superadmin\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class Superadmin extends Model{
    use HasFactory;

    protected $table = 'role';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_role', 'permissions'];
    
    // public $timestamps = false;

    public static function getRole($id){
        // return DB::table('role')->where('id', $id)->first();
        return self::find($id); 
    }



}