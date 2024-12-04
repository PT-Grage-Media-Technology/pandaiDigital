<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_tag';
    protected $table = 'tag';
    protected $fillable = ['nama_tag', 'username', 'count', 'tag_seo'];  

    public function berita()
    {
        return $this->hasMany(Berita::class, 'id_tag', 'id_tag');
    }
}
