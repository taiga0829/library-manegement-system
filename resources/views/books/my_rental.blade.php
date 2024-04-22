@extends("layouts.main")
@section('content')
<div class="container mt-5">
    <h2>Rental Lists</h2>
    <hr>
    <div class="row">
        <div class="col">
            <h4>Rental Requests with PENDING status</h4>
            <ul class="list-group">
                @foreach($pendingRentals as $rental)
                <li class="list-group-item">
                    <a href="{{ route('rental.details', $rental->id) }}">
                        {{ $rental->book->title }} by {{ $rental->book->author }}
                    </a>
                    - Date of Rental: {{ $rental->created_at }}, Deadline: {{ $rental->deadline }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <h4>Accepted and In-Time Rentals</h4>
            <ul class="list-group">
                @foreach($acceptedInTimeRentals as $rental)
                <li class="list-group-item">
                    <a href="{{ route('rental.detail', $rental->id) }}">
                        {{ $rental->book->title }} by {{ $rental->book->author }}
                    </a>
                    - Date of Rental: {{ $rental->created_at }}, Deadline: {{ $rental->deadline }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- Repeat the same structure for other rental lists -->
</div>
@endsection