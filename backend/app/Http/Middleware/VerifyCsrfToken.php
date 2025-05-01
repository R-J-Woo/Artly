<?php

namespace App\Http\Middleware;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware; use Closure;

class VerifyCsrfToken extends Middleware
{
    /**
    * Indicates whether the XSRF-TOKEN cookie should be set on the response.
    *
    * @var bool
    */
    protected $addHttpCookie = true;
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->header('P3P', 'CP="IDC DSP COR ADM DEVI TATi PSA PSD IVAi IVDi CON HIS OUR IND CNT');
        return $response;
    }
    /**
    *The URIS that should be excluded from CSRF verification.
    *
    * @var array
    */
    protected $except = [
        '/gallerys',
        '/users',
        '/exhibitions',
    ];
}