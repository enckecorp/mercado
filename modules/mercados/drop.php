<?php
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
    } else {
        $id = null;
    }
    if(isset($_REQUEST['tkn'])){
        $tkn = $_REQUEST['tkn'];
    } else {
        $tkn = null;
    }
    if($id != null && $tkn != null){
        require_once("../../api/path.php");
        $return = file_get_contents($path."?tkn=$tkn&id=$id");
    }
    echo "<script> history.back(); </script>";
?>