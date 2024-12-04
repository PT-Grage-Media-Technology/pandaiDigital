<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bannerhome extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_iklantengah';
    protected $table = 'iklantengah';
    protected $fillable = ['id_iklantengah', 'judul', 'username', 'tgl_posting', 'gambar', 'url']; // Kolom yang dapat diisi
}
