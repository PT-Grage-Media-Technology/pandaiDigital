<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poling extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_poling';
    protected $table = 'poling';
    protected $fillable = ['id_poling', 'pilihan','status','rating','aktif','username'];
}
