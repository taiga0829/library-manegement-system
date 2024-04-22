@extends("layouts.main")

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">User Information</h5>
                    <hr>
                    <div class="mb-3">
                        <label for="name" class="form-label">User's name:</label>
                        <p class="form-control" id="name">{{ $name }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">User's Email:</label>
                        <p class="form-control" id="email">{{ $email }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">User's role:</label>
                        <p class="form-control" id="role">{{ $role }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection