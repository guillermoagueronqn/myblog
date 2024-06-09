<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    /**
     * Setea el lenguaje de la aplicación con el lenguaje pasado por parámetro y luego redirige al usuario a la página 
     * donde estaba.
     */
    public function setLocale($lang){
        if (in_array($lang, ['en', 'es'])){
            App::setLocale($lang);
            Session::put('locale', $lang);
        }
        return back();
    }
}