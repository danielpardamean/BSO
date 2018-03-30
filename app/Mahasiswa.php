<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Mahasiswa extends Model implements Authenticatable
{
    use AuthenticableTrait;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mahasiswa';

    protected $primaryKey = 'nim';

    public $incrementing = false;

    /**
     * Get Bimbingan information.
     */
    public function bimbingan()
    {
        return $this->hasOne('App\Bimbingan', 'nim', 'nim');
    }

    /**
     * Get pembimbing information.
     */
    public function pembimbing()
    {
        return $this->belongsToMany('App\Pegawai', 'pembimbing', 'nim', 'nip')->withTimeStamps();
    }

    public function programStudi()
    {
        return $this->hasOne('App\ProgramStudi', 'id', 'program_studi_id');
    }

    /**
     * Overrides the method to ignore the remember token.
     */
    public function setAttribute($key, $value)
    {
      return false;
    }
}
