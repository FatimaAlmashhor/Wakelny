<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class OnlineMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $currentTime = (string)(new \DateTime())->format('Y-m-d H:i:s');
        $users_to_offline = User::where('last_activity', '<', ". $currentTime. ")->first();
        $users_to_online = User::where('last_activity', '>=', ". $currentTime. ")->fisrt();
        if (isset($users_to_offline)) {
            $users_to_offline->update(['is_online' => 0])->touch();
        }
        if (isset($users_to_online)) {
            $users_to_online->update(['is_online' => 1])->touch();
        }
        if (auth()->check()) {
            $cache_value = Cache::put('user-is-online', auth()->id(), \Carbon\Carbon::now()->addMinutes(1));
            $user = User::find(Cache::get('user-is-online'));
            $user->last_activity = now()->addMinutes(1);
            $user->is_online = true;
            $user->save();
        } elseif (!auth()->check() and filled(Cache::get('user-is-online'))) {
            $user = User::find(Cache::get('user-is-online'));
            if (isset($user)) {
                $user->is_online = false;
                $user->save();
            }
        }
        return $next($request);
    }
}