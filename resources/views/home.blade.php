<!DOCTYPE html>
<html lang="br" class="full-height">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css" rel="stylesheet">
    <!-- ClockPicker Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.css"
          rel="stylesheet">
    <style>
        .navbar a{
            color:white !important;
        }
        .btn-group > .btn{
            border-radius: 30px;
            margin-right: 5px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg blue darken-1">
    <a class="navbar-brand" href="#"><img src="../../img/navbarSeder.jpg"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-white" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link tradeLink" href="#" id="homeLink">Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link tradeLink" href="#" id="fornecedoresLink">Fornecedores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link tradeLink" href="#" id="clientesLink">Clientes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link tradeLink" href="#" id="pedidosLink">Pedidos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link tradeLink" href="#" id="servicosLink">Serviços</a>
            </li>
        </ul>
    </div>
</nav>
<section class="mt-5 view" id="homeView">
    <div class="row text-center">
        <div class="col-6">
            <h4> Serviços em aberto </h4>
        </div>
        <div class="col-6">
            <h4> Historico de Serviços </h4>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-1"></div>
        <div class="col-4">
            <hr>
        </div>
        <div class="col-2"></div>
        <div class="col-4">
            <hr>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-1"></div>
        <div class="col-4" id='graficoAberto'>
            
        </div>
        <div class="col-2"></div>
        <div class="col-4" id="graficoGeral">
        </div>
    </div>
</section>


<section class="mt-5 view" id="fornecedoresView" style="display: none">
    <div class="row text-center">
        <div class="col-4 mt-3">
            <h4>Fornecedores</h4>
        </div>
        <div class="col-4"></div>
        <div class="col-4">
            <div class="btn-group">
                <button href="#modalCadastro" role="button" class="btn btn-primary btn-md" id="btnCadastroFornecedor"
                        data-toggle="modal" title="Cadastrar">
                    <i class="fas fa-plus fa-2x"></i>
                </button>
                <button href="#ModalPlanilha" role="button" id="btnImportarFornecedores"
                        class="btn btn-primary btn-md ml-1"
                        data-toggle="modal" title="Importar">
                    <i class="fas fa-file-import fa-2x"></i>
                </button>
                <button role="button" id="btnExportarFornecedores" class="btn btn-primary btn-md ml-1"
                        title="Exportar">
                    <i class="fas fa-file-export fa-2x"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <hr>
        </div>
    </div>
    <div class="row" id="viewTabelaFornecedores">
        <div class="col-1"></div>
        <div class="col-10">
            <table class="table">
                <thead class="black white-text">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    </tr>
                </thead>
                <tbody id='tabelaFornecedores'>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row" id="fornecedoresViewCadastro" hidden>
    <div class="col-2"></div>
        <div class="col-4">
            <div class="md-form">
                <input type="text" id="nomeFornecedor" class="form-control">
                <label for="nomeFornecedor">Nome Fornecedor</label>
            </div>
        </div>
        <div class="col-2">
            <button id="btnVoltarFornecedor" class="btn btn-outline-danger btn-rounded btn-block my-4 waves-effect z-depth-0" type="button">
                Voltar
            </button>
        </div>
        <div class="col-2">
            <button type="button" id="btnCadastrarNovoFornecedor" class="btn btn-success btn-rounded btn-block my-4 waves-effect z-depth-0">Cadastrar</button>
        </div>
    </div>
</section>


<section class="mt-5 view" id="clientesView" style="display: none">
    <div class="row text-center">
        <div class="col-4 mt-3">
            <h4>Clientes</h4>
        </div>
        <div class="col-4"></div>
        <div class="col-4">
            <div class="btn-group">
                <button href="#modalCadastro" role="button" class="btn btn-primary btn-md" id="btnCadastroClientes"
                        data-toggle="modal" title="Cadastrar">
                    <i class="fas fa-plus fa-2x"></i>
                </button>
                <button href="#ModalPlanilha" role="button" id="btnImportarClientes"
                        class="btn btn-primary btn-md ml-1"
                        title="Importar">
                    <i class="fas fa-file-import fa-2x"></i>
                </button>
                <button role="button" id="btnExportarClientes" class="btn btn-primary btn-md ml-1"
                        title="Exportar">
                    <i class="fas fa-file-export fa-2x"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <hr>
        </div>
    </div>
    <div class="row" id="viewTabelaCliente">
        <div class="col-1"></div>
        <div class="col-10">
            <table class="table">
                <thead class="black white-text">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Hash</th>
                    </tr>
                </thead>
                <tbody id='tabelaClientes'>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row" id="clienteViewCadastro" hidden>
        <div class="col-12">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="md-form">
                    <input type="text" id="nomeCliente" class="form-control">
                    <label for="nomeCliente">Nome Cliente</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="md-form">
                    <input type="text" id="hashCliente" class="form-control">
                    <label for="hashCliente">Hash Cliente</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-2">
            <button id="btnVoltarCliente" class="btn btn-outline-danger btn-rounded btn-block my-4 waves-effect z-depth-0" type="button">
                Voltar
            </button>
            </div>
            <div class="col-2">
            <button type="button" id="btnCadastrarNovoCliente" class="btn btn-success btn-rounded btn-block my-4 waves-effect z-depth-0">Cadastrar</button>
            </div>
        </div>
        </div>
    </div>
</section>

<section class="mt-5 view" id="pedidosView" style="display:none;">
    <div class="row">

    </div>
    <div class="row text-center">
        <div class="col-4 mt-3">
            <h4>Pedidos</h4>
        </div>
        <div class="col-4"></div>
        <div class="col-4">
            <div class="btn-group">
                <button href="#modalCadastro" role="button" class="btn btn-primary btn-md" id="btnCadastroPedido"
                        data-toggle="modal" title="Cadastrar">
                    <i class="fas fa-plus fa-2x"></i>
                </button>
                <button href="#ModalPlanilha" role="button" id="btnImportarPedidos"
                        class="btn btn-primary btn-md ml-1"
                        data-toggle="modal" title="Importar">
                    <i class="fas fa-file-import fa-2x"></i>
                </button>
                <button role="button" id="btnExportarPedidos" class="btn btn-primary btn-md ml-1"
                        title="Exportar">
                    <i class="fas fa-file-export fa-2x"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <hr>
        </div>
    </div>
    <div class="row" id="viewTabelaPedidos">
        <div class="col-1"></div>
        <div class="col-10">
            <table class="table">
                <thead class="black white-text">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Fornecedor</th>
                    </tr>
                </thead>
                <tbody id='tabelaPedidos'>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row" id="pedidosViewCadastro" hidden>
        <div class="col-12">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <label for="">Fornecedor</label>
                <select class="browser-default custom-select" id="selectFornecedor">
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="md-form">
                    <input type="text" id="nomeProduto" class="form-control">
                    <label for="nomeProduto">Nome Produto</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="md-form">
                    <input type="text" id="quantidadeProduto" class="form-control">
                    <label for="quantidadeProduto">Quantidade</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="md-form">
                    <input type="text" id="valorProduto" class="form-control">
                    <label for="valorProduto">Valor Ordem</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-2">
            <button id="btnVoltarPedido" class="btn btn-outline-danger btn-rounded btn-block my-4 waves-effect z-depth-0" type="button">
                Voltar
            </button>
            </div>
            <div class="col-2">
            <button type="button" id="btnCadastrarNovoPedido" class="btn btn-success btn-rounded btn-block my-4 waves-effect z-depth-0">Cadastrar</button>
            </div>
        </div>
        </div>
    </div>
</section>

<section class="mt-5 view" id="servicosView" style="display:none;">
    <div class="row">

    </div>
    <div class="row text-center">
        <div class="col-4 mt-3">
            <h4>Serviços</h4>
        </div>
        <div class="col-4"></div>
        <div class="col-4">
            <div class="btn-group">
                <button href="#modalCadastro" role="button" class="btn btn-primary btn-md" id="btnCadastroServicos"
                        data-toggle="modal" title="Cadastrar">
                    <i class="fas fa-plus fa-2x"></i>
                </button>
                <button href="#ModalPlanilha" role="button" id="btnImportarServicos"
                        class="btn btn-primary btn-md ml-1"
                        data-toggle="modal" title="Importar">
                    <i class="fas fa-file-import fa-2x"></i>
                </button>
                <button role="button" id="btnExportarServicos" class="btn btn-primary btn-md ml-1"
                        title="Exportar">
                    <i class="fas fa-file-export fa-2x"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <hr>
        </div>
    </div>
    <div class="row" id="viewTabelaServicos">
        <div class="col-1"></div>
        <div class="col-10">
            <table class="table">
                <thead class="black white-text">
                    <tr>
                    <th scope="col" style="width:5%;">ID</th>
                    <th scope="col" style="width:15%;">Nome</th>
                    <th scope="col" style="width:30%;">Cliente</th>
                    <th scope="col" style="width:12%;">Quantidade</th>
                    <th scope="col" style="width:23%;">Status</th>
                    <th scope="col" style="width:25%; text-align:center;">Avançar Status</th>
                    </tr>
                </thead>
                <tbody id='tabelaServicos'>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row" id="servicosViewCadastro" hidden>
        <div class="col-12">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <label for="">Cliente</label>
                <select class="browser-default custom-select" id="selectCliente">
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="md-form">
                    <input type="text" id="nomeServico" class="form-control">
                    <label for="nomeServico">Nome Serviço</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="md-form">
                    <input type="text" id="quantidadeServico" class="form-control">
                    <label for="quantidadeServico">Quantidade</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-2">
            <button id="btnVoltarServico" class="btn btn-outline-danger btn-rounded btn-block my-4 waves-effect z-depth-0" type="button">
                Voltar
            </button>
            </div>
            <div class="col-2">
            <button type="button" id="btnCadastrarNovoServico" class="btn btn-success btn-rounded btn-block my-4 waves-effect z-depth-0">Cadastrar</button>
            </div>
        </div>
        </div>
    </div>
</section>

<div class="modal" id="modalImportacao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">

    <div class="modal-dialog" role="document">


        <div class="modal-content">
            <div class="modal-header" style='background-color:#1e88e5;'>
                <h4 class="modal-title w-100" id="tituloModal" style='color:white;'>Importar Excel</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <div class="row text-center" style="margin-top:2%;">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="custom-file">
                        <input type="file" class="" id="customFileLang">
                        <label class="custom-file-label" for="customFileLang" data-browse="Arquivo"></label>
                    </div>
                </div>
            </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="" id='btnImportarModal'>Importar Arquivo</button>
            </div>
        </div>
    </div>
</div>

</body>
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- JQueryUI -->
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js"></script>

<script src="../../js/home.js"></script>
</html>
