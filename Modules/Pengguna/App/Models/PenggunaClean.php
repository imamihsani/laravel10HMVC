<?php

namespace Modules\Pengguna\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggunaClean extends Model{
    use HasFactory;

    protected $table = 'users_clean';
    protected $primaryKey = 'id';
    protected $fillable = ['id_user','username','email','password','created_at','updated_at'];
    
    public $timestamps = false;




    public static function insertBatch(array $data){
        return self::insert($data);
    }


}