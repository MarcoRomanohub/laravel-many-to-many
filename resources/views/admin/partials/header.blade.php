<header>
    <nav class="navbar-nav navbar-dark bg-dark">
        <div class="container-fluid">

            <div class="collapse navbar-collapse d-flex justify-content-between " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-lg-0">
                    {{-- <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('admin.home') }}">Home</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="{{ route('home') }}">Vai al sito</a>
                    </li>
                </ul>
                <ul class="navbar-nav text-white  mb-lg-0">
                    <li>
                        {{ Auth::user()->name }}
                    </li>
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
