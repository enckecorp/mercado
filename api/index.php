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
  }
?>
