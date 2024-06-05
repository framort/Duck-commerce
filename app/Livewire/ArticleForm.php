<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\Attributes\Validate;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ArticleForm extends Component
{
    use WithFileUploads;
    public $images = [];
    public $temporary_images;
    public $article;



    #[Validate('required|min:5')]
    public $titolo;
    #[Validate('required|numeric')]
    public $prezzo;
    #[Validate('required|min:15')]
    public $descrizione;
    #[Validate('required')]
    public $category_id;


    public function save()
    {

        $this->validate();

        $this->article = Auth::user()->articles()->create([
            'titolo' => $this->titolo,
            'prezzo' => $this->prezzo,
            'descrizione' => $this->descrizione,
            'category_id' => $this->category_id
        ]);
        
        if (count($this->images) > 0) {
            
            foreach ($this->images as $image) {
                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create([
                    'path' => $image->store($newFileName, 'public')]);
                    // dispatch(new ResizeImage($newImage->path, 300, 300));
                    // dispatch(new GoogleVisionSafeSearch($newImage->id));
                    // dispatch(new GoogleVisionLabelImage($newImage->id));
                    RemoveFaces::withChain([
                        new ResizeImage($newImage->path, 300, 300),
                        new GoogleVisionSafeSearch($newImage->id),
                        new GoogleVisionLabelImage($newImage->id)
                    ])->dispatch($newImage->id);

            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        $this->cleanForm();
        // $this->reset();
        redirect()->route('article.all')->with('status', __('ui.articleCreated'));
        // session()->flash('status', 'Articolo creato');
    }

    protected function cleanForm()
    {
        $this->titolo = '';
        $this->prezzo = '';
        $this->descrizione = '';
        $this->category_id = '';
        $this->images = [];
    }


    protected $messages = [
        'titolo.required' => 'il titolo è richiesto',
        'titolo.min' => 'il titolo deve essere di almeno 5 caratteri',
        'prezzo.required' => 'Il prezzo è richiesto',
        'prezzo.numeric' => 'Questo campo deve contenere dei numeri',
        'descrizione.required' => 'il titolo è richiesto',
        'descrizione.min' => 'La descrizione  deve essere di almeno 15 caratteri',
        'temporary_images.*.image' => 'Il file deve essere di tipo immagine',
        'temporary_images.max' => 'Il numero massimo di immagini è 6',
        'category_id.required' => 'La categoria è richiesta',
    ];

    public function render()
    {
        return view('livewire.article-form');
    }

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:1024',
            'temporary_images' => 'max:6'
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }
}
