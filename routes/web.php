<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('/apiSeder')->group(function () {

    //DOCUMENTAÇÃO
    Route::get('/documentacaoApi',  function () {
        return view('documentacao');
    });

    Route::group(['middleware' => 'APIAutenticate'], function () {
        Route::post('/servico/criar',  'ServicosController@novoServico');
        Route::post('/servicos/listar',  'ServicosController@listagemDeServicos');
    });
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/servicos/listar',  'ServicosController@listagemDeServicosSistema');
Route::post('/servico/criar',  'ServicosController@novoServicoSistema');
Route::get('/grafico/geral/listar',  'ServicosController@listarDadosGrafico');
Route::post('/login/realizar',  'LoginController@login');
Route::get('/home/redirect/{codigoAcesso?}',  'LoginController@retornaHome');
Route::post('/fornecedor/criar',  'FornecedoresController@cadastrarFornecedor');
Route::get('/fornecedores/listar',  'FornecedoresController@listarFornecedores');
Route::post('/pedido/criar',  'PedidosController@cadastrarPedido');
Route::get('/pedidos/listar',  'PedidosController@listarPedidos');
Route::post('/cliente/criar',  'ClientesController@cadastrarCliente');
Route::get('/clientes/listar',  'ClientesController@listarCliente');
Route::get('/servicos/pdf/exportar',  'PdfController@exportarServicos');
Route::get('/fornecedores/pdf/exportar',  'PdfController@exportarFornecedores');
Route::get('/clientes/pdf/exportar',  'PdfController@exportarClientes');
Route::get('/pedidos/pdf/exportar',  'PdfController@exportarPedidos');
Route::get('/servico/status/avancar/{idServico}',  'ServicosController@avancarStatusServico');

Route::post('/clientes/excel/importar',  'ImportExcelController@importarClientes');
Route::post('/pedidos/excel/importar',  'ImportExcelController@importarPedidos');
Route::post('/fornecedores/excel/importar',  'ImportExcelController@importarFornecedores');
Route::post('/servicos/excel/importar',  'ImportExcelController@importarServicos');
Route::get('/pagarBoleto/{codigoPedido}',  'ServicosController@pagarBoleto');


Route::get('/', function () {
    return view('login');
});




