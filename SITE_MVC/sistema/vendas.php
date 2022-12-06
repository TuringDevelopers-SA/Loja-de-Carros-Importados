<?php include 'nav.php' ?>

<?php
    include_once('config.php');

    $sql = "SELECT * FROM tbl_vendas ORDER BY id ASC";

    $result = $conexao->query($sql);

    



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de Dados</title>
    <style>
        body{
            width: 87%;
            float: right;
            background-color: midnightblue;
            color: white;
        }
        table {
            font-family: sans-serif;
            width: 90%;
            text-align: center;
            margin-top: 20px;
            background-color: black
        }

        td, th {
            border: 2px solid blue;
            padding: 8px;
        }
        th{
            text-align: center;
        }
        .tabelaUsuario{
            overflow-x: auto;
        }

    </style>
</head>
<body>
    <div class="tabelaUsuario">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="11">REGISTRO DE VENDAS</th>
                </tr>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                <th scope="col">Endereço</th>
                <th scope="col">Numero</th>
                <th scope="col">Placa</th>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Ano</th>
                <th scope="col">Valor</th>
                <th scope="col">Data da Venda</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($result))
                    {


                        $valordouble = doubleval($user_data['valor']);

                        $data_timestamp = strtotime($user_data['data_venda']);

                        $data_brasileira = date("d/m/Y",$data_timestamp);

                        

                        echo"<tr>";
                        echo"<td>".$user_data['id']."</td>";
                        echo"<td>".$user_data['nome']."</td>";
                        echo"<td>".$user_data['telefone']."</td>";
                        echo"<td>".$user_data['endereco']."</td>";
                        echo"<td>".$user_data['numero']."</td>";
                        echo"<td>".$user_data['placa']."</td>";
                        echo"<td>".$user_data['marca']."</td>";
                        echo"<td>".$user_data['modelo']."</td>";
                        echo"<td>".$user_data['ano']."</td>";
                        echo"<td>".$valordouble."</td>";
                        echo"<td>".$data_brasileira."</td>";
                        echo"</tr>";
                    }

                    
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>