<?php

namespace App\Livewire;

use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditBook extends Component
{
    use WithFileUploads;

    #[Rule('string|required|min:3|max:50')]
    public string $title;
    #[Rule('string|required|min:3|max:50')]
    public string $author;
    #[Rule('integer|required|min:1|max:10')]
    public int $rating;
    public ?string $coverPhotoUrl;
    #[Validate('nullable|image|max:1024')] // 1MB Max
    public $coverPhoto;

    public Book $book;

    #[Title('Edit Book')]
    public function render()
    {
        return view('livewire.edit-book');
    }


    public function mount(Book $book){
        $this->book = $book;
        $this->title = $book->title;
        $this->author = $book->author;
        $this->rating = $book->rating;
        $this->coverPhotoUrl = $book->cover_photo;
    }
    public function editBook(){
        $this->validate();
        if($this->coverPhoto){
            //delete old cover photo
            if($this->book->cover_photo){
                Storage::disk('public')->delete($this->book->cover_photo);
            }
            //update cover photo
            $this->coverPhotoUrl = $this->coverPhoto->store(path: 'cover-photos',options: ['disk' => 'public']);
        }
        $this->book->update([
            'title' => $this->title,
            'author' => $this->author,
            'rating' => $this->rating,
            'cover_photo' => $this->coverPhotoUrl ?? null
        ]);
        $this->redirect(route('books.index'),navigate: true);
    }


}
