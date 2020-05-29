<!DOCTYPE html>
<html lang="en">
<head>
<style>
table {
  margin-top:3%;
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: center;
  padding: 10px;
}

.cabecalho {
    color: white;
}

.titulo{
    margin-top:7%;
    text-align: center;
}

hr{
    width: 50%;
    color:#000000;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
</head>
<body>
<img src="img/imageSederRelatorio.jpg">

<div class="titulo">
<h2>Pedidos Gerais</h2>
<hr>
</div>


    <table class="table">
        <thead>
            <tr style="background-color: #000000;">
            <th class="cabecalho" scope="col" style="width:5%;">ID</th>
            <th class="cabecalho" scope="col" style="width:30%;">Nome</th>
            <th class="cabecalho" scope="col" style="width:30%;">Cliente</th>
            <th class="cabecalho" scope="col" style="width:15%;">Quantidade</th>
            <th class="cabecalho" scope="col" style="width:15%;">Status</th>
            </tr>
            @foreach ($data as  $item) 
            {
            <tr>
                <th scope="row">{{$item->id_servico}}</th>
                <td>{{$item->nome_servico}}</td>
                <td>{{$item->desc_cliente}}</td>
                <td>{{$item->quantidade}}</td>
                <td>{{$item->descricao}}</td>
            </tr>
            } 
            @endforeach
        </thead>
    </table>

    <div class="titulo">
        <h2>Pedidos em Aberto</h2>
        <hr>
    </div>

    <table class="table">
        <thead>
            <tr style="background-color: #000000;">
            <th class="cabecalho" scope="col" style="width:5%;">ID</th>
            <th class="cabecalho" scope="col" style="width:30%;">Nome</th>
            <th class="cabecalho" scope="col" style="width:30%;">Cliente</th>
            <th class="cabecalho" scope="col" style="width:15%;">Quantidade</th>
            <th class="cabecalho" scope="col" style="width:15%;">Status</th>
            </tr>
            @foreach ($data as  $item) 
            {
                @if($item->cd_status != 3){
                    <tr>
                    <th scope="row">{{$item->id_servico}}</th>
                    <td>{{$item->nome_servico}}</td>
                    <td>{{$item->desc_cliente}}</td>
                    <td>{{$item->quantidade}}</td>
                    <td>{{$item->descricao}}</td>
                </tr>
                }
                @endif
            } 
            @endforeach
        </thead>
    </table>
</body>
</html>
