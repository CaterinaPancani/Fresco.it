<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;


class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $w;
    public $h;
    public $fileName;
    public $path;

    public function __construct($filePath,$w,$h)
    {
        $this->path =  dirname($filePath);
        $this->fileName = basename($filePath);
        $this->w = $w;
        $this->h = $h;
    }

    public function handle(): void
    {
        $w = $this-> w;
        $h = $this->h;
        $scrPath = storage_path() . '/app/public/' . $this->path . '/' . $this->fileName;
        $destPath = storage_path() . '/app/public/' . $this->path . "/crop_{$w}x{$h}_" . $this->fileName;
        $croppedImage = Image::load($scrPath)
            ->crop(Manipulations::CROP_CENTER, $w ,$h)
            ->save($destPath);
    }
}
