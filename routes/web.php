<?php

use App\Livewire\BooksList;
use App\Livewire\CreateBook;
use Illuminate\Support\Facades\Route;

Route::get('/', BooksList::class)->name('books.index');
Route::get('/create', CreateBook::class)->name('books.create');
