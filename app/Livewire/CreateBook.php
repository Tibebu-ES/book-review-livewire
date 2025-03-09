<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateBook extends Component
{
    use WithFileUploads;

    #[Rule('string|required|min:3|max:50')]
    public string $title;
    #[Rule('string|required|min:3|max:50')]
    public string $author;
    #[Rule('integer|required|min:1|max:10')]
    public int $rating;
    #[Validate('nullable|image|max:1024')] // 1MB Max
    public $coverPhoto;

    public function addBook(){
        $this->validate();
        //upload cover photo
        $coverPhotoUrl = "";
        if($this->coverPhoto){
            $coverPhotoUrl = $this->coverPhoto->store(path: 'cover-photos',options: ['disk' => 'public']);
        }

        Book::create([
            'title' => $this->title,
            'author' => $this->author,
            'rating' => $this->rating,
            'cover_photo' => $coverPhotoUrl
        ]);
        $this->redirect(route('books.index'),navigate: true);
    }

    #[Title('Create a Book')]
    public function render()
    {
        return view('livewire.create-book');
    }
}
