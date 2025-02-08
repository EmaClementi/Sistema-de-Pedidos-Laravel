<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LanguageMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el idioma fue enviado como parámetro en la URL
        if ($request->has('lang')) {
            $lang = $request->input('lang');

            // Guarda el idioma en la sesión
            Session::put('lang', $lang);

            // Establece el idioma en la aplicación
            App::setLocale($lang);
        } elseif (Session::has('lang')) {
            // Usa el idioma almacenado en la sesión si no hay parámetro en la URL
            App::setLocale(Session::get('lang'));
        }

        return $next($request);
    }
}