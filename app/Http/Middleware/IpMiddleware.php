<?php

namespace App\Http\Middleware;

use Closure;
use Request;
class IpMiddleware
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
        function getRealIpAddr()
        {
            if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
            {
                $ip=$_SERVER['HTTP_CLIENT_IP'];
            }
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
            {
                $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            else
            {
                $ip=$_SERVER['REMOTE_ADDR'];
            }
            return $ip;
        }
        //122.176.111.243
        if (getRealIpAddr() != "122.162.77.124"  ) {
            // here insted checking single ip address we can do collection of ip
            //address in constant file and check with in_array function
            return redirect('http://www.olmeccosmeticsurgery.com/meet-your-surgeon/');
        }

        return $next($request);
    }
}
