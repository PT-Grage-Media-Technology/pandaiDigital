<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOTP extends Model
{
    protected $table = 'user_otps';
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'otp_code',
        'user_id',
        'expired_at'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
