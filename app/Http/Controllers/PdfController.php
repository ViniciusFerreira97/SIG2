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
use Mpdf\Mpdf;

class PdfController extends Controller
{
    public function exportarServicos()
    {
            
        try {
            $pedidos = Servicos::select([
                'desc_cliente',
                'descricao',
                'servicos.*'
            ])
            ->join('cliente', 'cliente.id_cliente', '=', 'servicos.id_cliente')
            ->join('status', 'status.cd_status', '=', 'servicos.cd_status')
            ->get();

            $content = view('PDFs.PdfServicos', [
                'data'=>$pedidos
            ]);

            $mpdf=new Mpdf([]);

            $mpdf->mirrorMargins = 0;
            $mpdf->charset_in='windows-1252';

            $mpdf->WriteHTML(utf8_decode($content));

            $mpdf->debug = true;
            $mpdf->Output('prova.pdf', 'I'); // imprime na tela
            //$mpdf->Output('prova.pdf', 'D'); // faz download
            exit;

            return response()->make($content, 200, $headers);
    
        } catch (\Throwable $th) { \Log::error($th); 
            return false;
        }
    }

    public function exportarFornecedores()
    {
            
        try {
            $fornecedores = Fornecedores::get();

            $content = view('PDFs.PdfFornecedores', [
                'data'=>$fornecedores
            ]);

            $mpdf=new Mpdf([]);

            $mpdf->mirrorMargins = 0;
            $mpdf->charset_in='windows-1252';

            $mpdf->WriteHTML(utf8_decode($content));

            $mpdf->debug = true;
            $mpdf->Output('prova.pdf', 'I'); // imprime na tela
            //$mpdf->Output('prova.pdf', 'D'); // faz download
            exit;

            return response()->make($content, 200, $headers);
    
        } catch (\Throwable $th) { \Log::error($th); 
            return false;
        }
    }

    public function exportarClientes()
    {
            
        try {
            $cliente = Cliente::get();

            $content = view('PDFs.PdfClientes', [
                'data'=>$cliente
            ]);

            $mpdf=new Mpdf([]);

            $mpdf->mirrorMargins = 0;
            $mpdf->charset_in='windows-1252';

            $mpdf->WriteHTML(utf8_decode($content));

            $mpdf->debug = true;
            $mpdf->Output('prova.pdf', 'I'); // imprime na tela
            //$mpdf->Output('prova.pdf', 'D'); // faz download
            exit;

            return response()->make($content, 200, $headers);
    
        } catch (\Throwable $th) { \Log::error($th); 
            return false;
        }
    }

    public function exportarPedidos()
    {
            
        try {
            $pedidos = Pedidos::join('fornecedores', 'fornecedores.id_fornecedor', '=', 'pedidos.id_fornecedor')->get();

            $content = view('PDFs.PdfPedidos', [
                'data'=>$pedidos
            ]);

            $mpdf=new Mpdf([]);

            $mpdf->mirrorMargins = 0;
            $mpdf->charset_in='windows-1252';

            $mpdf->WriteHTML(utf8_decode($content));

            $mpdf->debug = true;
            $mpdf->Output('prova.pdf', 'I'); // imprime na tela
            //$mpdf->Output('prova.pdf', 'D'); // faz download
            exit;

            return response()->make($content, 200, $headers);
    
        } catch (\Throwable $th) { \Log::error($th); 
            return false;
        }
    }
}
