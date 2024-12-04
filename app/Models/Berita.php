<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class Berita extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $fillable = ['id_berita', 'keterangan_gambar', 'id_kategori', 'judul', 'sub_judul', 'judul_seo', 'headline', 'aktif', 'utama', 'isi_berita', 'tanggal', 'status', 'username', 'youtube', 'jam', 'hari', 'gambar', 'tag']; // Kolom yang dapat diisi

    public function scopeLatest($query)
    {
        return $query->orderBy('tanggal', 'desc');  
    }  
  
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'id_tag', 'id_tag');
    }  

    public function komentarberita()
    {
        return $this->belongsTo(Komentarberita::class, 'id_komentar');
    }
}
