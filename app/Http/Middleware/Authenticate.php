<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // return $request->expectsJson() ? null : route('login');
        if (!$request->expectsJson()) {
          if (!Auth::guard('etudiant')->check()) {
              return route('etudiant.loginForm');
          }
          elseif(!Auth::guard('enseignant')->check()) {
            return route('usms.loginForm');
          }
          elseif(!Auth::guard('web')->check()) {
            return route('usms.loginForm');
          }
          else {
              return route('selection');
          }
      }
    }
}
