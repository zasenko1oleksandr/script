<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Tracker;
use Symfony\Component\HttpFoundation\Response;

class TrackVisit
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        Tracker::create([
            'page'        => $request->path(),
            'route_name'  => $request->route()?->getName(),
            'ip'          => $request->ip(),
            'method'      => $request->method(),
            'status_code' => $response->getStatusCode(),
            'visited_at'  => now(),
        ]);

        return $response;
    }
}
