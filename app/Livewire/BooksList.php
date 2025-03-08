<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Attributes\Title;
use Livewire\Component;

class BooksList extends Component
{
    public string $search = '';

    #[Title('Books List - Livewire')]
    public function render()
    {
        $books = $this->search ?
            Book::where("title","LIKE", "%{$this->search}%")->get()->sortByDesc('created_at') :
            Book::all()->sortByDesc('created_at');

        return view('livewire.books-list',[
            'books' => $books
        ]);
    }

    public function deleteBook(Book $book){
        $book->delete();
    }

}
