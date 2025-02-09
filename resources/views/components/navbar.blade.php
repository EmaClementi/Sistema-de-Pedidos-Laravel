<header class="header bg-warning py-3">
    <nav class="navbar navbar-expand-lg navbar-light">

        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img class="logo mr-3" src="{{ asset('img/logoBarra.png') }}" alt="logoBarra" style="width: 50px; height: 50px;">
                <h2 class="tituloLogo m-0">SGP</h2>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">{{__('messages.home')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('nosotros') }}">{{ __('messages.about_us')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contactos') }}">{{ __('messages.contact')}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
