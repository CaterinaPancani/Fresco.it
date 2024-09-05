<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Image as SpatieImage;
use App\Models\Image;
use Spatie\Image\Manipulations;

class WaterPick implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $announcement_image_id;
    public function __construct($announcement_image_id)
    {
        $this->announcement_image_id = $announcement_image_id;
    }

    public function handle(): void
    {
        $i = Image::find($this->announcement_image_id);

        if(!$i){
            return;
        }

        $srcPath = storage_path('app/public/' . $i->path);
        $image = file_get_contents($srcPath);

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        $image = SpatieImage::load($srcPath);

        $image->watermark('public/images/logo.png')
        ->watermarkHeight(50, Manipulations::UNIT_PERCENT)
        ->watermarkWidth(100, Manipulations::UNIT_PERCENT)
        ->watermarkFit(Manipulations::FIT_STRETCH);

        $image->save($srcPath);
    }
}
