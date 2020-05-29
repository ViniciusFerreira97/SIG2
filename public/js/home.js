$(document).ready(function () {
    
    graficoGeral();
    graficoAberto();
    $('.tradeLink').on('click',function(){
        let id = $(this).attr('id').replace('Link','View');
        $('section.view').not('#'+id).hide();
        $('#'+id).show();
        if(id == 'homeView'){
            graficoGeral();
            graficoAberto();
        }
        else if(id == 'fornecedoresView'){
            listarFornecedores();
        }
        else if(id == 'clientesView'){
            listarClientes()
        }
        else if(id == 'pedidosView'){
            carregaSelectFornecedores();
            listarPedidos();
        }
        else if(id == 'servicosView'){
            carregaSelectClientes();
            listarServicos();
        }
    });

//--------------------------------------------------------VIEW FORNECEDOR----------------------------------

    $('#btnCadastroFornecedor').on('click', function(){
        $('#fornecedoresViewCadastro').removeAttr('hidden');
        $('#viewTabelaFornecedores').attr('hidden', 'hidden');
    });

    $('#btnVoltarFornecedor').on('click', function(){
        $('#viewTabelaFornecedores').removeAttr('hidden');
        $('#fornecedoresViewCadastro').attr('hidden', 'hidden');
        listarFornecedores();    
    });

    function listarFornecedores()
    {
        var baseUrl = document.location.origin + '/fornecedores/listar';
        $.ajax({
            type: "GET",
            url: baseUrl,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if(data != false){
                    var html;
                    for(let i=0; i<data.length; i++)
                    {
                        html += `<tr><th scope="row">${data[i]['id_fornecedor']}</th><td>${data[i]['nome_fornecedor']}</td></tr>`;
                    }
                    $('#tabelaFornecedores').empty();
                    $('#tabelaFornecedores').append(html);
                }else{
                    $('.alert-danger').fadeIn();
                }
            }
        });
    }

    $('#btnCadastrarNovoFornecedor').on('click', function(){
        let nome = $('#nomeFornecedor').val();
        var baseUrl = document.location.origin + '/fornecedor/criar';
        $.ajax({
            type: "POST",
            url: baseUrl,
            data: {'nome_fornecedor': nome},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if(data != false){
                    $('#nomeFornecedor').val('');
                }else{
                    $('.alert-danger').fadeIn();
                }
            }
        });
    });

    $('#btnExportarFornecedores').on('click', function(){
        window.open(`${document.location.origin}/fornecedores/pdf/exportar`, '_blank');
    });

    $('#btnImportarFornecedores').on('click', function(){
        $("#customFileLang").removeAttr('class');
        $("#customFileLang").attr('class', 'custom-file-input arquivoFornecedores');
        $("#btnImportarModal").removeAttr('class');
        $("#btnImportarModal").attr('class', 'btn btn-sm btn-outline-success waves-effect btnImportarArquivoFornecedores');
        $('#modalImportacao').modal('show');
    });

    $(document).on("click",".btnImportarArquivoFornecedores",function() {

        var form_data = new FormData();           

        form_data.append('arquivoFornecedores', $('.arquivoFornecedores').prop('files')[0]);

        var baseUrl = document.location.origin + '/fornecedores/excel/importar';

        $.ajax({
            type: 'POST',
            url: baseUrl,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            cache: false,
            contentType: false,
            processData: false,
            data: form_data, 
            success: function(data){
                if(data != false){
                    listarFornecedores();
                    $('#modalImportacao').modal('hide');
                }else{
                    $('.alert-danger').fadeIn();
                }
            }
        });
    });
    

//--------------------------------------------------------VIEW CLIENTE----------------------------------

    $('#btnCadastroClientes').on('click', function(){
        $('#clienteViewCadastro').removeAttr('hidden');
        $('#viewTabelaCliente').attr('hidden', 'hidden');
    });
    $('#btnVoltarCliente').on('click', function(){
        $('#viewTabelaCliente').removeAttr('hidden');
        $('#clienteViewCadastro').attr('hidden', 'hidden');
        listarClientes();        
    });

    function listarClientes()
    {
        var baseUrl = document.location.origin + '/clientes/listar';
        $.ajax({
            type: "GET",
            url: baseUrl,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if(data != false){
                    var html;
                    for(let i=0; i<data.length; i++)
                    {
                        html += `<tr><th scope="row">${data[i]['id_cliente']}</th><td>${data[i]['desc_cliente']}</td><td>${data[i]['hash']}</td></tr>`;
                    }
                    $('#tabelaClientes').empty();
                    $('#tabelaClientes').append(html);
                }else{
                    $('.alert-danger').fadeIn();
                }
            }
        });
    }

    $('#btnCadastrarNovoCliente').on('click', function(){
        let nome = $('#nomeCliente').val();
        let hash = $('#hashCliente').val();
        var baseUrl = document.location.origin + '/cliente/criar';
        $.ajax({
            type: "POST",
            url: baseUrl,
            data: {'desc_cliente': nome, 'hash':hash},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if(data != false){
                    $('#nomeCliente').val('');
                    $('#hashCliente').val('');
                }else{
                    $('.alert-danger').fadeIn();
                }
            }
        });
    });

    $('#btnExportarClientes').on('click', function(){
        window.open(`${document.location.origin}/clientes/pdf/exportar`, '_blank');
    });

    $('#btnImportarClientes').on('click', function(){
        $("#customFileLang").removeAttr('class');
        $("#customFileLang").attr('class', 'custom-file-input arquivoClientes');
        $("#btnImportarModal").removeAttr('class');
        $("#btnImportarModal").attr('class', 'btn btn-sm btn-outline-success waves-effect btnImportarArquivoClientes');
        $('#modalImportacao').modal('show');
    });

    $(document).on("click",".btnImportarArquivoClientes",function() {

        var form_data = new FormData();           

        form_data.append('arquivoClientes', $('.arquivoClientes').prop('files')[0]);

        var baseUrl = document.location.origin + '/clientes/excel/importar';

        $.ajax({
            type: 'POST',
            url: baseUrl,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            cache: false,
            contentType: false,
            processData: false,
            data: form_data, 
            success: function(data){
                if(data != false){
                    listarClientes();
                    $('#modalImportacao').modal('hide');
                }else{
                    $('.alert-danger').fadeIn();
                }
            }
        });
    });

//--------------------------------------------------------VIEW PEDIDOS----------------------------------

    $('#btnCadastroPedido').on('click', function(){
        $('#pedidosViewCadastro').removeAttr('hidden');
        $('#viewTabelaPedidos').attr('hidden', 'hidden');
    });
    $('#btnVoltarPedido').on('click', function(){
        $('#viewTabelaPedidos').removeAttr('hidden');
        $('#pedidosViewCadastro').attr('hidden', 'hidden');
        listarPedidos();   
    });

    function carregaSelectFornecedores(){
        var baseUrl = document.location.origin + '/fornecedores/listar';
        $.ajax({
            type: "GET",
            url: baseUrl,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if(data != false){
                    var html = '<option selected>Selecione</option>';
                    for(let i=0; i<data.length; i++)
                    {
                        html += `<option value="${data[i]['id_fornecedor']}">${data[i]['nome_fornecedor']}</option>`;
                    }
                    $('#selectFornecedor').empty();
                    $('#selectFornecedor').append(html);
                }else{
                    $('.alert-danger').fadeIn();
                }
            }
        });
    }
    function listarPedidos()
    {
        var baseUrl = document.location.origin + '/pedidos/listar';
        $.ajax({
            type: "GET",
            url: baseUrl,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if(data != false){
                    var html;
                    for(let i=0; i<data.length; i++)
                    {
                        html += `<tr><th scope="row">${data[i]['id_produto']}</th>
                        <td>${data[i]['nome_produto']}</td>
                        <td>${data[i]['quantidade']}</td>
                        <td>${data[i]['valor']}</td>
                        <td>${data[i]['nome_fornecedor']}</td></tr>`;
                    }
                    $('#tabelaPedidos').empty();
                    $('#tabelaPedidos').append(html);
                }else{
                    $('.alert-danger').fadeIn();
                }
            }
        });
    }

    $('#btnCadastrarNovoPedido').on('click', function(){
        let fornecedor = $( "#selectFornecedor option:selected" ).val();
        let nome = $('#nomeProduto').val();
        let quantidade = $('#quantidadeProduto').val();
        let valor = $('#valorProduto').val();

        var baseUrl = document.location.origin + '/pedido/criar';
        $.ajax({
            type: "POST",
            url: baseUrl,
            data: {'nome_produto': nome, 'quantidade':quantidade, 'valor':valor, 'id_fornecedor':fornecedor},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if(data != false){
                    $('#nomeProduto').val('');
                    $('#quantidadeProduto').val('');
                    $('#valorProduto').val('');
                }else{
                    $('.alert-danger').fadeIn();
                }
            }
        });
    });

    $('#btnExportarPedidos').on('click', function(){
        window.open(`${document.location.origin}/pedidos/pdf/exportar`, '_blank');
    });

    $('#btnImportarPedidos').on('click', function(){
        $("#customFileLang").removeAttr('class');
        $("#customFileLang").attr('class', 'custom-file-input arquivoPedidos');
        $("#btnImportarModal").removeAttr('class');
        $("#btnImportarModal").attr('class', 'btn btn-sm btn-outline-success waves-effect btnImportarArquivoPedidos');
        $('#modalImportacao').modal('show');
    });

    $(document).on("click",".btnImportarArquivoPedidos",function() {

        var form_data = new FormData();           

        form_data.append('arquivoPedidos', $('.arquivoPedidos').prop('files')[0]);

        var baseUrl = document.location.origin + '/pedidos/excel/importar';

        $.ajax({
            type: 'POST',
            url: baseUrl,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            cache: false,
            contentType: false,
            processData: false,
            data: form_data, 
            success: function(data){
                if(data != false){
                    listarPedidos();
                    $('#modalImportacao').modal('hide');
                }else{
                    $('.alert-danger').fadeIn();
                }
            }
        });
    });

//--------------------------------------------------------VIEW SERVIÇOS----------------------------------
$('#btnCadastroServicos').on('click', function(){
    $('#servicosViewCadastro').removeAttr('hidden');
    $('#viewTabelaServicos').attr('hidden', 'hidden');
});
$('#btnVoltarServico').on('click', function(){
    $('#viewTabelaServicos').removeAttr('hidden');
    $('#servicosViewCadastro').attr('hidden', 'hidden');
    listarServicos();   
});

function carregaSelectClientes(){
    var baseUrl = document.location.origin + '/clientes/listar';
    $.ajax({
        type: "GET",
        url: baseUrl,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if(data != false){
                var html = '<option selected>Selecione</option>';
                for(let i=0; i<data.length; i++)
                {
                    html += `<option value="${data[i]['id_cliente']}">${data[i]['desc_cliente']}</option>`;
                }
                $('#selectCliente').empty();
                $('#selectCliente').append(html);
            }else{
                $('.alert-danger').fadeIn();
            }
        }
    });
}
function listarServicos()
{
    var baseUrl = document.location.origin + '/servicos/listar';
    $.ajax({
        type: "GET",
        url: baseUrl,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if(data != false){
                var html;
                for(let i=0; i<data.length; i++)
                {
                    html += `<tr><th scope="row">${data[i]['id_servico']}</th>
                    <td>${data[i]['nome_servico']}</td>
                    <td>${data[i]['desc_cliente']}</td>
                    <td>${data[i]['quantidade']}</td>
                    <td id="statusServico${data[i]['id_servico']}">${data[i]['descricao']}</td>`;
                    if(data[i]['cd_status'] == 3){
                        html +=`<td><button style="margin:0%; padding=0%; display: block; margin: auto;" class="btn btn-outline-danger btn-sm" type="button" disabled><i class="fas fa-ban fa-lg"></i></button></td>
                        </tr>`;
                    }
                    else{
                        html +=`<td class="btnAvancar"><button idPedido=${data[i]['id_servico']} style="margin:0%; padding=0%; display: block; margin: auto;" class="btn btn-outline-success btn-sm btnAvancarStatus" type="button"><i class="fas fa-angle-double-right fa-lg"></i></button></td>
                        </tr>`;
                    }
                }
                $('#tabelaServicos').empty();
                $('#tabelaServicos').append(html);
            }else{
                $('.alert-danger').fadeIn();
            }
        }
    });
}

$(document).on("click",".btnAvancarStatus",function() {
    var elementoBotao = $(this);
    var id= $(this).attr('idPedido');
    var elementoStatus = $(`#statusServico${id}`);

    var baseUrl = document.location.origin + `/servico/status/avancar/${id}`;
    $.ajax({
        type: "GET",
        url: baseUrl,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if(data != false){
                if(data['cd_status'] == 3){
                    let html = '<button style="margin:0%; padding=0%; display: block; margin: auto;" class="btn btn-outline-danger btn-sm" type="button" disabled><i class="fas fa-ban fa-lg"></i></button>';
                    elementoBotao.parent().parent().find('.btnAvancar').html(html);
                }
                elementoStatus.html(data['descricao']);
            }else{
                $('.alert-danger').fadeIn();
            }
        }
    });
});

$('#btnCadastrarNovoServico').on('click', function(){
    let cliente = $( "#selectCliente option:selected" ).val();
    let nome = $('#nomeServico').val();
    let quantidade = $('#quantidadeServico').val();

    var baseUrl = document.location.origin + '/servico/criar';
    $.ajax({
        type: "POST",
        url: baseUrl,
        data: {'descricao': nome, 'id_cliente':cliente, 'quantidade':quantidade},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if(data != false){
                $('#nomeServico').val('');
                $('#quantidadeServico').val('');
            }else{
                $('.alert-danger').fadeIn();
            }
        }
    });
});

$('#btnExportarServicos').on('click', function(){
    window.open(`${document.location.origin}/servicos/pdf/exportar`, '_blank');
});

$('#btnImportarServicos').on('click', function(){
    $("#customFileLang").removeAttr('class');
    $("#customFileLang").attr('class', 'custom-file-input arquivoServicos');
    $("#btnImportarModal").removeAttr('class');
    $("#btnImportarModal").attr('class', 'btn btn-sm btn-outline-success waves-effect btnImportarArquivoServicos');
    $('#modalImportacao').modal('show');
});

$(document).on("click",".btnImportarArquivoServicos",function() {

    var form_data = new FormData();           

    form_data.append('arquivoServicos', $('.arquivoServicos').prop('files')[0]);

    var baseUrl = document.location.origin + '/servicos/excel/importar';

    $.ajax({
        type: 'POST',
        url: baseUrl,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        cache: false,
        contentType: false,
        processData: false,
        data: form_data, 
        success: function(data){
            if(data != false){
                listarServicos();
                $('#modalImportacao').modal('hide');
            }else{
                $('.alert-danger').fadeIn();
            }
        }
    });
});



function graficoGeral(){

    $("#graficoGeral").empty();
    $("#graficoGeral").html('<canvas id="pieChart"></canvas>');

    var baseUrl = document.location.origin + '/grafico/geral/listar';
    $.ajax({
        type: "GET",
        url: baseUrl,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if(data != false){
                        //pie
                var ctxP = document.getElementById("pieChart").getContext('2d');
                var myPieChart = new Chart(ctxP, {
                type: 'pie',
                data: {
                labels: ["Em Aberto", "Em Andamento", "Finalizado"],
                datasets: [{
                data: [data[0]['aberto'], data[0]['andamento'], data[0]['entregue']],
                backgroundColor: [
                    'rgba(202, 60, 37, 0.8)',
                    'rgba(89, 111, 98, 0.8)',
                    'rgba(103, 148, 54, 0.8)',],

                hoverBackgroundColor: ["#FF5A5E", "#596F62", "#A5BE00"]
                }]
                },
                options: {
                responsive: true
                }
                });
            }else{
                $('.alert-danger').fadeIn();
            }
        }
    });

}

function graficoAberto(){

    $("#graficoAberto").empty();
    $("#graficoAberto").html('<canvas id="pieChart2"></canvas>');

    var baseUrl = document.location.origin + '/grafico/geral/listar';
    $.ajax({
        type: "GET",
        url: baseUrl,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if(data != false){
                        //pie
                var ctxP = document.getElementById("pieChart2").getContext('2d');
                var myPieChart = new Chart(ctxP, {
                type: 'pie',
                data: {
                labels: ["Em Aberto", "Em Andamento"],
                datasets: [{
                data: [data[0]['aberto'], data[0]['andamento']],
                backgroundColor: ['rgba(202, 60, 37, 0.8)',
                'rgba(89, 111, 98, 0.8)',],
                hoverBackgroundColor: ["#FF5A5E", "#596F62"]
                }]
                },
                options: {
                responsive: true
                }
                });
            }else{
                $('.alert-danger').fadeIn();
            }
        }
    });

}

})



