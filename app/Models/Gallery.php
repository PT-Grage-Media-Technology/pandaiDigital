<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'gallery';
    protected $primaryKey = 'id_gallery';
    protected $fillable = ['id_gallery', 'id_album', 'username', 'jdl_gallery', 'gallery_seo', 'keterangan', 'gbr_gallery'];

    public function album()
    {
        return $this->belongsTo(Album::class, 'id_album', 'id_album');
         
    }
}
