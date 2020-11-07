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
                            Relatórios <small>Dia</small>
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
                                    <a href="javascript:;" class="btn btn-default disabled">Dia</a> 
                                    <a href="index.php" class="btn btn-default">Mês</a>
                                    <a href="ano.php" class="btn btn-default">Ano</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <?php
                    require_once("../../link.php");
                    if(isset($_REQUEST['dia'])){
                        $dia = $_REQUEST['dia'];
                    } else {
                        $dia = date('d');
                    }
                    if(isset($_REQUEST['mes'])){
                        $mes = $_REQUEST['mes'];
                    } else {
                        $mes = date('m');
                    }
                    if(isset($_REQUEST['ano'])){
                        $ano = $_REQUEST['ano'];
                    } else {
                        $ano = date('Y');
                    }
                    $data = $dia."/".$mes."/".$ano;
                    $data = explode("/",$data);
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <form action="#" method="POST">
                                <tr>
                                    <td width="15%">
                                        <b>Dia: </b>
                                        <br><br>
                                        <b>Mês: </b>
                                        <br><br>
                                        <b>Ano: </b>
                                    </td>
                                    <td>
                                        <select name="dia" class="form-control">
                                            <?php
                                                for($i = 1; $i <= 31; $i++){
                                                    if($i == $data[0]){
                                                        $checked = "selected";
                                                    } else {
                                                        $checked = "";
                                                    }
                                                    echo "<option value='".str_pad($i, 1, "0", STR_PAD_LEFT)."' $checked>".str_pad($i, 2, "0", STR_PAD_LEFT)."</option>";
                                                }
                                            ?>
                                        </select>
                                        <select name="mes" class="form-control">
                                            <?php
                                                for($i = 1; $i <= 12; $i++){
                                                    if($i == $data[1]){
                                                        $checked = "selected";
                                                    } else {
                                                        $checked = "";
                                                    }
                                                    echo "<option value='".str_pad($i, 1, "0", STR_PAD_LEFT)."' $checked>".str_pad($i, 2, "0", STR_PAD_LEFT)."</option>";
                                                }
                                            ?>
                                        </select>
                                        <select name="ano" class="form-control">
                                            <?php
                                                for($j = date('Y'); $j >= 2015; $j--){
                                                    if($j == $data[2]){
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
                                        <a href="print.php?id=0" class="btn btn-default">Baixar relatório</a>
                                    </td>
                                </tr>
                            </form>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo gastos_dia_row($data[0],$data[1],$data[2]); ?></div>
                                        <div>Compras do dia <br><?php echo $data[0]."/".$data[1]."/".$data[2]; ?></div>
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
                        $result = gastos_liquidos_dia($data[0] - 1,$data[1],$data[2]) - gastos_liquidos_dia($data[0],$data[1],$data[2]);
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
                                        <div class="huge"><?php echo number_format(gastos_liquidos_dia($data[0] - 1,$data[1],$data[2]) - gastos_liquidos_dia($data[0],$data[1],$data[2]), 2, ',', '.'); ?></div>
                                        <div>Economia dia <br><?php echo ($data[0]-1)." => ".$data[0]."/".$data[1]; ?></div>
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
                                        <div class="huge"><?php echo number_format(gastos_liquidos_dia($data[0],$data[1],$data[2]), 2, ',', '.'); ?></div>
                                        <div>Custo liquido dia <br><?php echo $data[0]."/".$data[1]; ?></div>
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
                                        <div class="huge"><?php echo number_format(gastos_brutos_dia($data[0],$data[1],$data[2]), 2, ',', '.'); ?></div>
                                        <div>Custo bruto dia <br><?php echo $data[0]."/".$data[1]; ?></div>
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
                <?php
                    $bruto = number_format(gastos_liquidos_dia($data[0],$data[1],$data[2]), 2, ',', '.');
                    $liquido = number_format(gastos_brutos_dia($data[0],$data[1],$data[2]), 2, ',', '.');
                    $mes_atual = gastos_liquidos_dia($data[0],$data[1],$data[2]);
                    $mes_ant = gastos_liquidos_dia($data[0]-1,$data[1],$data[2]);
                    if($mes_ant != 0){
                        $percent = ($mes_atual / ($mes_ant / 100)) - 100;
                    } else {
                        $percent = 0;
                    }
                    $mes = str_pad($data[1], 2, "0", STR_PAD_LEFT);
                    $dia = str_pad($data[0], 2, "0", STR_PAD_LEFT);
                    $sql = mysqli_query($link,"select * from compras where data = '$dia/".$mes."/".$data[2]."'");
                    $options = "";
                    while($dados_d = mysqli_fetch_array($sql)){
                        $array = array('Débito','Crédito','Dinheiro','Vale');
                        $array_2 = explode(":..:",$dados_d['met_pag']);
                        $array_3 = explode(";.,;",$array_2[1]);
                        $options .= "<tr>
                                        <td>".$dados_d['local']."</td>
                                        <td>".$dados_d['data']."<br>".$dados_d['hora']."</td>
                                        <td>".$dados_d['anexo']."</td>
                                        <td>R$".number_format($dados_d['valor'], 2, ',', '.')."<br>".$array_2[0]."[".$array[$array_3[0]]."]</td>
                                    </tr>";
                    }
                    $html = "<style>
                        #conteudo{
                            width: 600px;
                            margin: 0 auto;
                        }
                    </style>
                    <meta charset='utf-8'>
                    <div align='center' id='conteudo'>
                        <table border='1px' cellpadding='5px' cellspacing='0' width:'100%' id='conteudo'>
                            <tr>
                                <td align='center'><b>Relatório geral dia ".$data[0]."/".$mes."/".$data[1]."</b></td>
                            </tr>
                        </table>
                        <br>
                        <table border='1px' cellpadding='5px' cellspacing='0' width:'100%' id='conteudo'>
                            <tr>
                                <td align='center'><b>Dados gerais</b></td>
                            </tr>
                        </table>
                        <table border='1px' cellpadding='5px' cellspacing='0' width:'100%' id='conteudo'>
                            <tbody>
                                <tr>
                                    <td width='25%'>Total (bruto):</td>
                                    <td>R$ $bruto</td>
                                    <td width='25%'>Total (liquido):</td>
                                    <td>R$ $liquido</td>
                                </tr>
                                <tr>
                                    <td width='25%'>Baixa (%)(".($data[0] - 1)."->".$data[0]."):</td>
                                    <td>".number_format($percent,2,'.','')."%</td>
                                    <td width='25%'>Baixa (R$)(".($data[0] - 1)."->".$data[0]."):</td>
                                    <td>R$ ".number_format(gastos_liquidos_mes($data[0] - 1,$data[1]) - gastos_liquidos_mes($data[0],$data[1]), 2, ',', '.')."</td>
                                </tr>
                                <tr>
                                    <td width='25%'>Nº Compras:</td>
                                    <td>".gastos_dia_row($data[0],$data[1],$data[2])."</td>
                                    <td width='25%'>Maior compra:</td>
                                    <td>R$ ".number_format(maior_menor_dia($data[0],$data[1],$data[2],0), 2, ',', '.')."</td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <table border='1px' cellpadding='5px' cellspacing='0' width:'100%' id='conteudo'>
                            <tr>
                                <td align='center'><b>Total por método de pagamento</b></td>
                            </tr>
                        </table>
                        <table border='1px' cellpadding='5px' cellspacing='0' width:'100%' id='conteudo'>
                            <tbody>
                                <tr>
                                    <td width='15%'>Débito:</td>
                                    <td>R$ ".number_format(valor_por_metodo($data[0],$data[1],0), 2, ',', '.')."</td>
                                    <td width='15%'>Crédito:</td>
                                    <td>R$ ".number_format(valor_por_metodo($data[0],$data[1],1), 2, ',', '.')."</td>
                                </tr>
                                <tr>
                                    <td width='15%'>Vale:</td>
                                    <td>R$ ".number_format(valor_por_metodo($data[0],$data[1],3), 2, ',', '.')."</td>
                                    <td width='15%'>Dinheiro:</td>
                                    <td>R$ ".number_format(valor_por_metodo($data[0],$data[1],2), 2, ',', '.')."</td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <table border='1px' cellpadding='5px' cellspacing='0' width:'100%' id='conteudo'>
                            <tr>
                                <td align='center'><b>Todas as compras do mês</b></td>
                            </tr>
                        </table>
                        <table border='1px' cellpadding='5px' cellspacing='0' width:'100%' id='conteudo'>
                            <thead>
                                <tr>
                                    <td>Local</td>
                                    <td width='10%'>Data</td>
                                    <td>Anexo</td>
                                    <td width='15%'>Valor</td>
                                </tr>
                            </thead>
                            <tbody>
                                $options
                            </tbody>
                        </table>
                    </div>";
                    function gravar($texto){
                        if(file_exists("print.html")){
                            unlink("print.html");
                        }
                        $arquivo = "print.html";
                        $fp = fopen($arquivo, "a+");
                        fwrite($fp, $texto);
                        fclose($fp);
                    }
                    gravar($html);
                ?>
                <!-- /.row -->
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Hora', 'Gastos']
                        <?php
                            for($i = 1; $i <= 24; $i++){
                                $dia = str_pad($i, 1, "0", STR_PAD_LEFT);
                                echo ",['$i', ".gastos_brutos_hora($data[0],str_pad($data[1], 2, "0", STR_PAD_LEFT),$data[2],$i)."]";
                            }
                        ?>
                        ]);

                        var options = {
                        title: 'Gastos do dia <?php echo $data[0]."/".$data[1]."/".$data[2]; ?>',
                        hAxis: {title: 'Hora',  titleTextStyle: {color: '#333'}},
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
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Gastos do dia <?php echo $data[0]."/".$data[1]."/".$data[2]; ?></h3>
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
</body>

</html>
