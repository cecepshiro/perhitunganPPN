<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPengaju extends Model
{
    protected $table='data_detail_pengaju';
    protected $primaryKey='id_detail_pengaju';
    public $incrementing =false;
    public $timestamps=true; 
    protected $fillable = [
      'id_pengaju','dokumen','path_dokumen','status','created_at','updated_at',
    ];
}
