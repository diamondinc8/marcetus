<?php

namespace App\Http\Middleware;

use App\Models\Seller;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsSeller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('home')->with('error', 'Прежде чем начать войдите в систему!');
        }
        $userId = Auth::id();

        $isSeller = Seller::where('founder_id', $userId)->exists();

        if (!$isSeller) {
            return redirect()->route('seller.index')->with('error', 'Доступ разрешен только продавцам. Зарегистрируйтесь как продавец!');
        }

        return $next($request);
    }
}
