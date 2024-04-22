<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://bootswatch.com/5/united/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/profile">Profile</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/addNewBook">Add Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/genres">List Genres</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/myRental">My rental</a>
                    </li>
                    @endauth
                    <li class="nav-item position-absolute top-0 end-0">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <!-- Adjusted width to col-md-8 for wider input field -->
                                    <form action="{{ route('search.books') }}" method="GET">
                                        <div class="input-group mb-3">
                                            <select class="form-select" name="criteria"
                                                aria-label="Select search criteria">
                                                <option value="title">Title</option>
                                                <option value="author">Author</option>
                                            </select>
                                            <input type="text" class="form-control" name="query" placeholder="Search"
                                                aria-label="Search" aria-describedby="button-addon2">
                                            <button class="btn btn-primary" type="submit" id="button-addon2">Go</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </ul>
            </div>
        </div>
    </nav>


    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <footer class="footer mt-auto py-3 bg-dark text-white mt-5 ">
        <div class="container text-center">
            <span>Copyright &copy; 2024 Taiga Mizutani</span>
        </div>
    </footer>

</body>

</html>