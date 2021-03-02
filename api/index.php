<?php
  require_once("functions.php");
  require_once("var_valid.php");
  require_once("link.php");
  if($tkn == null){
    echo "<script> history.back(); </script>";
  }
  if($tkn == "3f6b5c64413139312bbc6c04c6060369"){
    //dash info[BEGIN]
    $bruto_mes = array("");
    for($i = 1;$i <= 12;$i++){
      $sql = mysqli_query($link,"select * from compras where data like '%".zero($i)."/$year'");
      $valor = 0;
      while($dados = mysqli_fetch_array($sql)){
          $valor = $valor + $dados['valor'];
      }
      array_push($bruto_mes,$valor);
    }
    $liquido_mes = array("");
    for($i = 1;$i <= 12;$i++){
      $sql = mysqli_query($link,"select * from compras where data like '%".zero($i)."/$year'");
      if(($i - 1) == 0){
        $string = "%12/".($year - 1);
      } else {
        $string = "%".(zero($i - 1))."/$year";
      }
      $sql_old = mysqli_query($link,"select * from compras where data like '$string'");
      $valor = 0;
      while($dados = mysqli_fetch_array($sql)){
        $array = explode("/",$dados['data']);
        $met_pag = explode(":..:",$dados['met_pag']);
        $met_pag_array = explode(";.,;",$met_pag[1]);
        if($array[0] <= $met_pag_array[1]){
            $valor = $valor + $dados['valor'];
        } else if($met_pag_array[0] != 1){
            $valor = $valor + $dados['valor'];
        }
        if($array[1] == $i - 1){
          $met_pag = explode(":..:",$dados['met_pag']);
          $met_pag_array = explode(";.,;",$met_pag[1]);
          if($met_pag_array[0] != 0 && $met_pag_array[0] != 3){
              if($array[0] >= $met_pag_array[1]){
                  $valor = $valor + $dados['valor'];
              }
          }
        }
      }
      array_push($liquido_mes,$valor);
    }
    $mes_row = array("");
    for($i = 1;$i <= 12;$i++){
      $count = 0;
      $sql = mysqli_query($link,"select * from compras where data like '%".zero($i)."/$year'");
      $count = mysqli_num_rows($sql);
      array_push($mes_row,$count);
    }
    echo json_encode(array(
      "bruto_mes"=>$bruto_mes,
      "liquido_mes"=>$liquido_mes,
      "mes_row"=>$mes_row
    ));
    //dash info[END]
  } else if ($tkn == "747fea543b987d4f43f5efa2f6d45620"){
    //send info mercado[BEGIN]
    if($dados != null){
      mysqli_query($link,"insert into mercados (name, local) values ('$dados->name','$dados->local')");
      echo 0;
    }
    //send info mercado[END]
  } else if ($tkn == "63462fb02bfd351b0bf10b2aca442023"){
    //get result search mercado[BEGIN]
    if(isset($_REQUEST['search'])){
      $search = $_REQUEST['search'];
    } else {
      $search = null;
    }
    $sql = mysqli_query($link,"select * from mercados where id like '%$search%' or name like '%$search%' or local like '%$search%' order by name limit 10");
    $return = array();
    while($dados = mysqli_fetch_array($sql)){
      array_push($return,$dados);
    }
    echo json_encode($return);
    //get result search mercado[END]
  } else if ($tkn == "cd78dc116979edf8fbc53abd01482a36"){
    //drop mercado[BEGIN]
    $status = 0;
    if($id != null){
      mysqli_query($link,"delete from mercados where id = '$id'") or die ();
      $status = 1;
    }
    echo $status;
    //drop mercado[END]
  } else if ($tkn == "7ba3da83bb9fa83bcf3bfb3133e0e2e3"){
    //post info pagamentos[BEGIN]
    if($dados != null){
      mysqli_query($link,"insert into met_pag (name, tipo, fech_fat) values ('$dados->name','$dados->tipo','$dados->fech_fat')");
      echo 0;
    }
    //post info pagamentos[END]
  } else if ($tkn == "73bb1f6a1042ec586679013fbbf39087"){
    //drop met pagamento[BEGIN]
    $status = 0;
    if($id != null){
      mysqli_query($link,"delete from met_pag where id = '$id'") or die ();
      $status = 1;
    }
    echo $status;
    //drop met pagamento[END]
  }
?>
