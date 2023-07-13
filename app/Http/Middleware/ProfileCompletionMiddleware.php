<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProfileCompletionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->profileCompletionPercentage() < 100) {
          return redirect()->route("etudiant.profile")->with('errorCompleteProfile', 'Merci de compléter votre profile avant de postuler a une formation universitaire.');

        }

        return $next($request);
    }
}
