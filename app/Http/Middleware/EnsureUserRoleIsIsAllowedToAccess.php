<?php

namespace App\Http\Middleware;

use App\Models\user\roleAx;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserRoleIsIsAllowedToAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $userRole=auth()->user()->role;
            $currentRouteName=Route::currentRouteName();
//            dd($userRole);
            if (in_array($currentRouteName,$this->userAccessRole()[$userRole]))
            {
                return $next($request);
            }
            else
            {
//                abort(403,'شما مجاز به استفاده از این صفحه نیستید');
                return redirect('/');

            }
        }
        catch (\Throwable $th)
        {
//            abort(403,'شما به این صفحه دسترسی ندارید');
            return redirect('/');

        }
    }
    private function userAccessRole()
    {
//        dd('hi');
        $data=roleAx::with('GiveRouteFromRoleAx')->get();
//        $data=roleAx::with('GiveRouteFromRoleAx')->groupBy(['role_id','role_access'])->get();
//            dd($data);
        foreach ($data as $k=>$item)
        {
            if ($item->GiveRouteFromRoleAx->route_address != null)
            {
                $ax[$item->role_id][]=$item->GiveRouteFromRoleAx->route_address;
            }
//                dump($item->GiveRouteFromRoleAx->route_address);
        }
//            dump($ax);
        return $ax;
    }

}
