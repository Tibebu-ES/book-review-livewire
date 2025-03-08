<div class="create">
    <h3>Edit a book</h3>
    <form wire:submit="editBook">
        <div class="field">
            <label>Book Title:</label>
            <input wire:model="title" type="text" />
            @error('title')
            <div class="error"> {{$message}}</div>
            @enderror
        </div>

        <div class="field">
            <label>Book Author:</label>
            <input wire:model="author" type="text"/>
            @error('author')
            <div class="error"> {{$message}}</div>
            @enderror
        </div>

        <div class="field">
            <label>Book Rating:</label>
            <input wire:model="rating" type="number" />
            @error('rating')
            <div class="error"> {{$message}}</div>
            @enderror
        </div>

        <button class="cursor-pointer">Edit Book</button>
        <button wire:navigate href="{{route('books.index')}}" class="cursor-pointer">Cancel</button>

    </form>
</div>
