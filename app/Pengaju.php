<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Pengaju extends Model
{
    protected $table='data_pengaju';
    protected $primaryKey='id_pengaju';
    public $incrementing =false;
    public $timestamps=true; 
    protected $fillable = [
      'nama_pengaju','email','path_dokumen','status','created_at','updated_at',
    ];

    //mengambil data pengajuan yang pending
    public static function getPengajuanPending(){
      return $data = DB::table('data_pengaju')
       ->select('*')
       ->where('data_pengaju.status', 'pending')
       ->get();
    }

    //mengambil data pengajuan yang revisi
    public static function getPengajuanRevisi(){
      return $data = DB::table('data_pengaju')
       ->select('*')
       ->where('data_pengaju.status', 'revisi')
       ->get();
    }

    //mengambil data pengajuan yang accept
    public static function getPengajuanAccept(){
      return $data = DB::table('data_pengaju')
       ->select('*')
       ->where('data_pengaju.status', 'accept')
       ->get();
    }
}
