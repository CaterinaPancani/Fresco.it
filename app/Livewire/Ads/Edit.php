<?php

namespace App\Livewire\Ads;

use App\Models\Image;
use App\Jobs\WaterPick;
use Livewire\Component;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Features\SupportFileUploads\WithFileUploads;


class Edit extends Component
{
    use WithFileUploads;
    protected $rules=[
        'images.*' => 'image|max:102400',
        // 'temporary_images.*' => 'image',
        'title'=>'required|min:5|max:100',
        'description'=>'required|min:10|max:500',
        'category'=>'required|min:1',
        'price'=>'required'
    ];
    protected $messages=[
        // 'temporary_images.required' => "richiesto",
        // 'temporary_images.*.image' => "devono esseer immagini",
        // 'temporary_images.*.max' => "max 1 mb dimensione",
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
    public $pippo;
    public $category;
    public $title;
    public $price;
    public $description;
    public $images,$image;
    public $adId;
    public $temporary_images;
    public $alpha;
    public $oldimages;

    public function mount($ad)
    {
        $this->ad = $ad;
        $this->pippo = $ad->category_id;
        $this->title = $ad->title;
        $this->price = $ad->price;
        $this->description = $ad->description;
        $this->oldimages = $ad->images->all();
    }

    public function update(){
        if($this->ad->checked===null){
            $this->reset();
            //dd("prima di modificare il tuo annuncio, attendi che sia approvato/rifiutato");
            session()->flash('error','prima di modificare il tuo annuncio, attendi che sia approvato/rifiutato');
        }elseif($this->ad->checked===1||$this->ad->checked===0){
            // dd('porcodio');
            $this->ad->update([
                'title'=>$this->title,
                'description'=>$this->description,
                'category_id'=>$this->pippo,
                'user_id'=>Auth::user()->id,
                'price'=>$this->price,
            ]);
            if($this->images>0){
                foreach($this->images as $image){
                    // $this->alpha->create(['path'=>$image->store('images','public')]);
                    $newPathName = "announcements/{$this->ad->id}";
                    $newImage  =  Image::create(['path'=>$image->store($newPathName,'public'),'announcement_id'=>$this->ad->id]);
                    //$newImage = $image->update(['path'=>$image->store($newPathName,'public')]);
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
            $this->ad->checked = null;
            $this->ad->save();
            session()->flash('success','tanto sudore, ma alla fine VA BENE LO STESSOOOOOO');
            $this->reset();
        }else{
            dd('cazzo altro dovrebbe essere????');
        }
    }

    public function removeImage($key){
        if(in_array($key,array_keys($this->oldimages))){
            unset($this->oldimages[$key]);
        }
    }

    public function render()
    {
        $images= $this->images;
        return view('livewire.ads.edit',compact('images'));
    }
}
