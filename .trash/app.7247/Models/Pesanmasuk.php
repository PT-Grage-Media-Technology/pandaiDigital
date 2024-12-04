<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanmasuk extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'hubungi';
    protected $primaryKey = 'id_hubungi';
    protected $fillable = ['id_hubungi', 'nama', 'email', 'subjek', 'pesan', 'tanggal', 'jam', 'dibaca'];
}
