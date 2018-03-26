<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pengajuan';

    /**
     * Get Bimbingan information.
     */
    public function bimbingan()
    {
        return $this->belongsTo('App\Bimbingan');
    }
}
