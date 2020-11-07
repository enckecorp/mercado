<?php 
    date_default_timezone_set('America/Sao_Paulo'); 
    require_once("functions_rel.php");
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
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                    <li>
                        <a href="../../index.php"><i class="fa fa-fw fa-dashboard"></i> Início</a>
                    </li>
                    <li>
                        <a href="../mercados/"><i class="fa fa-fw fa-shopping-cart"></i> Mercados</a>
                    </li>
                    <li>
                        <a href="../pagamentos/"><i class="fa fa-fw fa-credit-card"></i> Metodos de pagamento</a>
                    </li>
                    <li>
                        <a href="../compras/"><i class="fa fa-fw fa-usd"></i> Compras</a>
                    </li>
                    <li class="active">
                        <a href="javascript:;"><i class="fa fa-fw fa-bar-chart-o"></i> Relatórios</a>
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
                            Relatórios <small>Mês</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="../../index.php"><i class="fa fa-dashboard"></i> Início</a>
                            </li>
                            <li>
                                <a href="javascript:;"><i class="fa fa-usd"></i> Compras</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i> Relatórios
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <tr>
                                <td align="center">
                                    <a href="dia.php" class="btn btn-default">Dia</a> 
                                    <a href="index.php" class="btn btn-default">Mês</a>
                                    <a href="javascript:;" class="btn btn-default disabled">Ano</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <?php
                    require_once("../../link.php");
                    if(isset($_REQUEST['ano'])){
                        $ano = $_REQUEST['ano'];
                    } else {
                        $ano = date('Y');
                    }
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <form action="#" method="POST">
                                <tr>
                                    <td width="15%">
                                        <b>Ano: </b>
                                    </td>
                                    <td>
                                        <select name="ano" class="form-control">
                                            <?php
                                                for($j = date('Y'); $j >= 2015; $j--){
                                                    if($j == $ano){
                                                        $checked = "selected";
                                                    } else {
                                                        $checked = "";
                                                    }
                                                    echo "<option value='$j' $checked>$j</option>";
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="15%"><b>Ação: </b></td>
                                    <td>
                                        <button type="submit" class="btn btn-success">Gerar</button>
                                    </td>
                                </tr>
                            </form>
                        </table>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo gastos_ano_row($ano); ?></div>
                                        <div>Compras do ano <br><?php echo $ano; ?></div>
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
                        $result = gastos_brutos_ano($ano -1) - gastos_brutos_ano($ano);
                        if($result < 0){
                            $icon = "frown-o";
                        } else if($result > 0){
                            $icon = "smile-o";
                        } else {
                            $icon = "meh-o";
                        }
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-<?php echo $icon; ?> fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo number_format(gastos_brutos_ano($ano -1) - gastos_brutos_ano($ano), 2, ',', '.'); ?></div>
                                        <div>Economia ano <br><?php echo ($ano-1)." => ".$ano; ?></div>
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
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-usd fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo number_format(gastos_brutos_ano($ano), 2, ',', '.'); ?></div>
                                        <div>Custo bruto ano <br><?php echo $ano; ?></div>
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
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {  
                        var data = google.visualization.arrayToDataTable([
                        ['Mês', 'Gastos'],
                        ['1',  <?php echo gastos_brutos_mes(1,$ano); ?>],
                        ['2',  <?php echo gastos_brutos_mes(2,$ano); ?>],
                        ['3',  <?php echo gastos_brutos_mes(3,$ano); ?>],
                        ['4',  <?php echo gastos_brutos_mes(4,$ano); ?>],
                        ['5',  <?php echo gastos_brutos_mes(5,$ano); ?>],
                        ['6',  <?php echo gastos_brutos_mes(6,$ano); ?>],
                        ['7',  <?php echo gastos_brutos_mes(7,$ano); ?>],
                        ['8',  <?php echo gastos_brutos_mes(8,$ano); ?>],
                        ['9',  <?php echo gastos_brutos_mes(9,$ano); ?>],
                        ['10',  <?php echo gastos_brutos_mes(10,$ano); ?>],
                        ['11',  <?php echo gastos_brutos_mes(11,$ano); ?>],
                        ['12',  <?php echo gastos_brutos_mes(12,$ano); ?>]
                        ]);

                        var options = {
                        title: 'Gastos brutos ano <?php echo date("Y"); ?>',
                        hAxis: {title: 'Mês',  titleTextStyle: {color: '#333'}},
                        vAxis: {minValue: 0}
                        };

                        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
                        chart.draw(data, options);
                    }
                </script>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Gastos por mês do ano <?php echo $ano; ?></h3>
                            </div>
                            <div class="panel-body" align="center">
                                <div id="chart_div" style="width: 100%; height: 400px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.inputmask.bundle.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$("#data").inputmask({
				mask: ["99/9999"]
			});
		});
    </script>
</body>

</html>
