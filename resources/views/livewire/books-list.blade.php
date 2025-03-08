<div>
    <header class="flex justify-between">
        <div>
            <h2>Hello there</h2>
            <p>Here's a list of your book reviews</p>
        </div>
    </header>

    <ul class="list">
        @foreach($books as $book)
            <li wire:key="{{$book->id}}" >
                <h3>{{$book->title}}</h3>
                <h4>{{$book->author}}</h4>
                <p>Rating: {{$book->rating}}/10</p>
            </li>
        @endforeach

    </ul>
</div>
