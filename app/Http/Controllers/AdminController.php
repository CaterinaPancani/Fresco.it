<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{  
    public function makeChecker(User $user){
        Artisan::call('app:make-user-checker',['email'=>$user->email]);
        $request=$user->requests->first();
        $request->status=1;
        $request->save();

        return redirect()->back()->with('revisore',$user->name.' è ora diventato revisore');
    }
}
