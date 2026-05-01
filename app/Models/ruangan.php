<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ruangan extends Model
{
    protected $primaryKey = 'id_ruangan';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_ruangan',
        'status_ruangan',
        'fasilitas',
        'kapasitas',
        'lokasi',
        'path_images'
    ];
}
