<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Fornecedores;
use App\Models\Pedidos;
use App\Models\Servicos;
use App\Models\Status;
use App\Models\Usuarios;

class FornecedoresController extends Controller
{
    public function cadastrarFornecedor(Request $request)
    {
        try {
            $fornecedor = new Fornecedores;
            $fornecedor->nome_fornecedor = $request->nome_fornecedor;
            $fornecedor->save();
            return response()->json('Registro salvo com sucesso.');
        } catch (\Throwable $th) {
            return response()->json(false);
        }
    }

    public function listarFornecedores()
    {
        try {
            $fornecedores = Fornecedores::get();
            return $fornecedores;
        } catch (\Throwable $th) {
            return response()->json(false);
        }
    }
}
