<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
<<<<<<< HEAD
        // dd($request);
        // dump($request);
        // dd($request->path());
        // dd($request->expectsJson());
        if ($request->expectsJson()) {
            return route('login');
            // return '/api/unauthorized';
=======
        if (! $request->expectsJson()) {
            return route('login');
>>>>>>> 836605326ef9beb21bf22ae1fcd7a2a4ffc0e9a9
        }
        // return route($request->path());
    }
}
