<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class vendor
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

         if($request->session()->has('VENDOR_LOGIN')){
                            
                                  }else{
                                   
                                 $request->session()->flash('error','please login to continue');
                                    return redirect('vendor/login');
                                }
        return $next($request);
    }
}
