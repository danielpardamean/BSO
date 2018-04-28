<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Koreksi extends Model
{
    protected $fillable = [
        "pengajuan_id",
        "information",
        "document",
        "nip"
    ];
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'koreksi';

   public function dosen ()
   {
        return $this->hasOne('App\Pegawai', 'nip', 'nip'); 
   }
}
