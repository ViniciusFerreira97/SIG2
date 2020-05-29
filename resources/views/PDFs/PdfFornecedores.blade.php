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
<h2>Fornecedores</h2>
<hr>
</div>


    <table class="table">
        <thead>
            <tr style="background-color: #000000;">
            <th class="cabecalho" scope="col" style="width:10%;">ID</th>
            <th class="cabecalho" scope="col" style="width:90%;">Nome</th>
            </tr>
            @foreach ($data as  $item) 
            {
            <tr>
                <th scope="row">{{$item->id_fornecedor}}</th>
                <td>{{$item->nome_fornecedor}}</td>
            </tr>
            } 
            @endforeach
        </thead>
    </table>
</body>
</html>
