<?php
/**
 *   Stake iGaming platform
 *   ----------------------
 *   CheckPermissions.php
 * 
 *   @copyright  Copyright (c) Casino, All rights reserved
 *   @author     Casino <info@casino.com>
 *   @see        https://casino.com
*/

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermissions
{
    
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        $module = $request->segment(3);

        if (($request->getMethod() == 'GET' && !$user->hasReadOnlyAccess($module)) || ($request->getMethod() != 'GET' && !$user->hasFullAccess($module))) {
            abort(403, __('You do not have permissions to complete this operation.'));
        }

        return $next($request);
    }
}
