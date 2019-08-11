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
      'id_dokumen','user_id','created_at','updated_at',
    ];

    //menggabungkan data dari data dokumen dan detail dokumen tiap user
    public static function getDetailDokumen($id){
      return $data = DB::table('data_dokumen')
       ->join('data_detail_dokumen', 'data_dokumen.id_dokumen','=','data_detail_dokumen.id_dokumen')
       ->select('data_dokumen.*','data_detail_dokumen.*')
       ->where('data_dokumen.user_id', $id)
       ->where('data_detail_dokumen.status', 'pending')
       ->orWhere('data_detail_dokumen.status', 'revisi')
       ->orWhere('data_detail_dokumen.status', 'accept')
       ->orWhere('data_detail_dokumen.status', 'revisi dikonfirmasi')
      //  ->orderBy('data_detail_dokumen.created_at','desc')
      //  ->limit(1)
       ->get();
    }
}
