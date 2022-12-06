<?php

include 'nav.php';

include 'config.php';

    $sql = "SELECT * FROM tbl_clientes WHERE id ='$id'";

    $resultado = $conexao->query($sql);

    $user_data = mysqli_fetch_assoc($resultado);

    if(isset($_POST['submit']))
    {

        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $data_nasc = $_POST['data_nasc'];
        $cep = $_POST['cep'];
        $numero = $_POST['numero'];
        
        $result = mysqli_query($conexao, "ALTER TABLE tbl_clientes(nome,cpf,telefone,data_nasc,cep,numero)
        VALUES ('$nome','$cpf','$telefone','$data_nasc','$cep','$numero') WHERE id='$id'");

        include '..\scripts\alertas\alertalter.php';  
    }

    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script src="../scripts/mask.js"></script>
    <link rel="stylesheet" href="../css/cadastro.css">
    <title>Cadastrar Funcionário</title>

</head>
<body>
    <div class="content">
        <h1>Alterar Registros</h1>
        <form id="form" action="edit.php" method="post">
            <div>
                <input type="text" placeholder="Nome" class="inputs required" name="nome" id="nome" required value="<?php echo $user_data['nome'];?>">
            </div>
            <div>
                <input type="text" placeholder="CPF" id="cpf" class="inputs required" name="cpf" required value="<?php echo $user_data['cpf'];?>">
            </div>
            <div>
                <input type="text" placeholder="telefone" id="telefone" class="inputs required" name="telefone" required value="<?php echo $user_data['telefone'];?>">
            </div>
            <div>
                <input type="date" placeholder="data de nascimento" class="inputs required" name="data_nasc"  maxlength="4" minlength="4" required value="<?php echo $user_data['data_nasc'];?>">
            </div>
            <div>
                <input type="text" placeholder="CEP" id="cep" class="inputs required" name="cep" required value="<?php echo $user_data['cep'];?>">
            </div>
            <div>
                <input type="text" placeholder="N°" class="inputs required" name="numero" required value="<?php echo $user_data['numero'];?>">
            </div>
            <div class="botao">     
                <input type="submit" name="submit" value="SALVAR" id="enviar">
                <input type="reset" value="LIMPAR" id="limpar">
            </div>    
        </form>
    </div>

</body>
</html>