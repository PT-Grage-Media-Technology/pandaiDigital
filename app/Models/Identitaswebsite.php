<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identitaswebsite extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'identitas';
    protected $primaryKey = 'id_identitas';
    protected $fillable = ['nama_website','email','url','facebook','rekening','no_telp','meta_deskripsi','meta_keyword','favicon','alamat','maps','ceo','ttd','cap'];
}
