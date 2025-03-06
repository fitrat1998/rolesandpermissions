<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function changeLocale($locale)
    {
        if (in_array($locale, ['uz', 'ru', 'en'])) {
            session(['locale' => $locale]);
            App::setLocale($locale);
        }

        return redirect()->back();
    }
}
