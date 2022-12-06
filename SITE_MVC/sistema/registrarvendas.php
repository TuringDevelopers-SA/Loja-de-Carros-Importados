<?php include 'nav.php' ?>
<?php
    if(isset($_POST['submit']))
    {
    
        include_once('config.php');
        $cliente = $_POST['cliente'];
        $carro = $_POST['carro'];
        $pagamento = $_POST['pagamento'];

        $clientesql = "SELECT * FROM tbl_clientes WHERE id = '$cliente'";
        $consulta = $conexao->query($clientesql);

        $carrosql = "SELECT * FROM tbl_carros WHERE id = '$carro'";
        $consulta2 = $conexao->query($carrosql);

        
        if(mysqli_num_rows($consulta) < 1)
        {
            include '..\scripts\alertas\alertvenda.php';
        }
        else if(mysqli_num_rows($consulta2) < 1){
            include '..\scripts\alertas\alertcarro.php';
        }
            
        else{

            $user = mysqli_fetch_assoc($consulta);
            $nome = $user['nome'];
            $cpf = $user['cpf'];
            $telefone = $user['telefone'];
            $cep = $user['cep'];
            $numero = $user['numero'];

            

            $veiculo = mysqli_fetch_assoc($consulta2);
            $placa = $veiculo['placa'];
            $marca = $veiculo['marca'];
            $modelo = $veiculo['modelo'];
            $ano = $veiculo['ano'];
            $valor = $veiculo['valor'];
            $data_venda = $_POST['venda'];

            $cadastro = mysqli_query($conexao, "INSERT INTO tbl_vendas(nome,cpf,cep,telefone,numero,placa,marca,modelo,ano,valor,pagamento,data_venda)
            VALUES ('$nome','$telefone','$cep','$numero','$placa','$marca','$modelo','$ano','$valor','$pagamento','$data_venda')");

            $deletar = mysqli_query($conexao, "DELETE FROM tbl_carros where placa = '$placa'");

            include 'C:\wamp64\www\LojaCarrosImportados\alertas\sucess.php';

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
    <title>Cadastrar Funcionário</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            font-family: sans-serif;
            color: white
        }
        :root{
            --color-white: #fff;
            --color-red: #e63636;
            --color-dark1: #181818;
            --color-dark2: #1e1e1e;
            --color-purple1: #9333FF;
            --color-purple2: indigo;
        }
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: var(--color-dark1);
            color: var(--color-white);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
        }

        .content{
            background-color: var(--color-dark2);
            padding: 2rem;
            border-radius: 10px;
            min-width: 30%;
            width: 400px;
            overflow: auto;
        }

        h1{
            margin-bottom: 1rem;
            text-align: center;
        }

        .content form{
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .span-required{
            font-size: 12px;
            margin: 3px 0 0 1px;
            color: var(--color-red);
            display: none;
        }

        .inputs{
            padding: 8px 5px;
            outline: none;
            border-radius: 5px;
            background-color: var(--color-dark1);
            border: 2px solid var(--color-dark1);
            color: var(--color-white);
            width: 100%;
            box-sizing: border-box;
            transition: .3s;
        }

        .inputs:focus{
            border-color: var(--color-purple1);
        }

        .box-select{
            display: flex;
            justify-content: space-evenly;
            font-weight: bold;
            gap: 1rem;
        }

        @media screen and (max-width: 576px) {
            .box-select{
                flex-direction: column;
                gap: 5px;
            }
        }
        #enviar, #limpar{
            background-color: black;
            border-radius: 10px;
            width: 48%;
            height: 30px;
            cursor: pointer;
            transition: .5s;
        }
        #enviar:hover{
            background-color: green;
        }
        #limpar:hover{
            background-color: red;
        }
        .botao{
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        #local{
            width: 100%;
        }
        #endereco{
            width: 79%;
        }
        #numero{
            padding: 8px 5px;
            outline: none;
            border-radius: 5px;
            background-color: var(--color-dark1);
            border: 2px solid var(--color-dark1);
            color: var(--color-white);
            width: 100%;
            box-sizing: border-box;
            transition: .3s;
            text-align: center;
            width: 19%;
        }
        #numero:focus{
            border-color: var(--color-purple1);
        }
    </style>

</head>
<body>

  <!-- <script type="text/javascript">
    $(document).ready(function() {
        swal({
            title: "User created!",
            text: "Suceess message sent!!",
            icon: "success",
            button: "Ok",
            timer: 2000
        });
    });
</script>  -->
    <div class="content">
        <h1>REGISTRAR VENDA</h1>
        <form id="form" action="registrarvendas.php" method="post">
            <div>
                <input type="text" placeholder="id do cliente" class="inputs required" name="cliente" id="nome" required>
            </div>
            <div>
                <input type="text" placeholder="id do veiculo" class="inputs required" name="carro" required>
            </div>

            <div>
                <input type="text" placeholder="metodo de pagamento" class="inputs required" name="pagamento" required>
            </div>
            
            <div>
                <input type="date" placeholder="dd/mm/aaaa" class="inputs required" name="venda" required>
            </div>
            
            <div class="botao">     
                <input type="submit" name="submit" value="REGISTRAR" id="enviar">
                <input type="reset" value="LIMPAR" id="limpar">
            </div>    
        </form>
    </div>
</body>
</html>