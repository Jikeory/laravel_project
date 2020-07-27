<?php

namespace App\Http\Middleware;

use Closure;

class XSS
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
        $action = $request->getRequestUri();
        echo $action;die;
        $input = $request->all();
        array_walk_recursive($input, function (&$input) {
            $input = strip_tags($input);
        });
        foreach ($input as $key => &$value) {
            if (!is_array($value)) {
                $value = str_ireplace('\\', ' ', $value);
                $value = str_ireplace("'", "\'", $value);
                $value = str_ireplace('extractvalue', '', $value);
                $value = str_ireplace('updatexml', '', $value);
                $value = str_ireplace('floor(', '', $value);
                $value = str_ireplace('exp(', '', $value);
                $value = str_ireplace('GeometryCollection', '', $value);
                $value = str_ireplace('polygon', '', $value);
                $value = str_ireplace('multipoint', '', $value);
                $value = str_ireplace('multilinestring', '', $value);
                $value = str_ireplace('linestring', '', $value);
                $value = str_ireplace('multipolygon', '', $value);
            }
        }
        $request->merge($input);
        return $next($request);
    }
}
