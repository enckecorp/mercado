<?php date_default_timezone_set('America/Sao_Paulo'); ?>
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
                    <li class="active">
                        <a href="javascript:;"><i class="fa fa-fw fa-usd"></i> Compras</a>
                    </li>
                    <li>
                        <a href="../relatorios/"><i class="fa fa-fw fa-bar-chart-o"></i> Relatórios</a>
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
                            Detalhes <small>Compras</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="../../index.php"><i class="fa fa-home"></i> Início</a>
                            </li>
                            <li>
                                <a href="javascript:;"><i class="fa fa-usd"></i> Compras</a>
                            </li>
                            <li>
                                <a href="consulta.php"><i class="fa fa-search"></i> Consulta</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Detalhes
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
                                    <a href="index.php" class="btn btn-default">Cadastro</a> 
                                    <a href="consulta.php" class="btn btn-default">Consulta</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <?php
                    if(isset($_REQUEST['id'])){
                        $id = $_REQUEST['id'];
                    } else {
                        $id = null;
                    }
                    if($id == null){
                        echo "<script> history.back(); </script>";
                    }
                    require_once("../../link.php");
                    $sql = mysqli_query($link,"select * from compras where id = '$id'");
                    $dados = mysqli_fetch_array($sql);
                    $array = explode(":..:",$dados['met_pag']);
                    $array2 = explode(";.,;",$array[1]);
                    if($array2[1] != 0){
                        $met_pag = $array[0]." - Fech. da fatura: Dia ".$array2[1];
                    } else {
                        $met_pag = $array[0];
                    }
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <tbody>
                                <tr>
                                    <td width="15%"><b>Local:</b></td>
                                    <td><?php echo $dados['local']; ?></td>
                                </tr>
                                <tr>
                                    <td width="15%"><b>Data:</b></td>
                                    <td><?php echo $dados['data']; ?></td>
                                </tr>
                                <tr>
                                    <td width="15%"><b>Hora:</b></td>
                                    <td><?php echo $dados['hora']; ?></td>
                                </tr>
                                <tr>
                                    <td width="15%"><b>Met. de pagamento:</b></td>
                                    <td><?php echo $met_pag; ?></td>
                                </tr>
                                <tr>
                                    <td width="15%"><b>Valor:</b></td>
                                    <td><?php echo "R$ ".number_format($dados['valor'],2,",","."); ?></td>
                                </tr>
                                <tr>
                                    <td width="15%"><b>Anexo:</b></td>
                                    <td><embed src="anexos/<?php echo $dados['anexo']; ?>" width="100%" height="500px"></td>
                                </tr>
                            </tbody>
                        </table>
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
				mask: ["99/99/9999"],
				keepStatic: true
			});
			$("#hora").inputmask({
				mask: ["99:99 AA","99:99"],
				keepStatic: true
			});
      $("#placa").inputmask({
				mask: ["AAA-9999","AAA9A99"],
				keepStatic: true
			});
		});
    </script>
    <script src="../../js/jquery.maskMoney.min.js"></script>
	<script type="text/javascript">
        $(function() {
            $('#valor').maskMoney({thousands:''});
        });
    </script>
</body>

</html>
