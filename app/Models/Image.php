<?php

namespace App\Models;

use App\Models\Ads;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Image extends Model
{
    use HasFactory;
    protected $fillable=['path','announcement_id'];
    protected $casts=['labels'=>'array'];

    public function announcement(){
        return $this->belongsTo(Ads::class);
    }

    public static function getUrlByFilePath($filePath, $w= null, $h  = null){
        if(!$w && !$h){
            return Storage::url($filePath);
        }
        $path=dirname($filePath);
        $fileName=basename($filePath);
        $file="{$path}/crop_{$w}x{$h}_{$fileName}";
        return Storage::url($file);
    }

    public function getUrl($w= null, $h  = null){
        return Image::getUrlByFilePath($this->path,$w,$h);
    }
}
