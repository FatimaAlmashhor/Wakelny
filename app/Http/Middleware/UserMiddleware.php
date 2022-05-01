<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(Auth::check() && !Auth::user()->is_active){

            $banned =Auth::user()->is_active==0;
            Auth::logout();
            $message = '';
            if($banned==1){
                $message='حسابك قد تم حظره. منفضلك راجع مدير الموقع' ;
            }

            return redirect()->route('login')
            ->with('status',$message)
            ->withErrors(['email'=>'لقد تم حظر حسابك من قبل المدير']);


        }
        return $next($request);

    }
}
