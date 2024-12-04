<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagvideo extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_tag';
    protected $table = 'tagvid';
    protected $fillable = ['nama_tag', 'tag_seo', 'count', 'username'];

    public function video()
    {
        return $this->hasMany(Video::class, 'id_tag', 'id_tag');
    }
}
