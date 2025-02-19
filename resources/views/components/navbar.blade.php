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
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">{{ __('messages.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('nosotros') }}">{{ __('messages.about_us') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contactos') }}">{{ __('messages.contact') }}</a>
                    </li>
                </ul>
                
                <form action="{{ route('locale.change') }}" method="POST" class="ms-auto">
                    @csrf
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <img src="{{ app()->getlocale() == 'es' ? asset('img/banderaArg.png') : asset('img/banderaEEUU.png') }}" width="20">
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <button type="submit" name="locale" value="es" class="dropdown-item">
                                    <img src="{{ asset('img/banderaArg.png') }}" width="20">  {{ __('messages.spanish')}}
                                </button>
                            </li>
                            <li>
                                <button type="submit" name="locale" value="en" class="dropdown-item">
                                    <img src="{{ asset('img/banderaEEUU.png') }}" width="20">  {{ __('messages.english')}}
                                </button>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
            
        </div>
    </nav>
</header>
