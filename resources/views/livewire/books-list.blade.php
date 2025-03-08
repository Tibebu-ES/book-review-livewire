<div>
    <header class="flex justify-between">
        <div>
            <h2>Hello there</h2>
            <p>Here's a list of your book reviews</p>
        </div>
    </header>

    {{--Search books--}}
    <input
        type="text"
        wire:model.live.debounce.300ms="search"
        class="search"
        placeholder="Search for books ..."
    />

    <ul class="list">
        @foreach($books as $book)
            <li wire:key="{{$book->id}}" >
                <button wire:navigate href="{{route('books.edit',$book->id)}}"  class="cursor-pointer">Edit</button>
                <button wire:click="deleteBook({{$book->id}})" class="cursor-pointer">delete</button>
                <h3>{{$book->title}}</h3>
                <h4>{{$book->author}}</h4>
                <p>Rating: {{$book->rating}}/10</p>
            </li>
        @endforeach

    </ul>
    <div class="pagination-links">
        {{$books->links(data: ['scrollTo' => false])}}
    </div>

</div>
