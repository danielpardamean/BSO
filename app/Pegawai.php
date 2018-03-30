<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Pegawai extends Model implements Authenticatable
{
    use AuthenticableTrait;
    
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
