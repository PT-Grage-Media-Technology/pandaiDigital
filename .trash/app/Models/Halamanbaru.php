<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Halamanbaru extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_halaman';
    protected $table = 'halamanstatis';
    protected $fillable = ['judul', 'isi_halaman', 'tgl_posting', 'jam', 'hari', 'username', 'gambar', 'judul_seo']; // Kolom yang dapat diisi

    // Tambahkan method ini untuk menggantikan fungsi created_at
    public function scopeLatest($query)
    {
        return $query->orderBy('tgl_posting', 'desc');
    }  
}
