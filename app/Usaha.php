<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usaha extends Model
{
    protected $table='data_usaha';
    protected $primaryKey='id_usaha';
    public $incrementing =false;
    public $timestamps=true; 
    protected $fillable = [
      'id_usaha','user_id','nama_usaha','keterangan','created_at','updated_at',
    ];
}
