<?php
    // login
    include_once('..\sistema\config.php');

    session_start();
     if(isset($_POST['submit']))
    {

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql= "SELECT * FROM tbl_func WHERE email = '$email'";
        
        $resultado = $conexao->query($sql);

        $user_data = mysqli_fetch_assoc($resultado);

        if(mysqli_num_rows($resultado) < 1)
        {
            include '..\scripts\alertas\alertlogi.php';   
        }
        else if($senha != $user_data['senha'])
        {
          include '..\scripts\alertas\alertsenha.php';     
        }

        else
        {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;

            header('Location: ..\sistema\admin.php');
        }
    }
    else{   
        echo'';
    }
    
    // cadastro

    if(isset($_POST['submit2'])){
       // $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confirmasenha = $_POST['confirmasenha'];
        $cpf = $_POST['cpf'];

        $sql = "SELECT * FROM tbl_func WHERE cpf = '$cpf'";

        $consulta = $conexao->query($sql);

        if($senha != $confirmasenha){
          include '..\scripts\alertas\cadsenha.php';   
        } 

        else if(mysqli_num_rows($consulta) == 1)
       {
          include '..\scripts\alertas\alertcli.php';   
       }

        else{
           $nome = $_POST['nome'];
           $email = $_POST['email'];
           $senha = $_POST['senha'];
           $cpf = $_POST['cpf'];
           $data_nasc = $_POST['data_nasc'];
           $telefone = $_POST['telefone'];
           $cep = $_POST['cep'];
           $numero = $_POST['numero'];
 
           $result = mysqli_query($conexao, "INSERT INTO tbl_func(nome,email,senha,cpf,data_nasc,telefone,cep,numero)
           VALUES ('$nome','$email','$senha','$cpf','$data_nasc','$telefone','$cep','$numero')");
 
           include '..\scripts\alertas\sucess.php'; 
        }  
        
  
}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="main.css"><link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="..\css\login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js">
    </script>

  </head>
  <body>
    <div class="main">

      <div class="container a-container" id="a-container">
        <form class="form" id="a-form" method="POST" action="login.php">
          <h2 class="form_title title">Login</h2>
          <input class="form__input" type="text" placeholder="Email" name="email">
          <input class="form__input" type="text" placeholder="Senha" name="senha">
          <input type="submit" name="submit" class="enviar" value="Login">
        </form>
      </div>
      <div class="container b-container" id="b-container">
        <form class="form" id="b-form" method="post" action="login.php">
          <h2 class="form_title title">Cadastro</h2>
          <input class="form__input" type="text" placeholder="Nome" name="nome">
          <input class="form__input" type="text" placeholder="Email" name="email">
          <input class="form__input" type="password" placeholder="Senha" name="senha">
          <input class="form__input" type="password" placeholder="Confirmar Senha" name="confirmasenha">
          <input class="form__input" type="text" id="cpf" placeholder="CPF" name="cpf">
          <input class="form__input" type="date"  placeholder="Data de nascimento" name="data_nasc"> 
          <input class="form__input" type="text" id="telefone" placeholder="Telefone" name="telefone">
          <input class="form__input" type="text" id="cep" placeholder="CEP" name="cep">
          <input class="form__input" type="number" placeholder="Número" name="numero">
          <input type="submit" name="submit2" class="enviar" value="Cadastrar-se">
        </form>
      </div>
      <div class="switch" id="switch-cnt">
        <div class="switch__circle"></div>
        <div class="switch__circle switch__circle--t"></div>
        <div class="switch__container" id="switch-c1">
          <h2 class="switch__title title">Não tem conta?</h2>
          <p class="switch__description description">Cadastre-se!</p>
          <button class="switch__button button switch-btn">Cadastre-se</button>
        </div>
        <div class="switch__container is-hidden" id="switch-c2">
          <h2 class="switch__title title">Já tem conta?</h2>
          <p class="switch__description description">Acesse o sistema</p>
          <button class="switch__button button switch-btn">Login</button>
        </div>
      </div>
    </div>
  <script src="../scripts/login.js"></script>
  <script src="../scripts/mask.js"></script>
  </body>
</html>