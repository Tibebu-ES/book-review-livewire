<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class BooksList extends Component
{
    use WithPagination;

    public string $search = '';

    #[Title('Books List - Livewire')]
    public function render()
    {
        $books = $this->search ?
            Book::where("title","LIKE", "%{$this->search}%")->orderByDesc('created_at')->paginate(5):
            Book::orderByDesc('created_at')->paginate(5);

        return view('livewire.books-list',[
            'books' => $books
        ]);
    }

    public function deleteBook(Book $book){
        $book->delete();
    }

}
