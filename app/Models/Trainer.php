<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_trainer';
    protected $table = 'trainer';
    protected $fillable = ['id_trainer', 'nama_trainer', 'foto', 'link', 'id','ttd'];

    // Relasi ke Program
    public function programs()
    {
        return $this->hasMany(Program::class, 'id_trainer', 'id_trainer');
    }

    public function materi()
    {
        return $this->hasMany(Materi::class, 'id_trainer');
    }
    
    public function bootcamp()
    {
        return $this->belongsTo(Bootcamp::class, 'id_trainer', 'id_bootcamp');
    }

    public function pengajar()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
    
    public function popups()
    {
        return $this->belongsTo(Popup::class, 'id_trainer', 'id_trainer');
    }
}
