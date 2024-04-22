@extends('layouts.main')
@section('content')
<div class="container py-3">
    <h2>Edit genre</h2>
    <form action="{{ route('genres.update',$genre->id) }}" method="post">
        @csrf
        @method("PUT")
        <div class="mb-3">
            <label class="form-label" for="name">Genre name</label>
            <input value="{{ old('name', isset($genre) ? $genre->name : '') }}" name="name" type="text"
                class="form-control @error('name') is-invalid @enderror" id="name" placeholder="">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="style">Genre style</label>
            <select name="style" class="form-control @error('style') is-invalid @enderror" id="style">
                <option value="primary" {{ old('style', $genre->style) == 'primary' ? 'selected' : '' }}>Primary
                </option>
                <option value="secondary" {{ old('style', $genre->style) == 'secondary' ? 'selected' : '' }}>Secondary
                </option>
                <option value="success" {{ old('style', $genre->style) == 'success' ? 'selected' : '' }}>Success
                </option>
                <option value="danger" {{ old('style', $genre->style) == 'danger' ? 'selected' : '' }}>Danger</option>
                <option value="warning" {{ old('style', $genre->style) == 'warning' ? 'selected' : '' }}>Warning
                </option>
                <option value="info" {{ old('style', $genre->style) == 'info' ? 'selected' : '' }}>Info</option>
                <option value="light" {{ old('style', $genre->style) == 'light' ? 'selected' : '' }}>Light</option>
                <option value="dark" {{ old('style', $genre->style) == 'dark' ? 'selected' : '' }}>Dark</option>
            </select>
            @error('style')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update genre</button>
        </div>

    </form>
</div>
@endsection