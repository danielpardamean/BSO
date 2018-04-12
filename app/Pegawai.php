<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Pegawai extends Model implements Authenticatable
{
    use AuthenticableTrait;

    protected $fillable = [
        "nip",
        "name",
        "password",
        "profile_picture",
        "id_type"
    ];
    
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

    public function tipe ()
    {
      return $this->hasOne('App\Type', 'id', 'id_type');
    }
    
}
