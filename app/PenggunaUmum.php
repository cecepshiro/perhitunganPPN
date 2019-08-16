<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class PenggunaUmum extends Model
{
    protected $table='data_pengguna';
    protected $primaryKey='id_pengguna';
    public $incrementing =false;
    public $timestamps=true; 
    protected $fillable = [
      'id_pengguna','user_id','nama_pengguna','tempat_lahir','tanggal_lahir','jenis_kelamin','no_telp','alamat','email','foto','created_at','updated_at',
    ];

    //mencari data pengaju by email
    public static function getDataPengaju($email){
      return $data = DB::table('users')
       ->join('data_pengaju', 'users.email','=','data_pengaju.email')
       ->select('data_pengaju.nama_usaha','data_pengaju.email','data_pengaju.nama_pengaju')
       ->where('users.email', $email)
       ->first();
    }

    //mencari data pengguna by email
    public static function getDataPengguna($email){
      return $data = DB::table('users')
       ->join('data_pengguna', 'users.email','=','data_pengguna.email')
       ->select('data_pengguna.*')
       ->where('users.email', $email)
       ->first();
    }

    //mencari data pengaju by id
    public static function getDataPengajuByID($id){
      return $data = DB::table('users')
       ->join('data_pengaju', 'users.email','=','data_pengaju.email')
       ->select('data_pengaju.nama_usaha','data_pengaju.email','data_pengaju.nama_pengaju')
       ->where('users.id', $id)
       ->first();
    }

    //mencari data pengguna dari data usaha dan data pengguna 
    public static function getDetailPengguna($id){
      return $data = DB::table('data_pengguna')
       ->join('data_usaha', 'data_pengguna.user_id','=','data_usaha.user_id')
       ->select('data_usaha.*','data_pengguna.*')
       ->where('data_usaha.id_usaha', $id)
       ->first();
    }
}
