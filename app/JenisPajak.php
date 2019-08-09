<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisPajak extends Model
{
    protected $table='data_jenis_pajak';
    protected $primaryKey='id_jenis_pajak';
    public $incrementing =false;
    public $timestamps=true; 
    protected $fillable = [
      'jenis_pajak','besar_pajak','created_at','updated_at',
    ];
}
