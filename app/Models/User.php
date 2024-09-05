<?php

namespace App\Models;

use App\Models\Ads;
use App\Models\Likes;
use App\Models\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'sur_name',
        'user_name',
        'phone_number',
        'id_locality',
        'birth',
        'email',
        'password',
        'role',
        'address',
        'email_verified_at'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function ads(){
        return $this->hasMany(Ads::class);
    }

    public function role(){
        return $this->belongsTo(Roles::class,'role');
    }

    public function locality()
    {
        return $this->belongsTo(Localities::class, 'id_locality');
    }

    public function likes(){
        return $this->hasMany(Likes::class, 'id_user');
    }
    public function reviews(){
        return $this->hasMany(Review::class, 'user_id');
    }
    public function applies(){
        return $this->hasMany(Apply::class, 'user_id');
    }
    public  function requests(){
        return $this->hasMany(Request::class,'user_id');
    }
}
