@extends("layouts.main")
@section('content')
<div class="container">
    <!-- Card for Book Details -->
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">{{ $book->title }}</h5>
            <p class="card-text">Author: {{ $book->authors }}</p>
            <p class="card-text">Published Date: {{ $book->released_at }}</p>
            <p class="card-text">Number of Pages: {{ $book->pages }}</p>
            <p class="card-text">Language: {{ $book->language_code }}</p>
            <p class="card-text">ISBN: {{ $book->isbn }}</p>
            <p class="card-text">In Stock: {{ $book->in_stock }}</p>
            <!-- Assuming 'available_books' is a computed attribute or derived from relations -->
            <p class="card-text">Available Books: {{ $book->available_books }}</p>
            <p class="card-text">Description: {{ $book->description }}</p>
            <img src="{{ asset($book->cover_image) }}" class="img-fluid" alt="Cover Image">
        </div>
    </div>
</div>
@endsection