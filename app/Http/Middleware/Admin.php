<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
use Auth;

class Admin
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
    	$curresntUser = Auth::user();
	    $isAdmin = $curresntUser->isAdmin;
    	if(!empty($curresntUser)){
    		//admin middleware
    		if($isAdmin !=1){
    			//require security updates?
			    return Redirect::route('index');
		    }
	    }
        return $next($request);
    }
}
