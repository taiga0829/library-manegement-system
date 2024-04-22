@extends('layouts.main')
@section('content')
<div class="container">
    <h1>Add New Book</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('books.store') }}">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="authors">Authors</label>
            <input type="text" id="authors" name="authors" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="released_at">Released At</label>
            <input type="date" id="released_at" name="released_at" class="form-control" value="{{ old('title') }}"
                required>
        </div>

        <div class="form-group">
            <label for="pages">Pages</label>
            <input type="number" id="pages" name="pages" class="form-control" value="{{ old('title') }}" required
                min="1">
        </div>

        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" id="isbn" name="isbn" class="form-control" value="{{ old('isbn') }}" required
                pattern="^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" value="{{ old('description') }}"
                class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="language_code">Language Code:</label>
            <input type="text" id="language_code" name="language_code" placeholder="Enter language code"
                value="{{ old('language_code',"HU") }}" required>
        </div>


        <div class="form-group">
            <label for="genres">Genres</label><br>
            <input type="checkbox" id="genre1" name="genres[]" value="1">
            <label for="genre1">Genre 1</label><br>
            <input type="checkbox" id="genre2" name="genres[]" value="2">
            <label for="genre2">Genre 2</label><br>
            <!-- Add more genres if needed -->
        </div>

        <div class="form-group">
            <label for="in_stock">In Stock</label>
            <input type="number" id="in_stock" name="in_stock" class="form-control" value="{{ old('in_stock') }}"
                required min="0">
        </div>

        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
</div>
@endsection