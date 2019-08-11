<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class DetailDokumen extends Model
{
    protected $table='data_detail_dokumen';
    protected $primaryKey='id_detail_dokumen';
    public $incrementing =false;
    public $timestamps=true; 
    protected $fillable = [
      'id_dokumen','nama_dokumen','dokumen','status','created_at','updated_at',
    ];


    //mengambil data user_id dari table dokumen & detail dokumen
    public static function getDataEmailDokumen($id){
      return $data = DB::table('data_detail_dokumen')
       ->join('data_dokumen', 'data_detail_dokumen.id_dokumen','=','data_dokumen.id_dokumen')
       ->select('data_dokumen.*','data_detail_dokumen.*')
       ->where('data_detail_dokumen.id_dokumen', $id)
       ->first();
    }

    //menghitung total data detail dokumen
    public static function getJumlahData($id){
      return $data = DB::table('data_dokumen')
       ->join('data_detail_dokumen', 'data_dokumen.id_dokumen','=','data_detail_dokumen.id_dokumen')
       ->select('data_dokumen.*','data_detail_dokumen.*')
       ->where('data_dokumen.user_id', $id)
       ->get();
    }
}
