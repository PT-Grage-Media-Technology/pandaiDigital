<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentarberita extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'komentar';
    protected $primaryKey = 'id_komentar';
    protected $fillable = ['id_komentar', 'id_berita', 'nama_komentar', 'url', 'isi_komentar', 'tgl', 'jam_komentar', 'aktif', 'email']; // Kolom yang dapat diisi

    public function berita()
    {
        return $this->hasMany(Komentarberita::class, 'id_komentar', 'id_komentar');  
    }
}
