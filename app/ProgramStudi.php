<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    protected $fillable = [
        'name'
    ];
    
    protected $table = 'program_studi';
}
