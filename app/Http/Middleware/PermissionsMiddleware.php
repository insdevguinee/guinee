<?php
 
namespace App\Http\Middleware;
 
use Closure;
use Auth;
use App\Permission;
use Illuminate\Http\Request;


class PermissionsMiddleware
{
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $_adminPannel = 'tableau-bord/';

    public function __construct()
    {
        if (!Auth::user()->hasPermissionTo('access_admin'))
            return back();        
    }

    public function handle($request, Closure $next)
    {
        if (Auth::user()->hasRole('Admin')) 
        {
            return $next($request);
        }else{
            foreach (Permission::getModels() as $model) {
                if ($model == 'access_admin') continue;
                $this->AutorisationUser($request, $model , $next);     
            }
        }
        return $next($request);
    }


    private function AutorisationUser($request, $modelName, $next)
    {
        if ($request->is($this->_adminPannel.$modelName.'/create'))
        {
            if (!Auth::user()->hasPermissionTo('add_'.$modelName))
            {
               return back();
            } 
            else {
               return $next($request);
            }
        }

        if ($request->method() === 'GET' AND $request->is($this->_adminPannel.$modelName) )
        {
            if (!Auth::user()->hasPermissionTo('view_'.$modelName))
            {

               return back();
            } 
            else {

               return $next($request);
            }
        }

        if ($request->method() === 'PUT')
        {    
            if (!Auth::user()->hasPermissionTo('edit_'.$modelName))
            {
                // dd($modelName);

               return back();
            } 
            else {
               return $next($request);
            }
        }

        if ($request->method() == 'DELETE')
        {
            if (!Auth::user()->hasPermissionTo('delete_'.@$modelName))
            {
               return back();
            } 
            else {
               return $next($request);
            }
        }
    }
}