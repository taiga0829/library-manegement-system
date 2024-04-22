@extends('layouts.main')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h2>System Information</h2>
            <hr>
            <p><strong>Number of users in the system:</strong> {{ $userCount }}</p>
            <p><strong>Number of genres:</strong> {{ $genreCount }}</p>
            <p><strong>Number of books:</strong> {{ $bookCount }}</p>
            <p><strong>Number of active book rentals (in accepted status):</strong> {{ $activeRentals }}</p>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <h2>List of Genres</h2>
            <hr>
            <ul class="list-group">
                @foreach($genres as $genre)
                <li class="list-group-item"><a
                        href="{{ route('books.listBooksByGenre', $genre->id) }}">{{ $genre->name }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection