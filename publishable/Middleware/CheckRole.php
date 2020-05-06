<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        if($request->user() === null){
            return abort(403, 'Unauthorized action. Contact Administrator');
        }
        $actions=$request->route()->getAction();
        $controllerAction = class_basename($actions['controller']);
        // $myrole=$request->user()->roles()->first()['name'];
        if($request->user()->hasPermission($controllerAction)){
            return $next($request);
        }
       
        return abort(403, ' Abort Unauthorized action. Contact Administrator');         
    }
}
