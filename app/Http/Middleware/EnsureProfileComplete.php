<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureProfileComplete
{
    /**
     * Handle an incoming request.
     * Redirect to step 2 registration if required profile fields are not filled.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user && !$user->isProfileComplete()) {
            // Hindari redirect loop: jangan redirect jika sudah di halaman step 2
            if (!$request->routeIs('asesi.registerStepTwo') && !$request->routeIs('registeraddtionalpost')) {
                return redirect()->route('asesi.registerStepTwo')
                    ->with('info', 'Silakan lengkapi data profil Anda terlebih dahulu.');
            }
        }

        return $next($request);
    }
}
