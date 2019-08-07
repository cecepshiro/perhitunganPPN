<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table='dokumen';
    protected $primaryKey='id_dokumen';
    public $incrementing =false;
    public $timestamps=true; 
    protected $fillable = [
      'nama_pengaju','email','path_dokumen','status','created_at','updated_at',
    ];
}
