<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_advertisement'
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function ads(){
        return $this->belongsTo(Ads::class);
    }

}
