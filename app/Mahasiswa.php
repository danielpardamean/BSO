<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Mahasiswa extends Model implements Authenticatable
{
    use AuthenticableTrait;

    protected $fillable = [
        "nim",
        "name",
        "password",
        "profile_picture",
        "program_studi_id"
    ];
    
    protected $table = 'mahasiswa';

    protected $primaryKey = 'nim';

    public $incrementing = false;

    public function bimbingan()
    {
        return $this->hasOne('App\Bimbingan', 'nim', 'nim');
    }

    public function pembimbing()
    {
        return $this->belongsToMany('App\Pegawai', 'pembimbing', 'nim', 'nip')->withTimeStamps();
    }

    public function programStudi()
    {
        return $this->hasOne('App\ProgramStudi', 'id', 'program_studi_id');
    }

    public function getRememberToken ()
    {
        return null;
    }

    public function setRememberToken($value)
    {
        return null;
    }

    public function getRememberTokenName ()
    {
        return null;
    }

    public function setAttribute ($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();

        if(!$isRememberTokenAttribute){
            parent::setAttribute($key, $value);
        }
    }
}
