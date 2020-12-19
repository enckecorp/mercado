<?php
    //baixar dados
    require_once("link.php");
    $sql = mysqli_query($link,"select * from compras");
    $compras = "";
    while($dados_d = mysqli_fetch_array($sql)){
        $array = array('Débito','Crédito','Dinheiro','Vale');
        $array_2 = explode(":..:",$dados_d['met_pag']);
        $array_3 = explode(";.,;",$array_2[1]);
        $compras .= "<tr>
                        <td>".$dados_d['local']."</td>
                        <td>".$dados_d['data']."<br>".$dados_d['hora']."</td>
                        <td>".$dados_d['anexo']."</td>
                        <td>R$".number_format($dados_d['valor'], 2, ',', '.')."<br>".$array_2[0]."[".$array[$array_3[0]]."]</td>
                    </tr>";
    }
    $sql = mysqli_query($link,"select * from mercados");
    $mercados = "";
    while($dados_d = mysqli_fetch_array($sql)){
        $mercados .= "<tr>
                        <td>".$dados_d['name']."</td>
                        <td>".$dados_d['local']."</td>
                    </tr>";
    }
    $sql = mysqli_query($link,"select * from met_pag");
    $met_pags = "";
    while($dados_d = mysqli_fetch_array($sql)){
        $array = array('Débito','Crédito','Dinheiro','Vale');
        if($dados_d['fech_fat'] == 0){
            $fech_fat = "---";
        } else {
            $fech_fat = "Dia ".$dados_d['fech_fat'];
        }
        $met_pags .= "<tr>
                        <td>".$dados_d['name']."</td>
                        <td>".$array[$dados_d['tipo']]."</td>
                        <td>$fech_fat</td>
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
                <td align='center'><b>Backup de todos os dados</b></td>
            </tr>
        </table>
        <br>
        <table border='1px' cellpadding='5px' cellspacing='0' width:'100%' id='conteudo'>
            <tr>
                <td align='center'><b>Mercados</b></td>
            </tr>
        </table>
        <table border='1px' cellpadding='5px' cellspacing='0' width:'100%' id='conteudo'>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Endereço</th>
                </tr>
            </thead>
            <tbody>
                $mercados
            </tbody>
        </table>
        <br>
        <table border='1px' cellpadding='5px' cellspacing='0' width:'100%' id='conteudo'>
            <tr>
                <td align='center'><b>Metodos de pagamento</b></td>
            </tr>
        </table>
        <table border='1px' cellpadding='5px' cellspacing='0' width:'100%' id='conteudo'>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th width='10%'>Tipo</th>
                    <th width='10%'>Fech. Fat.</th>
                </tr>
            </thead>
            <tbody>
                $met_pags
            </tbody>
        </table>
        <br>
        <table border='1px' cellpadding='5px' cellspacing='0' width:'100%' id='conteudo'>
            <tr>
                <td align='center'><b>Compras</b></td>
            </tr>
        </table>
        <table border='1px' cellpadding='5px' cellspacing='0' width:'100%' id='conteudo'>
            <thead>
                <tr>
                    <th>Local</th>
                    <th width='10%'>Data</th>
                    <th>Anexo</th>
                    <th width='15%'>Valor</th>
                </tr>
            </thead>
            <tbody>
                $compras
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
    require_once 'dompdf/autoload.inc.php';
    use Dompdf\Dompdf; 
    $dompdf = new Dompdf();
    $html = file_get_contents("print.html");
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrayed');
    $dompdf->render();
    $dompdf->stream("dados - ".date("d-m-Y").".pdf");
    //baixar dados//
?>