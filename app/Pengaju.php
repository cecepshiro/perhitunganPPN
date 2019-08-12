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
      // 'nama_pengaju','email','path_dokumen','status','created_at','updated_at',
      'id_pengaju','nama_pengaju','no_npwp','email','nama_usaha','created_at','updated_at',
    ];

    //mengambil data pengajuan yang pending
    public static function getPengajuanPending(){
      return $data = DB::table('data_pengaju')
       ->join('data_detail_pengaju','data_pengaju.id_pengaju','=','data_detail_pengaju.id_pengaju')
       ->select('*')
       ->where('data_detail_pengaju.status', 'pending')
       ->get();
    }

    //mengambil data pengajuan yang revisi
    public static function getPengajuanRevisi(){
      return $data = DB::table('data_pengaju')
       ->join('data_detail_pengaju','data_pengaju.id_pengaju','=','data_detail_pengaju.id_pengaju')
       ->select('*')
       ->where('data_detail_pengaju.status', 'revisi')
       ->get();
    }

    //mengambil data pengajuan yang accept
    public static function getPengajuanAccept(){
      return $data = DB::table('data_pengaju')
       ->join('data_detail_pengaju','data_pengaju.id_pengaju','=','data_detail_pengaju.id_pengaju')
       ->select('*')
       ->where('data_detail_pengaju.status', 'accept')
       ->get();
    }

    //mengambil data pengajuan yang telah revisi
    public static function getPengajuanTelahRevisi(){
      return $data = DB::table('data_pengaju')
       ->join('data_detail_pengaju','data_pengaju.id_pengaju','=','data_detail_pengaju.id_pengaju')
       ->select('*')
       ->where('data_detail_pengaju.status', 'revisi dikonfirmasi')
       ->get();
    }

    //tracking data pengaju
    public static function getDetailTracking($email){
      return $data = DB::table('data_pengaju')
       ->join('data_detail_pengaju','data_pengaju.id_pengaju','=','data_detail_pengaju.id_pengaju')
       ->select('data_pengaju.*','data_detail_pengaju.*')
       ->where('data_pengaju.email', $email)
       ->get();
    }

     //mengambil data pengajuan yang accept
     public static function getDetailData($id){
      return $data = DB::table('data_pengaju')
       ->join('data_detail_pengaju','data_pengaju.id_pengaju','=','data_detail_pengaju.id_pengaju')
       ->select('data_detail_pengaju.*','data_pengaju.*')
       ->where('data_detail_pengaju.id_detail_pengaju', $id)
       ->first();
    }

    // //mengambil data email dari table pengaju & detail pengaju
    // public static function getDataEmailPengaju($id){
    //   return $data = DB::table('data_detail_pengaju')
    //    ->join('data_pengaju', 'data_detail_pengaju.id_pengaju','=','data_pengaju.id_pengaju')
    //    ->select('data_pengaju.*','data_detail_pengaju.*')
    //    ->where('data_pengaju.id_pengaju', $id)
    //    ->first();
    // }

    //mengambil data email dari table pengaju & detail pengaju
    public static function getDataEmailPengaju($id){
      return $data = DB::table('data_detail_pengaju')
       ->join('data_pengaju', 'data_detail_pengaju.id_pengaju','=','data_pengaju.id_pengaju')
       ->select('data_pengaju.*','data_detail_pengaju.*')
       ->where('data_detail_pengaju.id_detail_pengaju', $id)
       ->first();
    }

    //mengambil data pengaju & detail pengaju
    public static function joinDetailPengaju($id){
      return $data = DB::table('data_pengaju')
       ->join('data_detail_pengaju', 'data_pengaju.id_pengaju','=','data_detail_pengaju.id_pengaju')
       ->select('data_pengaju.*','data_detail_pengaju.*')
       ->where('data_detail_pengaju.id_detail_pengaju', $id)
       ->first();
    }
}
