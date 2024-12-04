<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bootcamp extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'bootcamps';
    protected $primaryKey = 'id_bootcamp';

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['id_bootcamp', 'judul_bootcamp', 'thumbnail', 'harga', 'harga_diskon', 'deskripsi', 'id_benefitcamps', 'id_trainer'];

    protected $casts = [
        'id_benefitcamps' => 'array',
    ];
    
    public function benefit()
    {
        if (is_string($this->id_benefitcamps)) {
            $this->id_benefitcamps = json_decode($this->id_benefitcamps, true);
        }
        
        return Benefitbootcamp::whereIn('id_benefitcamp', $this->id_benefitcamps)->get();
    }

    public function batch()
    {
        return $this->hasMany(Batch::class, 'id_bootcamp', 'id_bootcamp');
    }

    public function materibootcamp()
    {
        return $this->hasMany(Materibootcamp::class, 'id_bootcamp', 'id_bootcamp');
    }

    public function tugasbootcamp()
    {
        return $this->hasMany(Tugasbootcamp::class, 'id_bootcamp', 'id_bootcamp');
    }
    
    public function trainer()
    {
        return $this->hasMany(Trainer::class, 'id_trainer', 'id_trainer');
    }

    public function trainerAdmin()
    {
        return $this->belongsTo(Trainer::class, 'id_trainer'); // Adjust the foreign key as needed
    }
    public function permision()
    {
        return $this->hasMany(Permision::class, 'id_bootcamp');
    }
    
    public function permisionApproved()
    {
        return $this->hasMany(Permision::class, 'id_bootcamp')->where('status', 'approved');
    }
    
    public function sertifikat()
    {
        return $this->hasMany(Sertifikat::class, 'id_bootcamp', 'id_bootcamp');
    }

}
