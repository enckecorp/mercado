<?php
    if(isset($_REQUEST['local'])){
        $local = $_REQUEST['local'];
    } else {
        $local = null;
    }
    if(isset($_REQUEST['data'])){
        $data = $_REQUEST['data'];
    } else {
        $data = null;
    }
    if(isset($_REQUEST['hora'])){
        $hora = $_REQUEST['hora'];
    } else {
        $hora = null;
    }
    if(isset($_FILES['anexo']['tmp_name'])){
        $anexo = $_FILES['anexo']['tmp_name'];
        $array = explode(".",$_FILES['anexo']['name']);
        if(count($array) == 2){
            $anexo_real = $_FILES['anexo']['name'];
            copy($anexo,"anexos/".$anexo_real);
        } else {
            $anexo_real = null;
        }
    } else {
        $anexo = null;
        $anexo_real = null;
    }
    if(isset($_REQUEST['met_pag'])){
        $met_pag = $_REQUEST['met_pag'];
    } else {
        $met_pag = null;
    }
    if(isset($_REQUEST['valor'])){
        $valor = $_REQUEST['valor'];
    } else {
        $valor = null;
    }
    if($local != null && $valor != null){
        require_once("../../link.php");
        mysqli_query($link,"insert into compras (local, data, hora, anexo, met_pag, valor) values ('$local','$data','$hora','$anexo_real','$met_pag','$valor')");
    }
    echo "<script> history.back(); </script>";
?>