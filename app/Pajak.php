<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Pajak extends Model
{
    protected $table='data_pajak';
    protected $primaryKey='id_pajak';
    public $incrementing =false;
    public $timestamps=true; 
    protected $fillable = [
      'id_pajak','user_id','id_dokumen','omset','id_jenis_pajak','bayaran','bukti_bayar','status','created_at','updated_at',
    ];

    //mengambil data omset yang menunggu
    public static function getStatusMenunggu(){
        return $data = DB::table('data_pajak')
         ->join('data_dokumen','data_pajak.id_dokumen','=','data_dokumen.id_dokumen')
         ->select('*')
         ->where('data_pajak.status', 'menunggu konfirmasi')
         ->get();
      }

     //mengambil data omset yang terkonfirmasi
     public static function getStatusDikonfirmasi(){
        return $data = DB::table('data_pajak')
         ->join('data_dokumen','data_pajak.id_dokumen','=','data_dokumen.id_dokumen')
         ->select('*')
         ->where('data_pajak.status', 'pembayaran dikonfirmasi')
         ->get();
      }

     //mengambil data omset yang belum terbayar
     public static function getStatusBelumBayar(){
        return $data = DB::table('data_pajak')
         ->join('data_dokumen','data_pajak.id_dokumen','=','data_dokumen.id_dokumen')
         ->select('*')
         ->where('data_pajak.status', 'belum terbayar')
         ->get();
      }

     //mengambil data omset yang sudah terbayar
     public static function getStatusSudahBayar(){
        return $data = DB::table('data_pajak')
         ->join('data_dokumen','data_pajak.id_dokumen','=','data_dokumen.id_dokumen')
         ->select('*')
         ->where('data_pajak.status', 'sudah terbayar')
         ->get();
      }


}
