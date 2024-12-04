<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekilasinfo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_sekilas';
    protected $table = 'sekilasinfo';
    protected $fillable = ['id_sekilas', 'gambar','info','aktif','tgl_posting'];
}
