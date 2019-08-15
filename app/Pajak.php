<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use DateTimeZone;
use DateTime;

class Pajak extends Model
{
    protected $table='data_pajak';
    protected $primaryKey='id_pajak';
    public $incrementing =false;
    public $timestamps=true; 
    protected $fillable = [
      'id_pajak','user_id','id_dokumen','omset','id_jenis_pajak','bayaran','bukti_bayar','pajak_bulan','status','created_at','updated_at',
    ];

    //mengambil data omset yang menunggu
    public static function getStatusMenunggu(){
      $format = new DateTimeZone("Asia/Jakarta");
      $begin = new DateTime(date("Y-m-d"), $format);
        return $data = DB::table('data_pajak')
         ->join('data_dokumen','data_pajak.id_dokumen','=','data_dokumen.id_dokumen')
         ->join('data_pengguna','data_dokumen.user_id','=','data_pengguna.user_id')
         ->select('*')
         ->where('data_pajak.status', 'menunggu konfirmasi')
         ->where('data_pajak.pajak_bulan', $begin)
         ->get();
      }

     //mengambil data omset yang terkonfirmasi
     public static function getStatusDikonfirmasi(){
        return $data = DB::table('data_pajak')
         ->join('data_dokumen','data_pajak.id_dokumen','=','data_dokumen.id_dokumen')
         ->join('data_pengguna','data_dokumen.user_id','=','data_pengguna.user_id')
         ->select('*')
         ->where('data_pajak.status', 'pembayaran dikonfirmasi')
         ->get();
      }

     //mengambil data omset yang belum terbayar
     public static function getStatusBelumBayar(){
        return $data = DB::table('data_pajak')
         ->join('data_dokumen','data_pajak.id_dokumen','=','data_dokumen.id_dokumen')
         ->join('data_pengguna','data_dokumen.user_id','=','data_pengguna.user_id')
         ->select('*')
         ->where('data_pajak.status', 'belum terbayar')
         ->get();
      }

     //mengambil data omset yang sudah terbayar
     public static function getStatusSudahBayar(){
        return $data = DB::table('data_pajak')
         ->join('data_dokumen','data_pajak.id_dokumen','=','data_dokumen.id_dokumen')
         ->join('data_pengguna','data_dokumen.user_id','=','data_pengguna.user_id')
         ->select('*')
         ->where('data_pajak.status', 'sudah terbayar')
         ->get();
      }

      //mengambil data detail pajak
     public static function getDetailPajak($id){
      return $data = DB::table('data_pajak')
       ->join('data_dokumen','data_pajak.id_dokumen','=','data_dokumen.id_dokumen')
       ->join('data_pengguna','data_dokumen.user_id','=','data_pengguna.user_id')
       ->select('*')
       ->where('data_pajak.id_pajak', $id)
       ->first();
    }


}
