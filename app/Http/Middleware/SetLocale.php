<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        // Obtener el idioma de la sesión o usar un predeterminado (español)
        $locale = $request->query('lang', Session::get('locale', 'es'));

        // Guardar el idioma en la sesión
        Session::put('locale', $locale);

        // Establecer el idioma para la aplicación
        App::setLocale($locale);

        return $next($request);
    }
}
