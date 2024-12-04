<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensorkomentar extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_jelek';
    protected $table = 'katajelek';
    protected $fillable = ['kata','ganti','username'];
}
