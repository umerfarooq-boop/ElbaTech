<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function change(Request $request)
{
    $lang = $request->lang;
    
    if (!in_array($lang, ['en', 'it', 'fr'])) {
        abort(400);
    }

    session()->put('locale', $lang);
    App::setLocale($lang); // Apply the locale immediately

    return redirect()->back();
}

}
