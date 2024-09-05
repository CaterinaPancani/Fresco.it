<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class LanguageMiddelware
{
    public function handle(Request $request, Closure $next): Response
    {
        $localLanguage = session('local','it');
        App::setLocale($localLanguage);
        return $next($request);
    }
}
