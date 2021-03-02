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

<body onload="document.getElementById('reset').click();">

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
                        <a href="../../index.php"><i class="fa fa-fw fa-home"></i> Início</a>
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
                            Cadastro <small>Compras</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="../../index.php"><i class="fa fa-dashboard"></i> Início</a>
                            </li>
                            <li>
                                <a href="javascript:;"><i class="fa fa-usd"></i> Compras</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Cadastro
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
                                    <a href="javascript:;" class="btn btn-default disabled">Cadastro</a> 
                                    <a href="consulta.php" class="btn btn-default">Consulta</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <tbody>
                                <form action="send_info.php" method="POST" enctype="multipart/form-data">
                                    <tr>
                                        <td width="15%">Local:</td>
                                        <td>
                                            <select name="local" class="form-control">
                                                <?php
                                                    require_once("../../link.php");
                                                    $sql = mysqli_query($link,"select * from mercados order by name");
                                                    $options = "<option value=''>Selecione o local</option>";
                                                    while($dados = mysqli_fetch_array($sql)){
                                                        $options .= "<option value='".$dados['name']." [".$dados['local']."]'>".$dados['name']." [".$dados['local']."]</option>";
                                                    }
                                                    echo $options;
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="15%">Data:</td>
                                        <td><input type="text" class="form-control" id="data" name="data" placeholder="Digite a data" value="<?php echo date("d/m/Y"); ?>"></td>
                                    </tr>
                                    <tr>
                                        <td width="15%">Hora:</td>
                                        <td><input type="text" class="form-control" name="hora" placeholder="Digite a hora" id="hora"></td>
                                    </tr>
                                    <tr>
                                        <td width="15%">Anexo:</td>
                                        <td><input type="file" class="form-control" name="anexo"></td>
                                    </tr>
                                    <tr>
                                        <td width="15%">Metodo de pagamento:</td>
                                        <td>
                                            <select name="met_pag" class="form-control" id="met_pag">
                                                <?php
                                                    require_once("../../link.php");
                                                    $sql = mysqli_query($link,"select * from met_pag order by name");
                                                    $options = "";
                                                    $array = array('Débito','Crédito','Dinheiro','Vale');
                                                    while($dados = mysqli_fetch_array($sql)){
                                                        $options .= "<option value='".$dados['name'].":..:".$dados['tipo'].";.,;".$dados['fech_fat']."'>".$dados['name']."[".$array[$dados['tipo']]."]</option>";
                                                    }
                                                    echo "<option value=''>Selecione o método de pagamento</option>";
                                                    echo $options;
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="15%">Valor:</td>
                                        <td><input type="text" class="form-control" name="valor" placeholder="Digite o valor" id="valor"></td>
                                    </tr>
                                    <tr>
                                        <td width="15%">Ações:</td>
                                        <td><button type="submit" class="btn btn-success">Registrar</button> <button type="reset" class="btn btn-default" id="reset" onclick="hide_all();">Recomençar</button></td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                        <div id="send_status" class="" style="display: none;">
                            <span id="send_status_string"></span>
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
