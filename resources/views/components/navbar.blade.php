<header class="header bg-warning py-3">
    <nav class="navbar navbar-expand-lg navbar-light">

        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img class="logo mr-3" src="{{ asset('img/logoBarra.png') }}" alt="logoBarra" style="width: 50px; height: 50px;">
                <h2 class="tituloLogo m-0">SGP</h2>
            </a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('nosotros') }}">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contactos') }}">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
