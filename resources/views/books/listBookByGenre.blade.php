@extends('layouts.main')

@section('content')
<div class="container">
    <h2>{{ $genre->name }} Books</h2>
    <div class="row">
        @foreach($books as $book)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $book->title }}</h5>
                    <p class="card-text">Author: {{ $book->authors }}</p>
                    <p class="card-text">Published Date: {{ $book->released_at }}</p>
                    <p class="card-text">{{ $book->description }}</p>
                    <a href="{{route('detail.book', $book->id)}}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection