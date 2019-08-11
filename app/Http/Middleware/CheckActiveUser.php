<?php

namespace App\Http\Middleware;

use Closure;

class CheckActiveUser
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
        // Lay ra thông tin của Admin vừa đăng nhập
        $user = $request->user();

        // Kiểm tra user có được active không
        if ($user->is_active == 0) {

            // Nếu không quay về đăng nhập
            return abort(403, 'Không có quyền truy cập');
        }

        return $next($request);
    }
}
