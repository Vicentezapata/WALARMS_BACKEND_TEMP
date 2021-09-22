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
        '/users/index','users/store','/users/update','/users/delete','/users/login','/users/indexForAproveEvent',
        /*Header API ROUTES*/
        '/header/index','/respalarms/index',
        /*Activities API ROUTES*/
        '/activity/store','/activity/index','/activity/detailByDate','/activity/delete','/activity/update','/activity/indexListActivities',
        '/activity/indexListActivitiesByDate','/activity/indexListActivitiesByFilter','/activity/indexForAproveEvent','/activity/updateByNotification','/activity/updateFinishEvent',
        '/activity/indexApprove','/activity/approve','/activity/indexAllApprove','/activity/updateForApprove',
        /*Bitacora API ROUTES*/
        '/bitacora/index','/bitacora/indexByDate','/bitacora/indexByFilter','/bitacora/indexByActivitySelected'
    ];
}
