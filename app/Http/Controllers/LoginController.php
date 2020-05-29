<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Fornecedores;
use App\Models\Pedidos;
use App\Models\Servicos;
use App\Models\Status;
use App\Models\Usuarios;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            $login = $request->login;
            $senha = $request->senha;
            $pessoa = Usuarios::where('login', $login)->first();
            
            if(!$pessoa){
                return response()->json(false);
            }
            if($pessoa->senha == $senha){
                return '987653456875765';
            }
            else{
                return response()->json(false);
            }
        } catch (\Throwable $th) {
            return response()->json(false);
        }
    }

    public function retornaHome($codigoAcesso)
    {
        try {
            if($codigoAcesso == 987653456875765 || $codigoAcesso == '987653456875765'){
                return view('home');
            }
            else{
                return 'Não Autorizado';
            }
        } catch (\Throwable $th) {
            return false;
        }
    }
}
