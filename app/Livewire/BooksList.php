<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class BooksList extends Component
{
    public function render()
    {
        return view('livewire.books-list',[
            'books' => Book::all()
        ]);
    }

    public function deleteBook(Book $book){
        $book->delete();
    }

}
