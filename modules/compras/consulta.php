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
    <script>
        function clear(){
            document.getElementById('termo').value = "";
        }
        function hide(){
            document.getElementById('termo_show').style.display = "none";
        }
        function method_search(){
            var form_id = document.getElementById('met_search').value;
            clear();
            hide();
            if(form_id == "all"){
                //form mostrar tudo
                document.getElementById('search_status').value = "0";
                document.getElementById('search_form').action = "?id=0";
                document.getElementById('submit').click();
            } else if(form_id == "termo"){
                //form da pesquisa geral
                document.getElementById('search_status').value = "1";
                document.getElementById('termo_show').style.display = "";
                document.getElementById('search_form').action = "?id=1";
            }
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
                        <a href="index.php"><i class="fa fa-fw fa-usd"></i> Compras</a>
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
                            Consulta <small>Compras</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="../../index.php"><i class="fa fa-dashboard"></i> Início</a>
                            </li>
                            <li>
                                <a href="index.php"><i class="fa fa-usd"></i> Compras</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-search"></i> Consulta
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <tr>
                                <td align="center"><a href="index.php" class="btn btn-default">Cadastro</a> <a href="javascript:;" class="btn btn-default disabled">Consulta</a></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <tbody>
                                <form action="" method="POST" id="search_form">
                                    <?php
                                        if(isset($_REQUEST['id'])){
                                            $id = $_REQUEST['id'];
                                        } else {
                                            $id = 0;
                                        }
                                        $termo = "none";
                                        $data = "none";
                                        $all_opt = null;
                                        $termo_opt = null;
                                        $data_opt = null;
                                        if($id == 1){
                                            //termo
                                            $termo = null;
                                            $termo_opt = "selected";
                                        } else if($id == 2){
                                            //data
                                            $data = null;
                                            $data_opt = "selected";
                                        } else {
                                            $all_opt = "selected";
                                        }
                                    ?>
                                    <input type="hidden" value="<?php echo $id; ?>" name="search_status" id="search_status">
                                    <tr>
                                        <td width="15%">Método de pesquisa:</td>
                                        <td>
                                            <select id="met_search" class="form-control" onchange="method_search();">
                                                <option value="all" <?php echo $all_opt; ?>>Mostrar tudo</option>
                                                <option value="termo" <?php echo $termo_opt; ?>>Termo</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <!-- termo -->
                                    <tr id="termo_show" style="display: <?php echo $termo; ?>;">
                                        <td width="15%">Termo:</td>
                                        <td><input type="text" class="form-control" name="search" id="termo" placeholder="Termo a ser pesquisado"></td>
                                    </tr>
                                    <!-- /termo -->
                                    <tr>
                                        <td width="15%">Ações:</td>
                                        <td><button type="submit" class="btn btn-success" id="submit">Pesquisar</button></td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                        <?php
                            if(isset($_REQUEST['search'])){
                                $search = $_REQUEST['search'];
                            } else {
                                $search = null;
                            }
                            if(isset($_REQUEST['search_status'])){
                                $where = $_REQUEST['search_status'];
                            } else {
                                $where = null;
                            }
                            require_once("../../link.php");
                            if($where == "0"){
                                //mostrar todos
                                $sql = mysqli_query($link,"select * from compras order by id desc limit 20");
                                if(mysqli_num_rows($sql) != null){
                                    $show = "<table class='table table-striped table-bordered table-condensed table-hover'>
                                        <thead>
                                            <tr>
                                                <td>Local</td>
                                                <td width='10%'>Valor</td>
                                                <td width='5%'>Ação</td>
                                            </tr>
                                        </thead>
                                        <tbody>";
                                    while($dados = mysqli_fetch_array($sql)){
                                        $show .= "<tr>
                                                    <td>".$dados['local']."</td>
                                                    <td>R$ ".number_format($dados['valor'], 2, ',', '.')."</td>
                                                    <td><a href='details.php?id=".$dados['id']."' class='btn btn-default'><i class='fa fa-list-alt'></i></a></td>
                                                </tr>";
                                    }
                                    $show .= "</tbody>
                                            </table>";
                                    echo $show;
                                }
                            } else if($where == "1"){
                                //termo
                                $sql = mysqli_query($link,"select * from compras where id like '%$search%' or local like '%$search%' or data like '%$search%' or hora like '%$search%' or anexo like '%$search%' or valor like '%$search%' order by id desc limit 20");
                                if(mysqli_num_rows($sql) != null){
                                    $show = "<table class='table table-striped table-bordered table-condensed table-hover'>
                                        <thead>
                                            <tr>
                                                <td>Local</td>
                                                <td width='10%'>Valor</td>
                                                <td width='5%'>Ação</td>
                                            </tr>
                                        </thead>
                                        <tbody>";
                                    while($dados = mysqli_fetch_array($sql)){
                                        $show .= "<tr>
                                                    <td>".$dados['local']."</td>
                                                    <td>R$ ".number_format($dados['valor'], 2, ',', '.')."</td>
                                                    <td><a href='details.php?id=".$dados['id']."' class='btn btn-default'><i class='fa fa-list-alt'></i></a></td>
                                                </tr>";
                                    }
                                    $show .= "</tbody>
                                                </table>";
                                    echo $show;
                                }
                            }
                            if($where == null){
                                //pesquisa inicial = mostrar todos
                                $sql = mysqli_query($link,"select * from compras order by id desc limit 20");
                                if(mysqli_num_rows($sql) != null){
                                    $show = "<table class='table table-striped table-bordered table-condensed table-hover'>
                                        <thead>
                                            <tr>
                                                <th>Local</th>
                                                <th width='10%'>Data</th>
                                                <th width='10%'>Valor</th>
                                                <th width='5%'>Ação</th>
                                            <tr>
                                        </thead>
                                        <tbody>";
                                    while($dados = mysqli_fetch_array($sql)){
                                        $show .= "<tr>
                                                    <td>".$dados['local']."</td>
                                                    <td>".$dados['data']."<br>".$dados['hora']."</td>
                                                    <td>R$ ".number_format($dados['valor'], 2, ',', '.')."</td>
                                                    <td><a href='details.php?id=".$dados['id']."' class='btn btn-default'><i class='fa fa-list-alt'></i></a></td>
                                                </tr>";
                                    }
                                    $show .= "</tbody>
                                                </table>";
                                    echo $show;
                                }
                            }
                        ?>
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
			$("#from").inputmask({
				mask: ["99/99/9999"],
				keepStatic: true
			});
			$("#to").inputmask({
				mask: ["99/99/9999"],
				keepStatic: true
			});
		});
    </script>
    <script src="../../js/jquery.maskMoney.min.js"></script>
	<script type="text/javascript">
        $(function() {
        $('#valor').maskMoney({prefix:'R$ ',thousands:'',affixesStay: false});
        });
    </script>
</body>

</html>
