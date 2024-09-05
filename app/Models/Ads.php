<?php

namespace App\Models;

use App\Models\User;
use App\Models\Likes;
use App\Models\Categories;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ads extends Model
{
    use HasFactory, Searchable;
    protected $fillable = ['title','description','image','price','category_id','user_id'];

    public function toSearchableArray()
    {
        $category = $this->category->name;
        $array = [
            'id' => $this->id,
            'title'=> $this->title,
            'description'=> $this->description,
            'category_id' => $category
        ];
        return $array;
    }


    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function category(){
        return $this->belongsTo(Categories::class,'category_id');
    }
    public function images(){
        return $this->hasMany(Image::class, 'announcement_id');
    }
    public function likes(){
        return $this->hasMany(Likes::class, 'id_advertisement');
    }
}
