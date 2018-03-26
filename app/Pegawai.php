<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pegawai';

    protected $primaryKey = 'nip';

    /**
     * Get pembimbing information.
     */
    public function membimbing()
    {
        return $this->belongsToMany('App\Mahasiswa', 'pembimbing', 'nip', 'nim')->withTimeStamps();
    }
    
}
