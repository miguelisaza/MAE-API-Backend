<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Missing extends Model
{
    public $timestamps = true;

    protected $table = 'missing';

    protected $fillable = [
        'idEstudiante',
        'nrc',

    ];

}
