<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_kategori';
    protected $table = 'kategori';
    protected $fillable = ['id_kategori', 'username', 'nama_kategori', 'kategori_seo', 'sidebar', 'aktif']; // Kolom yang dapat diisi

    public function berita()
    {
        return $this->hasMany(Berita::class, 'id_kategori');
    }   
}
