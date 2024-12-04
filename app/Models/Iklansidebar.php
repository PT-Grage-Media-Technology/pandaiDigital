<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iklansidebar extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_pasangiklan';
    protected $table = 'pasangiklan';
    protected $fillable = ['judul', 'username', 'url', 'gambar', 'tgl_posting']; // Kolom yang dapat diisi
}
