<?php

namespace App\Livewire\Ads;

use App\Models\Ads;
use App\Models\Apply;
use App\Jobs\WaterPick;
use App\Models\Request;
use Livewire\Component;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Announcements extends Component
{
    use WithFileUploads;
    protected $rules=[
        'images.*' => 'image|max:102400',
        'temporary_images.*' => 'image',
        'title'=>'required|min:5|max:100',
        'description'=>'required|min:10|max:500',
        'category'=>'required|min:1',
        'price'=>'required'
    ];
    protected $messages=[
        'temporary_images.required' => "richiesto",
        'temporary_images.*.image' => "devono esseer immagini",
        'temporary_images.*.max' => "max 1 mb dimensione",
        'images.image' => 'il file deve essere di tipo immagine (jpg, png...)',
        'images.max' => "max 3 mb dimensione",
        'title.required'=>'Il titolo è obbligatorio.',
        'title.min'=>'Il titolo deve essere lungo almeno 10 caratteri.',
        'title.max'=>'Il titolo deve essere lungo masssimo 100 caratteri',
        'description.required'=>'Aggiunugi una breve descrizione',
        'description.min'=>'la descrizione deve essere lungo almeno 10 caratteri.',
        'description.max'=>'la descrizione deve essere lungo masssimo 200 caratteri',
        'category.required'=>'Si prega di selezionare una categoria.',
        'price.required'=>'Il prezzo è obbligatorio.'
    ];
    public $ad;
    public $ads;
    public Ads $announcements;
    public $announcement;
    public $images=[];
    public $temporary_images;
    public $choice=0;
    public $action=0;
    public $alpha;
    public $title,$category,$picture,$price,$description,$user_id;
    public $requests,$applies,$user,$request,$apply;

    // dashboard component
    public function mount(){
        if(Auth::user()->role===1){
            $this->choice=1;
        }else if(Auth::user()->role===2){
            $this->choice=2;
        }else if(Auth::user()->role===3){
            $this->choice=3;
        }
    }
    public function render(){
        return view('livewire.ads.announcements');
    }
    public function default(){
        $this->choice=0;
    }
    public function back(){
        $this->choice=0;
        $this->action=0;
    }

    // per il guest
    public function create(){
        $this->choice=4;
        $this->action=1;
    }
    public function preview(){
        $this->action=1;
        $title=$this->title;
        $category=$this->category;
        $picture=$this->picture;
        $price=$this->price;
    }
    public function store(){
        $this->validate();
        $this->announcements = Ads::create([
            'title'=>$this->title,
            'description'=>$this->description,
            'category_id'=>$this->category,
            'user_id'=>Auth::user()->id,
            'price'=>$this->price,
        ]);
        $this->alpha = $this->announcements->images();
        if(count($this->images)){
            foreach($this->images as $image){
                // $this->alpha->create(['path'=>$image->store('images','public')]);
                $newPathName = "announcements/{$this->announcements->id}";
                $newImage =  $this->alpha->create(['path'=>$image->store($newPathName,'public')]);
                RemoveFaces::withChain([
                    new ResizeImage($newImage->path,300,300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),
                    new WaterPick($newImage->id)
                ])->dispatch($newImage->id);

                //dispatch(new WaterPick($newImage->id));
            }
            File::deleteDirectory(storage_path('app/livewire-tmp'));
        }
        session()->flash('success');
        $this->choice=4;
        $this->reset();
    }
    public function edit($id){
        $this->action=2;
        $ad=Ads::find($id);
        $this->precompila($ad);
    }
    public function precompila($ad){
        $this->title=$ad->title;
        $this->description=$ad->description;
        $this->picture=$ad->picture;
        $this->price=$ad->price;
    }
    public function update(){
        dd("funzione ancora non disponibile");
    }
    public function updatedTemporaryImage(){
        if($this->validate(['temporary_images.*' => 'image|max:1024'])){
            foreach($this->temporary_images as $image){
                $this->images[]=$image;
            }
        }
    }
    public function removeImage($key){
        if(in_array($key,array_keys($this->images))){
            unset($this->images[$key]);
        }
    }
    // per il revisor
    public function index(){
        $this->ads=Ads::where('checked',null)->get();
        $this->choice=5;
    }
    public function show(Ads $ad){
        $this->action=3;
        $this->ad=$ad;
        $this->announcement=$ad;
        $this->alpha =$ad->images()->get();
        //dd($this->alpha);
    }
    public function accept(){
        $ad = $this->ad;
        $ad->checked=true;
        $ad->save(); 
        session()->flash('accepted','Hai accettato l\'annuncio');
        $this->action=0;
        $this->index();
    }
    public function refuse($id){
        $ad = Ads::find($id);
        $ad->checked=false;
        $ad->save();
        session()->flash('refused','Hai rifiutato l\'annuncio');
        $this->action=0;
        $this->index();
    }
    public function undo(){
        $ad=Ads::orderBy('updated_at','desc')->first();
        $ad->checked=null;
        $ad->save();
        $this->action=0;
        $this->index();
        session()->flash('undo','Azione annullata');
    }
    public function delete(){
    }

    // per l'admin
    public function requestIndex(){
        $this->choice=6;
        $this->requests=Request::where('status',null)->get();
    }
    public function appliesIndex(){
        $this->choice=7;
        $this->applies=Apply::all();
    }
    public function requestShow(Request $request){
        $this->action=4;
        $this->user=$request->user;
    }
    public function applyShow($id){
        $this->action=5;
        $this->apply=Apply::find($id);
        $this->user=$this->apply->user;
    }








}
