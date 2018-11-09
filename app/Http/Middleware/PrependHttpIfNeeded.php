<?php

namespace App\Http\Middleware;

use Closure;

class PrependHttpIfNeeded
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Prepend "http://"" if the url doesn't have protocol.
        if (!preg_match("~^(?:f|ht)tps?://~i", $request->long_url))
            $request->merge(['long_url' => "http://" . $request->long_url]);

        return $next($request);
    }
}
