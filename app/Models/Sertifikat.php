<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    use HasFactory;
    
    protected $table = 'sertifikat';
    protected $primaryKey = 'id_sertifikat';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    
    protected $fillable = [
        'id_sertifikat',
        'id_user',
        'id_bootcamp',
        'files',
        'no',
        'nilai'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function bootcamp()
    {
        return $this->belongsTo(Bootcamp::class, 'id_bootcamp', 'id_bootcamp');
    }
}