<?php

namespace App\Http\Middleware;

use Closure;
use \JWTAuth;
use Exception;

/**
 * 
 */
class authJWT{
	
	public function handle($request, Closure $next)
	{		
		// dd($request->headers);
		if($request->headers->has('Authorization'))
		{
			try
			{								
				if ($token = \JWTAuth::parseToken()) {
                	return $next($request)->header('Authorization', 'Bearer ' . \JWTAuth::getToken());
            	}
			}
			catch(Exception $e)
			{				
				return redirect('dtes/login');
			}			
		}
		
		return $next($request);		
			return redirect('dtes/login');
	}
}

