<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamatkontak extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_alamat';
    protected $table = 'mod_alamat';
    protected $fillable = ['alamat'];
}
