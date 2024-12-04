<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Downloadarea extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_download';
    protected $table = 'download';
    protected $fillable = ['judul','nama_file','hits','tgl_posting'];
}
