<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function change_language($lang ='es')
    {
        App::setLocale($lang);
        session()->put('locale', $lang);

        return redirect()->back();
    }
}
