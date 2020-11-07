<?php
    if(isset($_REQUEST['name'])){
        $name = $_REQUEST['name'];
    } else {
        $name = null;
    }
    if(isset($_REQUEST['tipo'])){
        $tipo = $_REQUEST['tipo'];
    } else {
        $tipo = null;
    }
    if(isset($_REQUEST['fech_fat'])){
        $fech_fat = $_REQUEST['fech_fat'];
    } else {
        $fech_fat = null;
    }
    if($name != null && $tipo != null){
        require_once("../../link.php");
        mysqli_query($link,"insert into met_pag (name, tipo, fech_fat) values ('$name','$tipo','$fech_fat')");
        echo 0;
    } else {
        echo "<script> history.back(); </script>";    
    }
?>