<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localities extends Model
{
    use HasFactory;

    protected $fillable = [
        'comune',
        'cap',
        'provincia',
        'regione',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
}
