<?php

use App\Livewire\BooksList;
use App\Livewire\CreateBook;
use App\Livewire\EditBook;
use Illuminate\Support\Facades\Route;

Route::get('/', BooksList::class)->name('books.index');
Route::get('/create', CreateBook::class)->name('books.create');
Route::get('/edit/{book}', EditBook::class)->name('books.edit');
