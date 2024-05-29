<header class="bg-dark">
    <nav class="navbar-nav navbar-dark bg-dark h-100">
        <div class="container-fluid h-100">

            <div class="collapse navbar-collapse d-flex justify-content-between align-items-center h-100 "
                id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-lg-0">
                    {{-- <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('admin.home') }}">Home</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="{{ route('home') }}">Vai al sito</a>
                    </li>
                </ul>

                <form action="{{ route('admin.projects.index') }}" method="GET" class="d-flex me-3 w-25"
                    role="search">
                    <input name="toSearch" class="form-control me-2" type="search" placeholder="Search"
                        aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

                <p class="text-white username px-4">{{ Auth::user()->name }}</p>

                <ul class="navbar-nav text-white mb-lg-0">
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class=" btn btn-danger " type="submit">LogOut</button>
                        </form>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</header>
