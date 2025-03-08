<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateBook extends Component
{
    #[Rule('string|required|min:3|max:50')]
    public string $title;
    #[Rule('string|required|min:3|max:50')]
    public string $author;
    #[Rule('integer|required|min:1|max:10')]
    public int $rating;

    public function addBook(){
        $this->validate();
        Book::create([
            'title' => $this->title,
            'author' => $this->author,
            'rating' => $this->rating
        ]);
        $this->redirect(route('books.index'),navigate: true);
    }

    #[Title('Create a Book')]
    public function render()
    {
        return view('livewire.create-book');
    }
}
