<?php

include 'nav.php';
include_once('config.php');

  if(!empty($_GET['id']))
  {

      $id = $_GET['id'];

      $sqlSelect = "SELECT * FROM tbl_vendas WHERE id=$id";

      $result = $conexao->query($sqlSelect);

      if($result->num_rows > 0)
      {
          $sqlDelete = "DELETE FROM tbl_vendas WHERE id=$id";
          $resultDelete = $conexao->query($sqlDelete);
          include '..\scripts\alertas\alertdelete.php';  
      }
  }

    $sql = "SELECT * FROM tbl_vendas ORDER BY id ASC";

    $result = $conexao->query($sql);

    if(!empty($_GET['search'])){
      $data = $_GET['search'];
      $sql = "SELECT * FROM tbl_vendas WHERE id LIKE '%$data%' or placa LIKE '%$data%' or marca LIKE '%$data%' or modelo LIKE '%$data%' or ano LIKE '%$data%'";
      $result = $conexao->query($sql);

  }
  else{
      $sql = "SELECT * FROM tbl_vendas ORDER BY id ASC";
      $result = $conexao->query($sql);

  }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/tabela.css">
    <title>Banco de Dados</title>
</head>
<body>

<div class="wrapper">
  <input type="search" name="search" id="search" placeholder="pesquisar">
  <button onclick="searchData()"><img src="https://img.icons8.com/metro/26/FFFFFF/search.png"/></button>
  <div class="table">
    
    <div class="row header blue">
      <div class="cell">
        Id
      </div>
      <div class="cell">
        Nome
      </div>
      <div class="cell">
        CPF
      </div>
      <div class="cell">
        CEP
      </div>
      <div class="cell">
        Telefone
      </div>
      <div class="cell">
        Placa
      </div>
      <div class="cell">
        Marca
      </div>
      <div class="cell">
        Modelo
      </div>
      <div class="cell">
        Ano
      </div>
      <div class="cell">
        Valor
      </div>
      <div class="cell">
        Pagamento
      </div>
      <div class="cell">
        Data Venda
      </div>
    </div>

    <?php
        while($user_data = mysqli_fetch_assoc($result))
        {

            $data_timestamp = strtotime($user_data['data_venda']);

            $data_brasileira = date("d/m/Y",$data_timestamp);

            echo"<div class='row'</div>";
            echo"<div class='cell' data-title='ID'>".$user_data['id']."</div>";
            echo"<div class='cell' data-title='NOME'>".$user_data['nome']."</div>";
            echo"<div class='cell' data-title='CPF'>".$user_data['cpf']."</div>";
            echo"<div class='cell' data-title='CEP'>".$user_data['cep']."</div>";
            echo"<div class='cell' data-title='TELEFONE'>".$user_data['telefone']."</div>";
            echo"<div class='cell' data-title='PLACA'>".$user_data['placa']."</div>";
            echo"<div class='cell' data-title='MARCA'>".$user_data['marca']."</div>";
            echo"<div class='cell' data-title='MODELO'>".$user_data['modelo']."</div>";
            echo"<div class='cell' data-title='ANO'>".$user_data['ano']."</div>";
            echo"<div class='cell' data-title='VALOR'>".$user_data['valor']."</div>";
            echo"<div class='cell' data-title='pagamento'>".$user_data['pagamento']."</div>";
            echo"<div class='cell' data-title='data venda'>".$data_brasileira."</div>";
            echo"</div>";
        }
        ?>
    
  </div>
  
  
</div>

<script>
  var search = document.getElementById('search');

  search.addEventListener("keydown", function(event){
      if(event.key === "Enter")
      {
          searchData();
      }
  });

  function searchData()
  {
      window.location = 'veiculos.php?search='+search.value
  }
</script>
</body>

</html>