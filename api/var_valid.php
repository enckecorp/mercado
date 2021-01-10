<?php
  if(isset($_REQUEST['tkn'])){
    $tkn = $_REQUEST['tkn'];
  } else {
    $tkn = null;
  }
  if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
  } else {
    $id = null;
  }
  if(isset($_REQUEST['dados'])){
    $dados = json_decode($_REQUEST['dados']);
  } else {
    $dados = null;
  }
  if(isset($_REQUEST['year'])){
    $year = $_REQUEST['year'];
  } else {
    $year = date("Y");
  }
?>
