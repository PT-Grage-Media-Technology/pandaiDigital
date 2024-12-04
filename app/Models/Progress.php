<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;
    
    public $timestamps = true;
    protected $table = 'progress';
    protected $primaryKey = 'id_progress';
    
    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = [
        'id_progress',
        'id_user',
        'id_bootcamp',
        'id_materi',
        'created_at',
    ];
    
    const UPDATED_AT = null;
    
    /**
     * Relasi ke model User.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    /**
     * Relasi ke model Bootcamp.
     */
    public function bootcamp()
    {
        return $this->belongsTo(Bootcamp::class, 'id_bootcamp', 'id_bootcamp');
    }

    /**
     * Relasi ke model Materibootcamp.
     */
    public function materi()
    {
        return $this->belongsTo(Materibootcamp::class, 'id_materi', 'id_materi_bootcamp');
    }
    
}