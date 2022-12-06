<?php include 'nav.php' ?>
<?php
    if(isset($_POST['submit']))
    {

        include_once('config.php');

        $placa = $_POST['placa'];
        $placa = strtoupper($placa);
        $marca = $_POST['marca'];
        $marca = strtoupper($marca);

        $sql = "SELECT * FROM tbl_carros WHERE placa = '$placa'";

        $consulta = $conexao->query($sql);

        if($marca == 'MASERATI' || $marca == 'BUGATTI' || $marca == 'PORSCHE' || $marca == 'BMW' || $marca == 'LAMBORGHINI' || $marca == 'AUDI' || $marca == 'JAGUAR' || $marca == 'FERRARI' || $marca == 'MERCEDES' || $marca == 'MASERATI')
        {
            if(mysqli_num_rows($consulta) == 1)
        {
            include '..\scripts\alertas\alertplaca.php';  
        }
        else{
            $placa = $_POST['placa'];
            $placa = strtoupper($placa);
            $marca = $_POST['marca'];
            $marca = strtoupper($marca);
            $modelo = $_POST['modelo'];
            $ano = $_POST['ano'];
            $valor = $_POST['valor'];
        
            $result = mysqli_query($conexao, "INSERT INTO tbl_carros(placa,marca,modelo,ano,valor)
            VALUES ('$placa','$marca','$modelo','$ano','$valor')");

            include '..\scripts\alertas\sucess.php';  
        }
        }
        else{
            include '..\scripts\alertas\alertmarca.php'; 
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
            font-size: 25px;
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

        #submit{
            background-color: #181818;
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
        <h1>CADASTRAR VEICULO</h1>
        <form id="form" action="cadastrocarro.php" method="post">
            <div>
                <input type="text" placeholder="PLACA" class="inputs required" name="placa" id="placa" required>
            </div>
            <div>
                <input type="text" placeholder="MARCA" class="inputs required" name="marca" required>
            </div>
            <div>
                <input type="text" placeholder="MODELO" class="inputs required" name="modelo" required>
            </div>
            <div>
                <input type="text" placeholder="ANO" class="inputs required" name="ano"  maxlength="4" minlength="4" required>
            </div>
            <div>
                <input type="number" placeholder="VALOR" class="inputs required" name="valor" required>
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