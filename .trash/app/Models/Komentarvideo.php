<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentarvideo extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'komentarvid';
    protected $primaryKey = 'id_komentar';
    protected $fillable = ['id_komentar', 'id_video', 'nama_komentar', 'url', 'isi_komentar', 'tgl', 'jam_komentar', 'aktif']; // Kolom yang dapat diisi

    public function video()
    {
        return $this->hasMany(Video::class, 'id_komentar', 'id_komentar');
    }
}
