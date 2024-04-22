@extends("layouts.main")
@section('content')
<div class="container mt-5">
    <h2>Rental Details</h2>
    <hr>
    <?php $book = \App\Models\Book::find($rental->book_id); ?>
    <div class="row">
        <div class="col">
            <!-- Display rental details -->
            <h4>Rental Details</h4>
            <p>Book Title: {{ $book->title }}</p>
            <p>Author: {{ $book->author }}</p>
            <p>Date of Rental: {{ $book->created_at }}</p>
            <p>Deadline: {{ $rental->deadline }}</p>
            <!-- Display form for librarian -->
            <h4>Change Status and Set Deadline</h4>
            <form method="POST" action="{{ route('rental.update', $rental->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" id="status" name="status">
                        <option value="PENDING" {{ $rental->status === 'PENDING' ? 'selected' : '' }}>Pending</option>
                        <option value="ACCEPTED" {{ $rental->status === 'ACCEPTED' ? 'selected' : '' }}>Accepted
                        </option>
                        <option value="REJECTED" {{ $rental->status === 'REJECTED' ? 'selected' : '' }}>Rejected
                        </option>
                        <option value="RETURNED" {{ $rental->status === 'RETURNED' ? 'selected' : '' }}>Returned
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="deadline">Deadline:</label>
                    <input type="datetime-local" class="form-control" id="deadline" name="deadline"
                        value="{{ old('deadline', $rental->deadline ? \Carbon\Carbon::parse($rental->deadline)->format('Y-m-d\TH:i') : '') }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <!-- Display validation errors -->
            @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection