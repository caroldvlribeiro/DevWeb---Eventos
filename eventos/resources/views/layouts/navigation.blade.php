
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">

    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
            Sistema de Eventos
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('eventos.index') }}">
                        Eventos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.edit') }}">
                        Perfil
                    </a>
                </li>

            </ul>

            <span class="navbar-text me-3 text-white">
                {{ Auth::user()->name }}
            </span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                        class="btn btn-outline-light">
                    Sair
                </button>
            </form>

        </div>

    </div>

</nav>