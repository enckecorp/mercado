<?php
  require_once("api/path.php");
  $return = json_decode(file_get_contents($path."?tkn=3f6b5c64413139312bbc6c04c6060369"));
  $return_old = json_decode(file_get_contents($path."?tkn=3f6b5c64413139312bbc6c04c6060369&year=".(date("Y")-1)));
?>
<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mercado</title>

      
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart2);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mês', 'Gastos'],
          ['1',  <?php echo $return->bruto_mes[1]; ?>],
          ['2',  <?php echo $return->bruto_mes[2]; ?>],
          ['3',  <?php echo $return->bruto_mes[3]; ?>],
          ['4',  <?php echo $return->bruto_mes[4]; ?>],
          ['5',  <?php echo $return->bruto_mes[5]; ?>],
          ['6',  <?php echo $return->bruto_mes[6]; ?>],
          ['7',  <?php echo $return->bruto_mes[7]; ?>],
          ['8',  <?php echo $return->bruto_mes[8]; ?>],
          ['9',  <?php echo $return->bruto_mes[9]; ?>],
          ['10',  <?php echo $return->bruto_mes[10]; ?>],
          ['11',  <?php echo $return->bruto_mes[11]; ?>],
          ['12',  <?php echo $return->bruto_mes[12]; ?>]
        ]);

        var options = {
          title: 'Gastos brutos ano <?php echo date("Y"); ?>',
          hAxis: {title: 'Mês',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }

      function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['Mês', 'Gastos'],
          ['1',  <?php echo $return->liquido_mes[1]; ?>],
          ['2',  <?php echo $return->liquido_mes[2]; ?>],
          ['3',  <?php echo $return->liquido_mes[3]; ?>],
          ['4',  <?php echo $return->liquido_mes[4]; ?>],
          ['5',  <?php echo $return->liquido_mes[5]; ?>],
          ['6',  <?php echo $return->liquido_mes[6]; ?>],
          ['7',  <?php echo $return->liquido_mes[7]; ?>],
          ['8',  <?php echo $return->liquido_mes[8]; ?>],
          ['9',  <?php echo $return->liquido_mes[9]; ?>],
          ['10',  <?php echo $return->liquido_mes[10]; ?>],
          ['11',  <?php echo $return->liquido_mes[11]; ?>],
          ['12',  <?php echo $return->liquido_mes[12]; ?>]
        ]);

        var options = {
          title: 'Gastos liquidos ano <?php echo date("Y"); ?>',
          hAxis: {title: 'Mês',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
    </script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Mercado</a>
            </div>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="javascript:;"><i class="fa fa-fw fa-home"></i> Início</a>
                    </li>
                    <li>
                        <a href="modules/mercados/"><i class="fa fa-fw fa-shopping-cart"></i> Mercados</a>
                    </li>
                    <li>
                        <a href="modules/pagamentos/"><i class="fa fa-fw fa-credit-card"></i> Metodos de pagamento</a>
                    </li>
                    <li>
                        <a href="modules/compras/"><i class="fa fa-fw fa-usd"></i> Compras</a>
                    </li>
                    <li>
                        <a href="modules/relatorios/"><i class="fa fa-fw fa-bar-chart-o"></i> Relatórios</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Início <small>Relatórios gerais</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Início
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $return->mes_row[date("n")]; ?></div>
                                        <div>Compras do mês <br><?php echo date("m/Y"); ?></div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Detalhes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php
                        if((date("n") - 1) == 0){
                            $mes_old = $return_old->liquido_mes[12];
                            $string = "12/".(date("Y") - 1);
                        } else {
                            $mes_old = $return->liquido_mes[date("n") - 1];
                            $string = date("m") - 1;
                        } 
                        $mes = $return->liquido_mes[date("n")];
                        $result = $mes_old - $mes;
                        if($result < 0){
                            $icon = "frown-o";
                        } else if($result > 0){
                            $icon = "smile-o";
                        } else {
                            $icon = "meh-o";
                        }
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-<?php echo $icon; ?> fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo number_format($result, 2, ',', '.'); ?></div>
                                        <div>Economia mês <br><?php echo $string." => ".date("m/Y"); ?></div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Detalhes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-usd fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo number_format($mes, 2, ',', '.'); ?></div>
                                        <div>Custo liquido mês <br><?php echo date("m/Y"); ?></div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Detalhes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-usd fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo number_format($return->bruto_mes[date("n")], 2, ',', '.'); ?></div>
                                        <div>Custo bruto mês <br><?php echo date("m/Y"); ?></div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Detalhes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Gastos brutos ano <?php echo date("Y"); ?></h3>
                            </div>
                            <div class="panel-body" align="center">
                                <div id="chart_div" style="width: 100%; height: 400px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Gastos liquidos ano <?php echo date("Y"); ?></h3>
                            </div>
                            <div class="panel-body" align="center">
                                <div id="chart_div2" style="width: 100%; height: 400px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-footer">
                            Backup
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <a href="anexos.php" class="btn btn-default" title="Gerar backup"><i class="fa fa-download"></i> Anexos</a>
                                <a href="dados.php" class="btn btn-default" title="Gerar backup"><i class="fa fa-download"></i> Dados</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
