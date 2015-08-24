<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ('testing' !== app()->environment())
    	{
    		//dd(app()->environment());
    		$skips = [
            	'mobileLogin',
            	'mobileRegister',
                'stage/getStageList',
                'stage/getCategoryList',
                'question/getQAList',
                'questions',
                'question/uploadResult',
                'rank',
    		];
    		foreach ($skips as $route) {
    			if ($request->is($route)) {
    				return $this->addCookieToResponse($request, $next($request));
    			}
    		}
       		return parent::handle($request, $next);
    	}
    	return $next($request);
	}

}
