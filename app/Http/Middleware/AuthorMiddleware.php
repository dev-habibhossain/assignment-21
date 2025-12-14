<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the 'role' key exists AND if its value is NOT 'author'.
        // If the role is missing OR the role is not 'author', deny access.
        if (
            !$request->session()->has('role') ||
            $request->session()->get('role') !== 'author'
        ) {
            // Redirect the user to an appropriate fallback route, 
            // which you have set as 'admin.home'
            return redirect()->route('admin.home');
        }

        // The user is an author, proceed to the requested route.
        return $next($request);
    }
}