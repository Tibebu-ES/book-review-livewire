<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditBook extends Component
{
    #[Rule('string|required|min:3|max:50')]
    public string $title;
    #[Rule('string|required|min:3|max:50')]
    public string $author;
    #[Rule('integer|required|min:1|max:10')]
    public int $rating;

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
    }
    public function editBook(){
        $this->validate();
        $this->book->update([
            'title' => $this->title,
            'author' => $this->author,
            'rating' => $this->rating
        ]);
        $this->redirect(route('books.index'),navigate: true);
    }


}
