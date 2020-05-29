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
use App\Imports\ArquivoImportacao;
use Excel;

class ImportExcelController extends Controller
{
    public function importarClientes(Request $request)
    {
        try {
            $data = Excel::toArray(new ArquivoImportacao, $request->file('arquivoClientes'));
            foreach($data as $values)
            {
                for($i=1; $i< count($values); $i++)
                {
                    $cliente = new Cliente;
                    $cliente->desc_cliente = $values[$i][0];
                    $cliente->hash = $values[$i][1];
                    $cliente->save();
                }
            }
            return response()->json('Registro salvo com sucesso.');
        } catch (\Throwable $th) {
            return response()->json(false);
        }
    }

    public function importarPedidos(Request $request)
    {
        try {
            $data = Excel::toArray(new ArquivoImportacao, $request->file('arquivoPedidos'));
            foreach($data as $values)
            {
                for($i=1; $i< count($values); $i++)
                {
                    $pedidos = new Pedidos;
                    $pedidos->nome_produto = $values[$i][0];
                    $pedidos->quantidade = $values[$i][1];
                    $pedidos->valor = $values[$i][2];
                    $pedidos->id_fornecedor = $values[$i][3];
                    $pedidos->save();
                }
            }
            return response()->json('Registro salvo com sucesso.');
        } catch (\Throwable $th) {
            return response()->json(false);
        }
    }

    public function importarFornecedores(Request $request)
    {
        try {
            $data = Excel::toArray(new ArquivoImportacao, $request->file('arquivoFornecedores'));
            foreach($data as $values)
            {
                for($i=1; $i< count($values); $i++)
                {
                    $fornecedor = new Fornecedores;
                    $fornecedor->nome_fornecedor = $values[$i][0];
                    $fornecedor->save();
                }
            }
            return response()->json('Registro salvo com sucesso.');
        } catch (\Throwable $th) {
            return response()->json(false);
        }
    }

    public function importarServicos(Request $request)
    {
        try {
            $data = Excel::toArray(new ArquivoImportacao, $request->file('arquivoServicos'));
            foreach($data as $values)
            {
                for($i=1; $i< count($values); $i++)
                {
                    $novoPedido = new Servicos;
                    $novoPedido->nome_servico = $values[$i][0];
                    $novoPedido->id_cliente = $values[$i][1];
                    $novoPedido->quantidade = $values[$i][2];
                    $novoPedido->cd_status = 1;
                    $novoPedido->save();
                }
            }
            return response()->json('Registro salvo com sucesso.');
        } catch (\Throwable $th) {
            return response()->json(false);
        }
    }
}
