<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $fillable = [
        'title',
        'document',
        'bimbingan_id'
    ];

    protected $table = 'pengajuan';

    public function bimbingan()
    {
        return $this->belongsTo('App\Bimbingan');
    }

    public function koreksi()
    {
        return $this->hasMany('App\Koreksi');
    }
}
