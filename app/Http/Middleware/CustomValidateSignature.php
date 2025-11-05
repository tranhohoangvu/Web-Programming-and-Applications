<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Exceptions\InvalidSignatureException;
use Illuminate\Routing\Middleware\ValidateSignature as Middleware;

class CustomValidateSignature extends Middleware
{
    public function handle($request, Closure $next, ...$parameters)
    {
        try {
            return parent::handle($request, $next, ...$parameters);
        } catch (InvalidSignatureException $exception) {
            // Customize your response here
            return response()->view('errors.invalid_signature', [], 403);
        }
    }
}
