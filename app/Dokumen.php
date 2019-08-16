<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Dokumen extends Model
{
    protected $table='data_dokumen';
    protected $primaryKey='id_dokumen';
    public $incrementing =false;
    public $timestamps=true; 
    protected $fillable = [
      'id_dokumen','user_id','id_usaha','created_at','updated_at',
    ];

    // //menggabungkan data dari data dokumen dan detail dokumen tiap user
    // public static function getDetailDokumen($id){
    //   return $data = DB::table('data_dokumen')
    //    ->join('data_detail_dokumen', 'data_dokumen.id_dokumen','=','data_detail_dokumen.id_dokumen')
    //    ->select('data_dokumen.*','data_detail_dokumen.*')
    //    ->where('data_dokumen.user_id', $id)
    //    ->where('data_detail_dokumen.status', 'pending')
    //    ->orWhere('data_detail_dokumen.status', 'revisi')
    //    ->orWhere('data_detail_dokumen.status', 'accept')
    //    ->orWhere('data_detail_dokumen.status', 'revisi dikonfirmasi')
    //   //  ->orderBy('data_detail_dokumen.created_at','desc')
    //   //  ->limit(1)
    //    ->get();
    // }

    // // menggabungkan data dari data dokumen dan detail dokumen tiap user
    // public static function getDetailDokumen($id){
    //   return $data = DB::table('data_dokumen')
    //    ->join('data_pengguna', 'data_dokumen.user_id','=','data_pengguna.user_id')
    //    ->join('data_detail_dokumen', 'data_dokumen.id_dokumen','=','data_detail_dokumen.id_dokumen')
    //    ->select('data_dokumen.*', 'data_detail_dokumen.*')
    //    ->where('data_dokumen.user_id', $id)
    //    ->whereIn('data_detail_dokumen.status', [\DB::raw("(SELECT status FROM data_detail_dokumen WHERE data_detail_dokumen.status = 'pending' OR data_detail_dokumen.status = 'accept' OR data_detail_dokumen.status = 'revisi' OR  data_detail_dokumen.status = 'revisi dikonfirmasi')")])
    //    ->get();
    // }

    public static function getDetailUsaha($id){
      return $data = DB::table('data_dokumen')
       ->join('data_pengguna', 'data_dokumen.user_id','=','data_pengguna.user_id')
       ->join('data_detail_dokumen', 'data_dokumen.id_dokumen','=','data_detail_dokumen.id_dokumen')
       ->join('data_usaha', 'data_dokumen.id_usaha','=','data_usaha.id_usaha')
       ->select('data_dokumen.*', 'data_detail_dokumen.*','data_usaha.*')
       ->where('data_dokumen.id_usaha', $id)
       ->whereIn('data_detail_dokumen.status', [\DB::raw("(SELECT status FROM data_detail_dokumen WHERE data_detail_dokumen.status = 'pending' OR data_detail_dokumen.status = 'accept' OR data_detail_dokumen.status = 'revisi' OR  data_detail_dokumen.status = 'revisi dikonfirmasi')")])
       ->get();
    }
}
