<?php
  include 'nav.php'; 
  include_once('config.php');

  // DELETAR FUNCIONARIO //
  if(!empty($_GET['id']))
  {
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM tbl_func WHERE id=$id";
    $result = $conexao->query($sqlSelect);
    if($result->num_rows > 0)
    {
      $sqlDelete = "DELETE FROM tbl_func WHERE id=$id";
      $resultDelete = $conexao->query($sqlDelete);
      include '..\scripts\alertas\alertdelete.php';  
    }
  }

  // SELECT GERAL E COM FILTRO //
  $sql = "SELECT * FROM tbl_func ORDER BY id ASC";

  $result = $conexao->query($sql);

  if(!empty($_GET['search'])){
    $data = $_GET['search'];
    $sql = "SELECT * FROM tbl_func WHERE id LIKE '%$data%' or nome LIKE '%$data%' or cpf LIKE '%$data%'";
    $result = $conexao->query($sql);

  }
  else{
    $sql = "SELECT * FROM tbl_func ORDER BY id ASC";
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
    
    <div class="row header cian">
      <div class="cell">
        Id
      </div>
      <div class="cell">
        Nome
      </div>
      <div class="cell">
        Email
      </div>
      <div class="cell">
        CPF
      </div>
      <div class="cell">
        Nascimento
      </div>
      <div class="cell">
        Telefone
      </div>
      <div class="cell">
        CEP
      </div>
      <div class="cell">
        N°
      </div>
      <div class="cell">
        Ações
      </div>
    </div>

    <?php
        while($user_data = mysqli_fetch_assoc($result))
        {
          $data_timestamp = strtotime($user_data['data_nasc']);

          $data_brasileira = date("d/m/Y",$data_timestamp);

            echo"<div class='row'</div>";
            echo"<div class='cell' data-title='ID'>".$user_data['id']."</div>";
            echo"<div class='cell' data-title='NOME'>".$user_data['nome']."</div>";
            echo"<div class='cell' data-title='EMAIL'>".$user_data['email']."</div>";
            echo"<div class='cell' data-title='CPF'>".$user_data['cpf']."</div>";
            echo"<div class='cell' data-title='NASCIMENTO'>".$data_brasileira."</div>";
            echo"<div class='cell' data-title='TELEFONE'>".$user_data['telefone']."</div>";
            echo"<div class='cell' data-title='CEP'>".$user_data['cep']."</div>";
            echo"<div class='cell' data-title='N°'>".$user_data['numero']."</div>";
            echo"<div class='cell' data-title=''> <a class='btn btn-sm btn-primary' href='edit.php?id=$user_data[id]' title='Editar'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
            </svg>
            </a> 
            <a class='btn btn-sm btn-danger' href='funcionario.php?id=$user_data[id]' title='Deletar'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                </svg>
            </a></div>";
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
      window.location = 'funcionario.php?search='+search.value
  }
</script>
</body>

</html>