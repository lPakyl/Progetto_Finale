<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use App\Jobs\WatermarkCustom;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AnnouncementCreate extends Component
{
    use WithFileUploads;
    public $announcement;
    public $title, $body, $price;
    public $category;
    public $images = [];
    public $image;
    public $temporary_images;
    public $validated;
    public $message;
    protected $rules=[

        'title'=>'required|min:4',
        'body'=>'required|min:8',
        'price'=>'required|numeric|max:999999,99',
        'category'=>'required',
        'images.'=>'image|max:1024',
        'temporary_images.*'=>'image|max:1024'

    ];

    protected $messages=[

        'required'=> 'il campo è richiesto',
        'min'=> 'il campo è troppo corto',
        'numeric'=> 'il campo deve essere un numero',
        'max'=> 'prezzo max:999999,99',
        'temporary_images.required.*'=> 'l\'immagine è richiesta',
        'temporary_images.*.image'=> 'i file devono essere immagini',
        'temporary_images.*.max'=> 'l\'immagine deve essere di massimo 1 MB',
        'images.image'=> 'l\'immagine deve essere un immagine',
        'images.max'=> 'l\'immagine deve essere di massimo 1 MB',

    ];

    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*' => 'image|max:1024',
            ])){
                foreach($this->temporary_images as $image){
                    $this->images[] = $image;
                }}
    }

        public function removeImage($key){
            if(in_array($key, array_keys($this->images))){
                unset($this->images[$key]);
            }
        }

        public function store(){
            $this->validate();
            $this->announcement = Category::find($this->category)->announcements()->create($this->validate());
            $this->announcement->user()->associate(Auth::user());
            // $announcement=$category->announcements()->create([
                // 'title'=>$this->title,
                // 'body'=>$this->body,
                // 'price'=>$this->price
            // ]);
            if(count($this->images)){
                foreach($this->images as $image){
                    // $this->announcement->images()->create(['path'=>$image->store('images', 'public')]);
                    $newFileName="announcements/{$this->announcement->id}";
                    $newImage=$this->announcement->images()->create(['path'=>$image->store($newFileName,'public')]);
                    RemoveFaces::withChain([
                       new WatermarkCustom($newImage->id,$newImage->path), 
                       new ResizeImage($newImage->path,300,200),
                       new GoogleVisionSafeSearch($newImage->id),
                       new GoogleVisionLabelImage($newImage->id)

                    ])->dispatch($newImage->id);
                   
                }
                File::deleteDirectory(storage_path('/app/livewire-tmp'));
            }
            // Auth::user()->announcements()->save($announcement);
            $this->announcement->save();

            session()->flash('message' , 'Hai inserito un annuncio con successo');
            $this->reset();

            
         }

     
        public function updated($propertyName)
        {
            $this->validateOnly($propertyName);
        }
    

    public function render()
    {
        return view('livewire.announcement-create');
    }
}
