<?php

namespace Modules\Pengguna\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['name','username','gender','email', 'email_verified_at', 'password', 'role', 'remember_token', 'created_at','updated_at'];
    
    public $timestamps = false;




    public static function insertBatch(array $data){
        return self::insert($data);
    }


}