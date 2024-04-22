@extends("layouts.main")
@section('content')
<div class="container">
    <h1>Genre List</h1>
    <div class="row">
        @foreach($genres as $genre)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $genre->name }}</h5>
                    <p class="card-text"><strong>Style:</strong> {{ $genre->style }}</p>
                    <div class="btn-group mt-4">
                        <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-sm btn-primary me-1"
                            style="border-radius: 5px;">Edit</a>
                        <form action="{{ route('genres.delete', $genre->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger ms-1">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <a href="{{ route('genres.renderAddNewGenre') }}" class="btn btn-success mt-3">Add New Genre</a>
</div>
@endsection