<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iklanatas extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_iklanatas';
    protected $table = 'iklanatas';
    protected $fillable = ['judul', 'username', 'url', 'gambar', 'tgl_posting'];
}
