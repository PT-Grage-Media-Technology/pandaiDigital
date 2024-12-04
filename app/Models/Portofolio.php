<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'portofolio';
    protected $primaryKey = 'id_porto';

    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = ['id_porto', 'gambar', 'judul', 'deskripsi', 'link'];

}
