<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_logo';
    protected $table = 'logo';
    protected $fillable = ['id_logo','gambar'];
}
