<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumpulantugasbootcamp extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $primaryKey = 'id_pengumpulan_bootcamp';
    protected $table = 'pengumpulan_tugas_bootcamp';
    protected $fillable = ['id_pengumpulan_bootcamp', 'id_user', 'id_tugas', 'file', 'nilai', 'deskripsi'];

    public function tugas()
    {
        return $this->belongsTo(Tugasbootcamp::class, 'id_tugas', 'id_tugas_bootcamp');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
