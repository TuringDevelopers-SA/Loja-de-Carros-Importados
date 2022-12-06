<?php 
 include 'contador.php';

  $sql = "SELECT * FROM tbl_carros ORDER BY id ASC";

  $result = $conexao->query($sql);

    $maserati = 0;
    $audi = 0;
    $bmw = 0;
    $ferrari = 0;
    $jaguar = 0;
    $bugatti = 0;
    $lamborghini = 0;
    $porsche = 0;
    $tesla = 0;
    $mercedes = 0;

    while($user_data = mysqli_fetch_assoc($result))
    {
        if($user_data['marca'] == "AUDI"){
          $audi++;
        }
        else if($user_data['marca'] == "MASERATI"){
          $maserati++;
        }
        else if($user_data['marca'] == "BMW"){
          $bmw++;
        }
        else if($user_data['marca'] == "FERRARI"){
          $ferrari++;
        }
        else if($user_data['marca'] == "JAGUAR"){
          $jaguar++;
        }
        else if($user_data['marca'] == "BUGATTI"){
          $bugatti++;
        }
        else if($user_data['marca'] == "LAMBORGHINI"){
          $lamborghini++;
        }
        else if($user_data['marca'] == "PORSCHE"){
          $porsche++;
        }
        else if($user_data['marca'] == "TESLA"){
          $tesla++;
        }
        else if($user_data['marca'] == "MERCEDES"){
          $mercedes++;
        }

    }

    $janeiro = 0;
    $fevereiro = 0;
    $marco = 0;
    $abril = 0;
    $maio = 0;
    $junho = 0;
    $julho = 0;
    $agosto = 0;
    $setembro = 0;
    $outubro = 0;
    $novembro = 0;
    $dezembro = 0;

    $mesvenda = "SELECT MONTH(data_venda) as MES FROM tbl_vendas";
    $resultadovenda = $conexao->query($mesvenda);
    while($user = mysqli_fetch_assoc($resultadovenda))
     {
      if($user['MES'] == '1')
      {
        $janeiro++;
      }
      else if($user['MES'] == '2')
      {
        $fevereiro++;
      }
      else if($user['MES'] == '3')
      {
        $marco++;
      }
      else if($user['MES'] == '4')
      {
        $abril++;
      }
      else if($user['MES'] == '5')
      {
        $maio++;
      }
      else if($user['MES'] == '6')
      {
        $junho++;
      }
      else if($user['MES'] == '7')
      {
        $julho++;
      }
      else if($user['MES'] == '8')
      {
        $agosto++;
      }
      else if($user['MES'] == '9')
      {
        $setembro++;
      }
      else if($user['MES'] == '10')
      {
        $outubro++;
      }
      else if($user['MES'] == '11')
      {
        $novembro++;
      }
      else{
        $dezembro++;
      }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="../css/estatistica.css">
     
    <title>Administrador</title>

</head>
<body>



<figure class="highcharts-figure">
  <div id="container"></div>
  <p class="highcharts-description">
    Chart designed to highlight 3D column chart rendering options.
    Move the sliders below to change the basic 3D settings for the chart.
    3D column charts are generally harder to read than 2D charts, but provide
    an interesting visual effect.
  </p>
  <div id="sliders">
    <table>
      <tbody><tr>
        <td><label for="alpha">Eixo Y</label></td>
        <td><input id="alpha" type="range" min="0" max="45" value="15"> <span id="alpha-value" class="value"></span></td>
      </tr>
      <tr>
        <td><label for="beta">Eixo X</label></td>
        <td><input id="beta" type="range" min="-45" max="45" value="15"> <span id="beta-value" class="value"></span></td>
      </tr>
      <tr>
        <td><label for="depth">Profundidade</label></td>
        <td><input id="depth" type="range" min="20" max="100" value="50"> <span id="depth-value" class="value"></span></td>
      </tr>
    </tbody></table>
  </div>


</figure>  
<div id="container2"></div>

<div id="container4"></div>

<div id="container3"></div>
  



    <?php  include 'nav.php'; 
    ?>
</body>
</html>

<script>
  const chart = new Highcharts.Chart({
    chart: {
        renderTo: 'container',
        type: 'column',
        options3d: {
        enabled: true,
        alpha: 0,
        beta: 2,
        depth: 100,
        viewDistance: 25
        }
    },
    xAxis: {
        categories: ['Maserati','Audi', 'Bmw', 'Ferrari', 'Jaguar', 'Bugatti', 'Lamborghini',
        'Porsche', 'Tesla', 'Mercedes']
    },
    yAxis: {
        title: {
        enabled: false
        }
    },
    tooltip: {
        headerFormat: '<b>{point.key}</b><br>',
        pointFormat: ' {point.y}'
    },
    title: {
        text: 'VALOR DO ESTOQUE POR MARCA'
    },

    legend: {
        enabled: false
    },
    plotOptions: {
        column: {
        depth: 25,

        }
    },

    series: [{
        data: [<?=$floatmaserati?>, <?=$floataudi?>, <?=$floatbmw?>, <?=$floatferrari?>, <?=$floatjaguar?>, <?=$floatbugatti?>, <?=$floatlamborghini?>, <?=$floatporsche?>, <?=$floattesla?>, <?=$floatmercedes?>],
        colorByPoint: true,
      //  colors: [
      //  'darkblue',
      //  'silver',
      //  'lightblue',
      //  'red',
      //  'black',
      //  'darkred',
      //  'darkgrey',
      //  'silver',
      // 'blue',
      //  'lightgrey'
    //]
    }]
    });

    function showValues() {
    document.getElementById('alpha-value').innerHTML = chart.options.chart.options3d.alpha;
    document.getElementById('beta-value').innerHTML = chart.options.chart.options3d.beta;
    document.getElementById('depth-value').innerHTML = chart.options.chart.options3d.depth;
    }

    // Activate the sliders
    document.querySelectorAll('#sliders input').forEach(input => input.addEventListener('input', e => {
    chart.options.chart.options3d[e.target.id] = parseFloat(e.target.value);
    showValues();
    chart.redraw(false);
    }));

    showValues();
</script>
  
<script>
  Highcharts.chart('container2', {
  chart: {
    styledMode: true
  },
  title: {
    text: 'QUANTIDADE DO ESTOQUE POR MARCA'
  },
  series: [{
    type: 'pie',
    allowPointSelect: true,
    keys: ['name', 'y', 'selected', 'sliced'],
    data: [
      ['Maserati', <?=$maserati?>, true, true],
      ['Audi', <?=$audi?>, false],
      ['BMW', <?=$bmw?>, false],
      ['Ferrari', <?=$ferrari?>, false],
      ['Jaguar', <?=$jaguar?>, false],
      ['Bugatti', <?=$bugatti?>, false],
      ['Lamborghini', <?=$lamborghini?>, false],
      ['Porsche', <?=$porsche?>, false],
      ['Tesla', <?=$tesla?>, false],
      ['Mercedes', <?=$mercedes?>, false]
    ],
    showInLegend: true
  }]
  });
</script>

<script>

  Highcharts.chart('container3', {
  chart: {
    type: 'spline'
  },
  title: {
    text: 'VENDAS POR MÊS'
  },
  xAxis: {
    categories: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun',
      'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
    accessibility: {
      description: 'Months of the year'
    }
  },
  yAxis: {
    title: {
      text: 'QUANTIDADE'
    },
    labels: {
      formatter: function () {
        return this.value ;
      }
    }
  },
  tooltip: {
    crosshairs: true,
    shared: true
  },
  plotOptions: {
    spline: {
      marker: {
        radius: 4,
        lineColor: '#666666',
        lineWidth: 1
      }
    }
  },
  series: [{
    name: '2022',
    marker: {
      symbol: 'square'
    },
    data: [<?=$janeiro?>, <?=$fevereiro?>, <?=$marco?>, <?=$abril?>, <?=$maio?>, <?=$junho?>, <?=$julho?>, <?=$agosto?>, <?=$setembro?>, <?=$outubro?>, <?=$novembro?>, <?=$dezembro?>]

  }, {
    name: '2023',
    marker: {
      symbol: null
    },
    
  }]
  });
</script>

<script>
  Highcharts.chart('container4', {
  chart: {
    type: 'pie',
    options3d: {
      enabled: true,
      alpha: 50
    }
  },
  title: {
    text: 'RENDA BRUTA'
  },
  plotOptions: {
    pie: {
      innerSize: 100,
      depth: 45,  
    }
  },
  series: [{
    name: 'Vendas',
    
    data: [
      ['VENDAS', <?=$floattotalvendas?>],
      ['VALOR EM ESTOQUE', <?=$floattotal?> ], 
      
    ],
    
  }]
  });
</script>
