<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class deleteImageHistory extends Command
{
    protected $signature = 'app:delete-image-history';

    protected $description = 'Command description';

    public function __construct(){
        parent::__construct();
    }
    public function handle()
    {
        File::deleteDirectory('public/storage/announcements');
    }
}
