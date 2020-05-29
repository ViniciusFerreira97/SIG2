<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Fornecedores;
use App\Models\Pedidos;
use App\Models\Servicos;
use App\Models\Status;
use App\Models\Usuarios;
use DB;
use Mail;

class ServicosController extends Controller
{
    public function novoServico(Request $request)
    {
        try {
            $acesso = Cliente::where('hash', $request->keyAcesso)->first();
            $novoPedido = new Servicos;
            $novoPedido->nome_servico = $request->descricao;
            $novoPedido->id_cliente = $acesso->id_cliente;
            $novoPedido->quantidade = $request->quantidade;
            $novoPedido->cd_status = 1;
            $novoPedido->save();

            $this->gerarBoleto($novoPedido->id_cliente, $novoPedido->id_servico, $novoPedido->quantidade);
            
            return response()->json('Pedido realizado e boleto para pagamento enviado no e-mail.');
        } catch (\Throwable $th) {
            return response()->json(false);
        }
    }

    public function novoServicoSistema(Request $request)
    {
        // try {
            $novoPedido = new Servicos;
            $novoPedido->nome_servico = $request->descricao;
            $novoPedido->id_cliente = $request->id_cliente;
            $novoPedido->quantidade = $request->quantidade;
            $novoPedido->cd_status = 1;
            $novoPedido->save();

            $this->gerarBoleto($novoPedido->id_cliente, $novoPedido->id_servico, $novoPedido->quantidade);
            
            return response()->json('Pedido realizado e boleto para pagamento enviado no e-mail.');
        // } catch (\Throwable $th) {
        //     return response()->json(false);
        // }
    }

    public function gerarBoleto($id_cliente, $id_servico, $quantidade)
    {
        $cliente = Cliente::find($id_cliente);
            
        $dataAtual = date("d/m/Y");
        $dataVencimento = date("d/m/Y", strtotime("+1 day"));
        $url = 'ec2-54-207-5-12.sa-east-1.compute.amazonaws.com/pagarBoleto/'.$id_servico;

        Mail::send('email',  ['dataVencimento' => $dataVencimento, 'url' => $url, 'nomeCliente' => $cliente->desc_cliente, 'dataDocumento' => $dataAtual, 'valorTotal' => ($quantidade * 45.0)], function($email) use($cliente){
            $email->from('trabalhosig2020@gmail.com', 'Contabilidade Seder');
            $email->to($cliente->email);
            $email->subject('Boleto de Pagamento');
        });
    }

    public function pagarBoleto($codigoPedido)
    {
        try {
            $pedidos = Servicos::find($codigoPedido);
            if($pedidos->cd_status == 1)
            {
                $pedidos->cd_status = 2;
            }
            $pedidos->flg_pagamento = 1;
            $pedidos->save();

            return response()->json('Pagamento realizado com sucesso. Seder Agradece!');
        } catch (\Throwable $th) {
            return response()->json(false);
        }
    }

    public function listagemDeServicos(Request $request)
    {
        try {
            $acesso = Cliente::where('hash', $request->keyAcesso)->first();
            $pedidos = Servicos::select(['id_servico', 'nome_servico', 'descricao', 'quantidade', 'flg_pagamento'])
            ->where('id_cliente', $acesso->id_cliente)->get();

            return response()->json($pedidos);
        } catch (\Throwable $th) {
            return response()->json(false);
        }
    }

    public function listagemDeServicosSistema()
    {
        try {
            $pedidos = Servicos::select([
                'desc_cliente',
                'descricao',
                'servicos.*'
            ])
            ->join('cliente', 'cliente.id_cliente', '=', 'servicos.id_cliente')
            ->join('status', 'status.cd_status', '=', 'servicos.cd_status')
            ->orderby('id_servico')
            ->get();
            return response()->json($pedidos);
        } catch (\Throwable $th) {
            return response()->json(false);
        }        
    }

    public function listarDadosGrafico()
    {
        try {
            $sql = "select 
            sum(case when  cd_status = 1 then  1 else  0  end) as aberto,
            sum(case when  cd_status = 2 then  1 else  0  end) as  andamento,
            sum(case when  cd_status = 3 then  1 else  0  end) as entregue
            from servicos";
            $dados = DB::select(DB::raw($sql));
            return response()->json($dados);
        } catch (\Throwable $th) {
            return response()->json(false);
        }
        
    }

    public function avancarStatusServico($idServico){
        try {
            $servico = Servicos::find($idServico);
            if($servico->cd_status == 3){
                return response()->json(false);
            }
            else{
                $servico->cd_status = $servico->cd_status + 1;
                $servico->save();
            }
            $status = Status::find($servico->cd_status);
            return response()->json($status);
        } catch (\Throwable $th) {
            return response()->json(false);
        }
    }
}
