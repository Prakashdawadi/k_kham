<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class admin
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
                    if($request->session()->has('ADMIN_LOGIN')){
                            
                                  }else{
                                   
                                 $request->session()->flash('error','please login to continue');
                                    return redirect('admin');
                                }
        return $next($request);
    }
}