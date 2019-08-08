<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaju extends Model
{
    protected $table='data_pengaju';
    protected $primaryKey='id_pengaju';
    public $incrementing =false;
    public $timestamps=true; 
    protected $fillable = [
      'nama_pengaju','email','path_dokumen','status','created_at','updated_at',
    ];
}
