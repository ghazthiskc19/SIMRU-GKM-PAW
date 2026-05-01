<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bem extends Model
{
    protected $primaryKey = 'id_bem';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'nim',
        'nama',
        'jabatan'
    ];

}
