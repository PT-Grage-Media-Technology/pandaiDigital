<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\HasMenuAccess;
// use App\Notifications\CustomVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, HasMenuAccess, Notifiable;

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'menu_access' => 'array',
    ];

    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'username', // Tambahkan baris ini
        'nama_lengkap',
        'email',
        'level',
        'foto',
        'blokir',
        'remember_token',
        'no_telp',
        'id_session',
        'password',
        'is_subscribed',
        'paket_langganan'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function user_modul()
    {
        return $this->belongsTo(UserModul::class, 'id_session', 'id_session');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'id', 'id');
    }

    public function pengajar()
    {
        return $this->hasMany(Trainer::class, 'id', 'id');
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function pengumpulantugas()
    {
        return $this->hasMany(Pengumpulantugas::class, 'id_user', 'id');
    }
    
    public function activeOTP()
    {
        return $this->hasOne(UserOTP::class,'user_id')->where('expired_at','>', 'now()');
    }
    
    // public function sendEmailVerificationNotification()
    // {
    //     $this->notify(new CustomVerifyEmail());
    // }
}
