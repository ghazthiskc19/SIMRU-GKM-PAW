<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_users',
        'id_bem',
        'id_ruangan',
        'status_peminjaman',
        'path_surat',
        'nama_kegiatan',
        'waktu_mulai',
        'waktu_selesai',
        'tanggal_pengajuan',
        'alasan_penolakan',
    ];
}
