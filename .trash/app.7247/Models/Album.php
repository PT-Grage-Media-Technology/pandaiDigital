<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $primaryKey = 'id_album';
    protected $table = 'album';
    protected $fillable = ['gbr_album','jdl_album','aktif','album_seo','keterangan','tgl_posting','jam','hari','username'];

    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'id_album');
    }
}
