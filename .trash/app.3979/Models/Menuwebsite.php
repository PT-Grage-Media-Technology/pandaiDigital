<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menuwebsite extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_menu';
    protected $table = 'menu';
    protected $fillable = ['id_menu', 'deskripsi', 'id_parent', 'nama_menu', 'link', 'aktif', 'position', 'urutan'];
  

    public function parent()
    {
        return $this->belongsTo(Menuwebsite::class, 'id_parent');
    }
    public function children()
    {
        return $this->hasMany(Menuwebsite::class, 'id_parent');
    }
}
