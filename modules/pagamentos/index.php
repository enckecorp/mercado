<?php
    require_once("../../api/path.php");
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
    <script>
        function fech_fat_status(){
            var tipo = document.getElementById('tipo').value;
            if(tipo == "1"){
                document.getElementById('fech_fat_show').style.display = "";
            } else {
                document.getElementById('fech_fat_show').style.display = "none";
                document.getElementById('null').selected = true;
            }
        }
    </script>
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
                        <a href="../../index.php"><i class="fa fa-fw fa-dashboard"></i> Início</a>
                    </li>
                    <li>
                        <a href="../mercados/"><i class="fa fa-fw fa-shopping-cart"></i> Mercados</a>
                    </li>
                    <li class="active">
                        <a href="javascript:;"><i class="fa fa-fw fa-credit-card"></i> Metodos de pagamento</a>
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
                            Cadastro <small>Pagamentos</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="../../index.php"><i class="fa fa-home"></i> Início</a>
                            </li>
                            <li>
                                <a href="javascript:;"><i class="fa fa-credit-card"></i> Metodos de pagamentos</a>
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
                                <td align="center"><a href="javascript:;" class="btn btn-default disabled">Cadastro</a> <a href="consulta.php" class="btn btn-default">Consulta</a></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <tbody>
                                <form action="" method="POST" id="form1">
                                    <tr>
                                        <td width="15%">Nome do metodo:</td>
                                        <td><input type="text" class="form-control" name="name" id="name" placeholder="Digite o nome ou identificação" required></td>
                                    </tr>
                                    <tr>
                                        <td width="15%">Tipo:</td>
                                        <td>
                                            <select class="form-control" name="tipo" id="tipo" onchange="fech_fat_status();">
                                                <option value="0">Débito</option>
                                                <option value="1">Crédito</option>
                                                <option value="2">Dinheiro</option>
                                                <option value="3">Vale</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr id="fech_fat_show" style="display: none;">
                                        <td width="15%">Fechamento da fatura:</td>
                                        <td>
                                            <select class="form-control" name="fech_fat" id="fetch_fat">
                                                <?php
                                                    $option = "<option value='0' id='null'>Selecione a data de fechamento</option>";
                                                    for($i = 1; $i <= 31; $i++){
                                                        $option .= "<option value='$i'>$i</option>";
                                                    }
                                                    echo $option;
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="15%">Ações:</td>
                                        <td><button type="submit" class="btn btn-success">Registrar</button> <button type="reset" class="btn btn-default" id="reset">Recomençar</button></td>
                                    </tr>
                                </form>
                                <!-- ajax -->
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
                                <!-- /ajax -->
                                <script type="text/javascript" language="javascript">
                                    $(document).ready(function () {

                                    $('#form1').submit(function() {
                                        document.getElementById('send_status_string').innerHTML = "<strong>Processando...</strong>";
                                        document.getElementById('send_status').className = "alert alert-info alert-dismissable";
                                        var dados1 = $('#form1').serialize();
                                        var url = '<?php echo $path; ?>?tkn=7ba3da83bb9fa83bcf3bfb3133e0e2e3';
                                        $.ajax({
                                        type : 'POST',
                                        url  : url,
                                        data : dados1,
                                        dataType: 'json',
                                        success: function(response) {
                                            document.getElementById('send_status_string').innerHTML = "Metodo de pagamento <strong>"+document.getElementById('name').value+"</strong> salvo com sucesso!";
                                            document.getElementById('send_status').className = "alert alert-success alert-dismissable";
                                            document.getElementById('send_status').style.display = "block";
                                            document.getElementById('reset').click();
                                            setTimeout(function(){ document.getElementById('send_status').style.display='none'; }, 1500);
                                            fech_fat_status();
                                        },
                                        error: function(respose){
                                            document.getElementById('send_status_string').innerHTML = "Erro ao salvar metodo de pagamento <strong>"+document.getElementById('name').value+"</strong>. Tente novamente mais tarde!";
                                            document.getElementById('send_status').className = "alert alert-warning alert-dismissable";
                                            document.getElementById('send_status').style.display = "block";
                                            setTimeout(function(){ document.getElementById('send_status').style.display='none'; }, 1500);
                                        }
                                        });
                                        return false;
                                    });
                                    });
                                </script>
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

</body>

</html>
