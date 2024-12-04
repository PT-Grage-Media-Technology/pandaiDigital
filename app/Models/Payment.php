<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'payments';
    protected $primaryKey = 'id';
    protected $fillable = ['berlangganan_id','id_invoice','program_name','payment_datetime', 'id_user','payment_method','gambar','total','status'];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    
}
