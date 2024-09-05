<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\User;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Mail\CheckerRequeste;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use Livewire\Livewire;
use App\Livewire\Home as HomeLivewire;

class main extends Controller
{
    // costruttori
    public function __construct(){
        $this->middleware('auth')->only('create','adsByCategory','beChecker');
        $this->middleware('checker')->only('acceptAd','refuseAd','goToCheck');
    }
    public function home(){
        Livewire::component('home', HomeLivewire::class);
        return view('home');
    }
    // annunci
    public function ads(Request $request){
        if($request->searched){
            $ads = Ads::search($request->searched)->where('checked',true)->paginate(6);
        }else{
            $ads=Ads::where('checked',true)->paginate(8);
            }
        return view('ads.index', compact('ads'));
    }
    public function adsByCategory($id){
        $category = Categories::findOrFail($id);
        $ads = $category->ads()->orderBy('created_at', 'desc')->paginate(6);
        return view('ads.index', compact('category', 'ads'));
    }
    public function adDetail($id){
        $ad=Ads::find($id);
        return view('ads.show',compact('ad'));
    }
    // utenti
    public function profilo(){
        return view('auth.profilo');
    }
    // public function goToCheck(){
    //     $ads=Ads::where('checked',null)->get();
    //     return view('ads.checker.checkAd',compact('ads'));
    // }
    // public function acceptAd($id){
    //     $ad = Ads::find($id);
    //     $ad->checked=true;
    //     $ad->save();
    //     return redirect()->back()->with('success','stai andando bravi');
    // }
    // public function refuseAd($id){
    //     $ad = Ads::find($id);
    //     $ad->checked=false;
    //     $ad->save();
    //     return redirect()->back()->with('success','stai andando mali');
    // }
    // public function unDo(){
    //     $ad=Ads::orderBy('updated_at','desc')->first();
    //     $ad->checked=null;
    //     $ad->save();
    //     return redirect()->back()->with('success','stai andando bravi');
    // }


    public function adEdit($id){
        $ad = Ads::findOrFail($id);
        return view('ads.edit', compact('ad'));
    }
}
