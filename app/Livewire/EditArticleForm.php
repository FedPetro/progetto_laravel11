<?php

namespace App\Livewire;

use App\Models\Image;
use App\Models\Article;
use Livewire\Component;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class EditArticleForm extends Component
{
    use WithFileUploads;

    #[Validate('required', message: "Il Titolo Dell’Articolo È Obbligatorio!!")]
    #[Validate('min:5', message: "Il Titolo Dell’Articolo deve contenere almeno 5 caratteri!!")]
    public $title;
    
    #[Validate('required', message: 'La Descrizione Dell’Articolo È Obbligatorio!!')]
    public $description;
    
    #[Validate('required|numeric', message: 'Il Prezzo Dell’Articolo È Obbligatorio!!')]
    public $price;
    
    #[Validate('required', message: 'La Categoria È Obbligatorio!!' )]
    public $category;
    public $user_id;

    public $article;

    public $images = [];
    
    public $temporary_images;

    public $prev_img;
    
    
    
   

    public function editArticle(){

        $this->validate();

        $this->article->update([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category,
            'user_id' => Auth::id()
        ]);

        if (count($this->images) > 0) {
            foreach ($this->images as $image) {
                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create(['path' => $image->store($newFileName, 'public')]); 
                dispatch(new ResizeImage($newImage->path, 300, 300));
            }
            File::deleteDirectory (storage_path('/app/livewire-tmp'));
        }

        return redirect()->route('article.edit', $this->article)->with('success', "L'articolo è stato modificato correttamente");
        
        // $this->reset();
    }


    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:2048',
            'temporary_images'=>'max:6'
            ])) {
                foreach ($this->temporary_images as $image) {
                    $this->images[] = $image;
                }
            }
        } 



    public function deleteImage($id)
    {
       $image = Image::find($id);


       $image->delete();
    }


    public function mount() {
        // $this->article = $article;
        $this->title = $this->article->title;
        $this->description = $this->article->description;
        $this->price = $this->article->price;
        $this->category = $this->article->category->id;
        $this->user_id = $this->article->user_id;
        $this->images = [];
        // $this->prev_img = $this->article->images;
        
    } 

    public function render()
    {
        return view('livewire.edit-article-form');
    }
}

