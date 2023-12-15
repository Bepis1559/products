<?php

namespace App\Http\Middleware;

use Log;
use Closure;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckProductOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // DDD($request);
        $productId = $request->route('id');

        $product = Product::findOrFail($productId);



        if (auth()->user()->id !== $product->user_id && !auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
