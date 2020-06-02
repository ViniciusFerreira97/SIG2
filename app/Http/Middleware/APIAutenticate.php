<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Cliente;
use Illuminate\Support\Facades\Route;

class APIAutenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        // $acesso = Cliente::where('hash', $request->keyAcesso)->first();
        // if(!$acesso)
        // {
        //     return response()->json('Não Autorizado.');
        // }
        return $next($request);
    }
}
