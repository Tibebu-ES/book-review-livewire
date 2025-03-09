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
            <li wire:key="{{$book->id}}" class="flex " >
                @if($book->cover_photo)
                     <img src="{{asset('storage/'.$book->cover_photo)}}" class="w-16  object-cover rounded-md "/>
                @endif

                <div class="grow">
                    <button wire:navigate href="{{route('books.edit',$book->id)}}"  class="cursor-pointer"><i class="fas fa-edit" ></i></button>
                    <button wire:click="deleteBook({{$book->id}})" class="cursor-pointer"><i class="fas fa-trash" ></i></button>
                    <h3>{{$book->title}}</h3>
                    <h4>{{$book->author}}</h4>
                    <p>Rating: {{$book->rating}}/10</p>
                </div>
            </li>

        @endforeach

    </ul>
    <div class="pagination-links">
        {{$books->links(data: ['scrollTo' => false])}}
    </div>

</div>
