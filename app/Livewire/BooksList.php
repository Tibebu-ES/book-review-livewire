<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Attributes\Title;
use Livewire\Component;

class BooksList extends Component
{
    #[Title('Books List - Livewire')]
    public function render()
    {
        return view('livewire.books-list',[
            'books' => Book::all()->sortByDesc('created_at')
        ]);
    }

    public function deleteBook(Book $book){
        $book->delete();
    }

}
