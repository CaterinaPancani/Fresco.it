<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\User;
use App\Models\Apply;
use App\Models\Likes;

use Illuminate\Http\Request;
use App\Models\Request as revisorRequest;
use App\Mail\CheckerRequeste;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class GuestController extends Controller
{
    public function dashboard(){
        
        if(Auth::user()){
            $user_id=Auth::user()->id;
            $ad=Ads::where('checked',null);
            $ads=$ad->where('user_id',$user_id)->get();
            return view('ads.dashboard',compact('user_id','ads'));
        }else{
            return view('auth.login');
        }
    }
    public function beChecker(User $user){
        // $user=Auth::user();
        if($user){
            if(revisorRequest::where('user_id',$user->id)->get()->count()>0){
                return redirect()->back()->with('error','La tua richiesta è già stata inviata, l\'esito ti sarà comunicato tramite email');
            }else{
                // $mail=new CheckerRequeste($user);
                // Mail::to('admin@presto.it')->send($mail);
                $request=revisorRequest::create([
                    'user_id'=>$user->id,
                    'user_email'=>$user->email,
                    'status'=>null
                ]);
                return redirect()->back()->with('success','richiesta revisore inoltrata con successo');
            }
        }else{
            return redirect()->back()->with('error','Effettua il login per mandare la richiesta');
        }
    }

//  work with us
    public function lavoraConNoi(){
        $user=Auth::user();
        return view('lavoraConNoi', compact('user'));
    }
    public function candidati(Request $request){
        $user=Auth::user();
        $candidatura=Apply::create([
            'user_id'=>$user->id,
            'cv'=>$request->input('cv'),
            'presentazione'=>$request->input('presentazione'),
            'lavoroPreferito'=>$request->input('lavoroPreferito')
        ]);
        return redirect()->back()->with('candidato','candidatura inviata con successo, l\'esito sarà comunicato tramite email');
    }
}
