<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function setLanguage($lang){
        session()->put('local',$lang);
        return redirect()->back();
    }
}
