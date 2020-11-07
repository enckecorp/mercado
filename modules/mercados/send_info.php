<?php
    if(isset($_REQUEST['name'])){
        $name = $_REQUEST['name'];
    } else {
        $name = null;
    }
    if(isset($_REQUEST['local'])){
        $local = $_REQUEST['local'];
    } else {
        $local = null;
    }
    if($name != null && $local != null){
        require_once("../../link.php");
        mysqli_query($link,"insert into mercados (name, local) values ('$name','$local')");
        echo 0;
    } else {
        echo "<script> history.back(); </script>";
    }
?>