<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bimbingan extends Model
{

    protected $fillable = [
        "nim",
        "title",
        "document",
    ];

    protected $table = 'bimbingan';

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa', 'nim', 'nim');
    }

    public function pengajuan()
    {
        return $this->hasMany('App\Pengajuan');
    }
}
