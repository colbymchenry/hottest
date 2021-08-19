<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Illuminate\Http\Request;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    // TODO: May need to add this back
//    protected function tokensMatch($request)
//    {
//        $token = $request->input('_token') ?: $request->header('X-CSRF-TOKEN');
//
//        if (!$token && $header = $request->header('X-XSRF-TOKEN')) {
//            $token = $this->encrypter->decrypt($header);
//        }
//
//        $tokensMatch = $request->session()->token() == $token;
//
//        if($tokensMatch) $request->session()->regenerateToken();
//
//        return $tokensMatch;
//    }


}
