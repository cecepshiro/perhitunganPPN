<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Petugas extends Model
{
    protected $table='data_petugas';
    protected $primaryKey='id_petugas';
    public $incrementing =false;
    public $timestamps=true; 
    protected $fillable = [
        'nama_petugas','user_id','tempat_lahir','tanggal_lahir','jenis_kelamin','no_telp','alamat','email','foto','created_at','updated_at',
    ];

    //mencari data bagian petugas
    public static function getBagianPetugas(){
        return $data = DB::table('data_petugas')
         ->join('users','data_petugas.user_id','=','users.id')
         ->select('data_petugas.*','users.level')
         ->get();
    }
}
