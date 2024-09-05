<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class makeUserChecker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-user-checker {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rendi utente revisore';

    public function __construct(){
        parent::__construct();
    }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::where('email', $this->argument('email'))->first();
            if(!$user){
            $this->error('utente non trovato');
            return;
            }

        $user->role=2;
        $user->save();
        $this->info("L'utente {$user->name} è ora un revisore.");
    }
}
