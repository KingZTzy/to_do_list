<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('Dashboard') }}">Belajar||Laravel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link {{ ($title == "Dashboard") ? 'active' : '' }}" aria-current="page" href="{{ route('Dashboard') }}"> Dashboard </a>
                </li>
                <li class="nav-item">
                <a class="nav-link {{ ($title == "To-Do-List") ? 'active' : '' }}" href="{{ route('ToDoList') }}"> To Do List </a>
                </li>
                <li class="nav-item">
                <a class="nav-link {{ ($title == "About") ? 'active' : '' }}" href="{{ route('About') }}"> About </a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                @auth                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Selamat Datang Masbro, <b>{{ auth()->user()->name }}</b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('Dashboard') }}"> <i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="bi bi-box-arrow-in-left"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>