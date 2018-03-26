<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bimbingan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bimbingan';

    /**
     * Get User Information.
     */
    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa', 'nim', 'nim');
    }

    /**
     * Get Pengajuan Information.
     */
    public function pengajuan()
    {
        return $this->hasMany('App\Pengajuan');
    }
}
