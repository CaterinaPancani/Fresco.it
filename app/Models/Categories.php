<?php

namespace App\Models;

use App\Models\Ads;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = ['name','description'];

    public function ads(){
        return $this->hasMany(Ads::class, 'category_id');
    }
}
