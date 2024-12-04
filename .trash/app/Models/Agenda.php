<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'agenda';
    protected $primaryKey = 'id_agenda';
    protected $fillable = ['id_agenda', 'tema', 'tema_seo', 'isi_agenda', 'tempat', 'pengirim', 'gambar', 'tgl_mulai','tgl_selesai', 'tgl_posting', 'jam', 'dibaca', 'username'];

    public function scopeLatest($query)
    {
        return $query->orderBy('tgl_posting', 'desc');
    }
}
