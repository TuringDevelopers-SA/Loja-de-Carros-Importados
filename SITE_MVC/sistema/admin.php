<?php 
    include 'nav.php';
    include 'config.php';

    $logado = $_SESSION['email'];

    $sql = "SELECT * FROM tbl_func WHERE email ='$logado'";

    $result = $conexao->query($sql);

    $user_data = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <link rel="stylesheet" href="../css/admin.css">
    <script src="../scripts/mask.js"></script>
    <title>área do funcionário</title>
</head>
<body>
    <article>
    <form class="form" id="b-form" method="post" action="">
          <h2 class="form_title title">Meu Dados</h2>
          <input class="form__input" type="text" placeholder="Id" name="id" disabled value="<?php echo $user_data['id'];?>">
          <input class="form__input" type="text" placeholder="Nome" name="nome" value="<?php echo $user_data['nome'];?>">
          <input class="form__input" type="text" placeholder="Email" name="email" value="<?php echo $user_data['email'];?>">
          <input class="form__input" type="password" placeholder="Senha" name="senha" value="<?php echo $user_data['senha'];?>">
          <input class="form__input" type="text" id="cpf" placeholder="CPF" name="cpf" value="<?php echo $user_data['cpf'];?>">
          <input class="form__input" type="date"  placeholder="Data de nascimento" name="data_nasc" value="<?php echo $user_data['data_nasc'];?>"> 
          <input class="form__input" type="text" id="telefone" placeholder="Telefone" name="telefone" value="<?php echo $user_data['telefone'];?>">
          <input class="form__input" type="text" id="cep" placeholder="CEP" name="cep" value="<?php echo $user_data['cep'];?>">
          <input class="form__input" type="number" placeholder="Número" name="numero" value="<?php echo $user_data['numero'];?>">
          <input type="submit" name="submit2" class="enviar" value="SALVAR ALTERAÇÕES">
        </form>
        <img src="../images/funcionario.png" alt="">
    </article>
       


</body>
</html>