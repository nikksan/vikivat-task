<?php

namespace App\Http\Middleware;

use Closure;
use App\Image;
use Auth;

class CheckOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        $image = Image::where('id', $request->route('image_id'))->firstOrFail();

        if($image->user_id !== Auth::id()){
            abort(404);
        }
        
        return $next($request);
    }
}
