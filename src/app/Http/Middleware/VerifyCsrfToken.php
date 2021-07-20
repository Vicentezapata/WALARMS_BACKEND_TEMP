<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

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
        /*Users API ROUTES*/
        '/users/index','users/store','/users/update','/users/delete','/users/login',
        /*Cocktail API ROUTES*/
        '/cocktail/index','cocktail/store','/cocktail/update','/cocktail/delete','/cocktail/getAllRecipe',
        /*Cocktail API ROUTES*/
        '/ingredient/index','ingredient/store','/ingredient/update','/ingredient/delete',
    ];
}
