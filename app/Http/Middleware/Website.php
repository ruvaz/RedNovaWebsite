<?php namespace App\Http\Middleware;

use Closure;

class Website {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{		
		if($request->segment(1) == "en" || $request->segment(1) == "es"){
			\App::setLocale($request->segment(1));			
			return $next($request);
		}
		return redirect("/");
	}

}
