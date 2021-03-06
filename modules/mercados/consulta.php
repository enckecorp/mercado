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
                        <a href="../../index.php"><i class="fa fa-fw fa-home"></i> Início</a>
                    </li>
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-shopping-cart"></i> Mercados</a>
                    </li>
                    <li>
                        <a href="../pagamentos/"><i class="fa fa-fw fa-credit-card"></i> Metodos de pagamento</a>
                    </li>
                    <li>
                        <a href="../compras/"><i class="fa fa-fw fa-usd"></i> Compras</a>
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
                            Consulta <small>Mercados</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="../../index.php"><i class="fa fa-dashboard"></i> Início</a>
                            </li>
                            <li>
                                <a href="index.php"><i class="fa fa-shopping-cart"></i> Mercados</a>
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
                                <form action="#" method="POST" id="search_form">
                                    <input type="hidden" value="0" name="search_status" id="search_status">
                                    <tr>
                                        <td width="15%">Pesquisa:</td>
                                        <td><input type="text" class="form-control" name="search" placeholder="Termo a ser pesquisado" id="search" required></td>
                                    </tr>
                                    <tr>
                                        <td width="15%">Ações:</td>
                                        <td><button type="submit" class="btn btn-success" id="submit">Pesquisar</button> <button type="button" onclick="javascript: document.getElementById('search').required = false; javascript: document.getElementById('submit').click();" class="btn btn-default">Mostrar todos</button></td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                        <?php
                            require_once("../../api/path.php");
                            if(isset($_REQUEST['search'])){
                                $search = $_REQUEST['search'];
                            } else {
                                $search = null;
                            }
                            $return = json_decode(file_get_contents($path."?tkn=63462fb02bfd351b0bf10b2aca442023&search=$search"));
                            $show = "<table class='table table-striped table-bordered table-condensed table-hover'>
                                <thead>
                                    <tr>
                                        <td>Nome</td>
                                        <td>Local</td>
                                        <td width='5%'>Ação</td>
                                    <tr>
                                </thead>
                                <tbody>";
                            for($i = 0;$i < count($return);$i++){
                                $show .= "<tr>
                                            <td>".$return[$i]->name."</td>
                                            <td>".$return[$i]->local."</td>
                                            <td><a href='drop.php?id=".$return[$i]->id."&tkn=cd78dc116979edf8fbc53abd01482a36' class='btn btn-danger'><i class='fa fa-trash'></i></a></td>
                                        </tr>";
                            }
                            $show .= "</tbody>
                                        </table>";
                            echo $show;
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

</body>

</html>
