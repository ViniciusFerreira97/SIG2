<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Fornecedores;
use App\Models\Pedidos;
use App\Models\Servicos;
use App\Models\Status;
use App\Models\Usuarios;

class PedidosController extends Controller
{
    public function cadastrarPedido(Request $request)
    {
        try {
            $pedidos = new Pedidos;
            $pedidos->nome_produto = $request->nome_produto;
            $pedidos->quantidade = $request->quantidade;
            $pedidos->valor = $request->valor;
            $pedidos->id_fornecedor = $request->id_fornecedor;
            $pedidos->save();
            return response()->json('Registro salvo com sucesso.');
        } catch (\Throwable $th) {
            return response()->json(false);
        }
    }

    public function listarPedidos()
    {
        try {
            $pedidos = Pedidos::join('fornecedores', 'fornecedores.id_fornecedor', '=', 'pedidos.id_fornecedor')->get();
            return response()->json($pedidos);
        } catch (\Throwable $th) {
            return response()->json(false);
        }
    }
}
