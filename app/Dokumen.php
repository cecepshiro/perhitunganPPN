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
      'user_id','nama_dokumen','dokumen','status','created_at','updated_at',
    ];

}
