<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlistvideo extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_playlist';
    protected $table = 'playlist';
    protected $fillable = ['id_playlist', 'jdl_playlist', 'playlist_seo', 'gbr_playlist', 'aktif', 'username'];

    public function video(){
        return $this->hasMany(Video::class,"id_playlist","id");
    }
}
