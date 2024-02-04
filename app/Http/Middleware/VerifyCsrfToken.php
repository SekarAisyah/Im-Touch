<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'pelatihan/create',
<<<<<<< HEAD
        'report-pelatihan/search',
        '/register',
        '/',
        '/dashboard'
=======
        'report-pelatihan/search'

>>>>>>> 836605326ef9beb21bf22ae1fcd7a2a4ffc0e9a9


    ];
}
