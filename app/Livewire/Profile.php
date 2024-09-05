<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Ads;
use App\Models\User;
use App\Models\Likes;
use App\Models\Review;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class Profile extends Component
{
    public $choice,$action;
    public $ads,$likes,$collected;
    public $user_id,$title,$content,$rating,$star;
    public $users,$user;

    //  costruttori
    public function render()
    {
        return view('livewire.profile');
    }
    public function favourites(){
        $this->choice=1;
        $this->likes=Auth::user()->likes;
        foreach($this->likes as $like){
            $this->ads[]=Ads::find($like->id_advertisement);
            }
        }
    // guest
    public function chart(){
        $this->choice=2;
    }
    public function myAds(){
        $this->choice=3;
        $this->ads=Auth::user()->ads;
    }
    public function review(){
        $this->choice=4;
    }
    public function setRating($value)
    {
        $this->rating = $value;
        $this->star= $value;
    }
    public function tellus(){
        $lastReview=Review::where('user_id',Auth::user()->id)->first();
        if(!$lastReview){
            $review=Review::create([
                'title'=>$this->title,
                'content'=>$this->content,
                'user_id'=>Auth::user()->id,
                'rating'=>$this->rating
            ]);
            session()->flash('success','Recensione inviata con successo');
            $this->reset();
        }else{
            if($lastReview->created_at->diffInDays(Carbon::now()) >= 30){
                $review=Review::create([
                    'title'=>$this->title,
                    'content'=>$this->content,
                    'user_id'=>Auth::user()->id,
                    'rating'=>$this->rating
                ]);
                session()->flash('success','Recensione inviata con successo');
                $this->reset();
            }else{
                    session()->flash('warning','Puoi  scrivere massimo una recensione ogni 30 giorni');
            }
        }
    }

    // revisor
    public function getStarted(){
        return redirect(route('dashboard'));
    }
    public function usersIndex(){
        $this->choice=5;
        $this->users=User::all();
    }
    public function userShow($id){
        $this->user=User::find($id);
        $this->action=1;
    }

}
