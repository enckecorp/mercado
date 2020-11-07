<?php
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
    } else {
        $id = null;
    }
    if($id != null){
        require_once("../../link.php");
        mysqli_query($link,"delete from met_pag where id = '$id'");
    }
    echo "<script> history.back(); </script>";
?>