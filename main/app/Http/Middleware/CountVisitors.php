<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CountVisitors
{
    public function handle(Request $request, Closure $next)
    {
        $visitorCount1 = DB::table('visitor_counts')->latest('id')->first();   
        $ipAddress = $request->ip();
        if ($visitorCount1) {
            DB::table('visitor_counts')->insert([
                'count' => ($visitorCount1->count + 1),
                'last_visited_at' => now(),
                'ip' => $ipAddress,
            ]);
        } else {
            DB::table('visitor_counts')->insert([
                'count' => 1,
                'last_visited_at' => now(),
                'ip' => $ipAddress,
            ]);
        }
        return $next($request);
    }
}
