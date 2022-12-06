<?php 
     include 'config.php';

     $query = "SELECT SUM(valor) AS sum FROM `tbl_vendas`";

   $query_result = mysqli_query($conexao, $query);
 
   while($row = mysqli_fetch_assoc($query_result)){
     $totalvendas = $row['sum'];
     $floattotalvendas = floatval($totalvendas);
   }

   $query = "SELECT SUM(valor) AS sum FROM `tbl_carros`";

   $query_result = mysqli_query($conexao, $query); 
 
   while($row = mysqli_fetch_assoc($query_result)){
     $total = $row['sum'];
     $floattotal = floatval($total);
   }

  $query = "SELECT SUM(valor) AS sum FROM `tbl_carros` WHERE marca = 'AUDI'";

  $query_result = mysqli_query($conexao, $query);

  while($row = mysqli_fetch_assoc($query_result)){
    $audivalor = $row['sum'];
    $floataudi = floatval($audivalor);
  }

  $query = "SELECT SUM(valor) AS sum FROM `tbl_carros` WHERE marca = 'MASERATI'";

  $query_result = mysqli_query($conexao, $query);

  while($row = mysqli_fetch_assoc($query_result)){
    $maserativalor = $row['sum'];
    $floatmaserati = floatval($maserativalor);
  }

  $query = "SELECT SUM(valor) AS sum FROM `tbl_carros` WHERE marca = 'BMW'";

  $query_result = mysqli_query($conexao, $query);

  while($row = mysqli_fetch_assoc($query_result)){
    $bmwvalor = $row['sum'];
    $floatbmw = floatval($bmwvalor);
  }

  $query = "SELECT SUM(valor) AS sum FROM `tbl_carros` WHERE marca = 'FERRARI'";

  $query_result = mysqli_query($conexao, $query);

  while($row = mysqli_fetch_assoc($query_result)){
    $ferrarivalor = $row['sum'];
    $floatferrari = floatval($ferrarivalor);
  }

  $query = "SELECT SUM(valor) AS sum FROM `tbl_carros` WHERE marca = 'JAGUAR'";

  $query_result = mysqli_query($conexao, $query);

  while($row = mysqli_fetch_assoc($query_result)){
    $jaguarvalor = $row['sum'];
    $floatjaguar = floatval($jaguarvalor);
  }

  $query = "SELECT SUM(valor) AS sum FROM `tbl_carros` WHERE marca = 'BUGATTI'";

  $query_result = mysqli_query($conexao, $query);

  while($row = mysqli_fetch_assoc($query_result)){
    $bugattivalor = $row['sum'];
    $floatbugatti = floatval($bugattivalor);
  }

  $query = "SELECT SUM(valor) AS sum FROM `tbl_carros` WHERE marca = 'LAMBORGHINI'";

  $query_result = mysqli_query($conexao, $query);

  while($row = mysqli_fetch_assoc($query_result)){
    $lamborghinivalor = $row['sum'];  
    $floatlamborghini = floatval($lamborghinivalor);
  }

  $query = "SELECT SUM(valor) AS sum FROM `tbl_carros` WHERE marca = 'PORSCHE'";

  $query_result = mysqli_query($conexao, $query);

  while($row = mysqli_fetch_assoc($query_result)){
    $porschevalor = $row['sum'];
    $floatporsche = floatval($porschevalor);
  }

  $query = "SELECT SUM(valor) AS sum FROM `tbl_carros` WHERE marca = 'TESLA'";

  $query_result = mysqli_query($conexao, $query);

  while($row = mysqli_fetch_assoc($query_result)){
    $teslavalor = $row['sum'];
    $floattesla = floatval($teslavalor);
  }

  $query = "SELECT SUM(valor) AS sum FROM `tbl_carros` WHERE marca = 'MERCEDES'";

  $query_result = mysqli_query($conexao, $query);

  while($row = mysqli_fetch_assoc($query_result)){
    $mercedesvalor = $row['sum'];
    $floatmercedes = floatval($mercedesvalor);
  }

  
?>