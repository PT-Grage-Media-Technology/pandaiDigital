<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grafik extends Model
{
    protected $table = 'statistik';

    protected $fillable = ['ip', 'tanggal', 'hits', 'online'];
}
