<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permision extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = 'permision';
    protected $primaryKey = 'id_permision';
    protected $fillable = ['id_permision','id_bootcamp','id_sender','id_trainer','status','type'];
    
     public function bootcamp()
    {
        return $this->belongsTo(Bootcamp::class, 'id_bootcamp', 'id_bootcamp');
    }

    public function sender()
    {
        return $this->belongsTo(Trainer::class, 'id_sender', 'id_trainer'); // Hubungkan id_sender ke User
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class, 'id_trainer', 'id_trainer');
    }
    
}
