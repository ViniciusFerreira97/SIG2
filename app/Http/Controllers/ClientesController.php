<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Fornecedores;
use App\Models\Pedidos;
use App\Models\Servicos;
use App\Models\Status;
use App\Models\Usuarios;

class ClientesController extends Controller
{
    public function cadastrarCliente(Request $request)
    {
        try {
            $cliente = new Cliente;
            $cliente->desc_cliente = $request->desc_cliente;
            $cliente->hash = $request->hash;
            $cliente->save();
            return response()->json('Registro salvo com sucesso.');
        } catch (\Throwable $th) {
            return response()->json(false);
        }
    }

    public function listarCliente()
    {
        try {
            $cliente = Cliente::get();
            return $cliente;
        } catch (\Throwable $th) {
            return response()->json(false);
        }
    }
}
