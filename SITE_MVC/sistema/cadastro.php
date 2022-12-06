<?php include 'nav.php' ?>
<?php
    if(isset($_POST['submit']))
    {

        include_once('config.php');

        $cpf = $_POST['cpf'];

        $sql = "SELECT * FROM tbl_clientes WHERE cpf = '$cpf'";

        $consulta = $conexao->query($sql);

        if(mysqli_num_rows($consulta) == 1)
        {
            include '..\scripts\alertas\alertcli.php';  
        }
        else{
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $telefone = $_POST['telefone'];
            $data_nasc = $_POST['data_nasc'];
            $cep = $_POST['cep'];
            $numero = $_POST['numero'];
        
            $result = mysqli_query($conexao, "INSERT INTO tbl_clientes(nome,cpf,telefone,data_nasc,cep,numero)
            VALUES ('$nome','$cpf','$telefone','$data_nasc','$cep','$numero')");

            include '..\scripts\alertas\sucess.php';  
        }
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
        <h1>CADASTRAR CLIENTE</h1>
        <form id="form" action="cadastro.php" method="post">
            <div>
                <input type="text" placeholder="Nome" class="inputs required" name="nome" id="nome" required>
            </div>
            <div>
                <input type="text" placeholder="CPF" id="cpf" class="inputs required" name="cpf" required>
            </div>
            <div>
                <input type="text" placeholder="telefone" id="telefone" class="inputs required" name="telefone" required>
            </div>
            <div>
                <input type="date" placeholder="data de nascimento" class="inputs required" name="data_nasc"  maxlength="4" minlength="4" required>
            </div>
            <div>
                <input type="text" placeholder="CEP" id="cep" class="inputs required" name="cep" required>
            </div>
            <div>
                <input type="text" placeholder="N°" class="inputs required" name="numero" required>
            </div>
            <div class="botao">     
                <input type="submit" name="submit" value="CADASTRAR" id="enviar">
                <input type="reset" value="LIMPAR" id="limpar">
            </div>    
        </form>
    </div>

    <script>
        $("#placa").mask("AAA9A99");
    </script>
</body>
</html>