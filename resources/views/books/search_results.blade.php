@extends('layouts.main')

@section('content')
<div class="container">
    <h2 class="mt-4 mb-3">Search Results</h2>
    <p>Showing results for: {{ $query }}</p>

    <div class="row">
        @if($books->isEmpty())
        <div class="col">
            <p>No books found.</p>
        </div>
        @else
        @foreach($books as $book)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('detail.book', $book->id) }}">
                        <h5 class="card-title">{{ $book->title }}</h5>
                    </a>
                    <h6 class="card-subtitle mb-2 text-muted">by {{ $book->author }}</h6>
                    <p class="card-text">{{ $book->description }}</p>
                    <p class="card-text">Released: {{ $book->released_at }}</p>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection