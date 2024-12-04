<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Popup extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'pop_up';
    protected $primaryKey = 'id_pop_up';

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['id_pop_up','pesan','id_trainer'];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class, 'id_trainer', 'id_trainer');
    }
}
