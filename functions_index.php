<?php
    function gastos_brutos_mes($mes_ref){
        $link = mysqli_connect ("localhost","root","","mercado") or die ();
        $sql = mysqli_query($link,"select * from compras");
        $valor = 0;
        while($dados = mysqli_fetch_array($sql)){
            $array = explode("/",$dados['data']);
            if($array[1] == $mes_ref){
                $valor = $valor + $dados['valor'];
            }
        }
        return $valor;
    }
    function gastos_liquidos_mes($mes_ref){
        $link = mysqli_connect ("localhost","root","","mercado") or die ();
        $sql = mysqli_query($link,"select * from compras");
        $valor = 0;
        while($dados = mysqli_fetch_array($sql)){
            $array = explode("/",$dados['data']);
            if($array[1] == $mes_ref){
                $met_pag = explode(":..:",$dados['met_pag']);
                $met_pag_array = explode(";.,;",$met_pag[1]);
                if($array[0] <= $met_pag_array[1]){
                    $valor = $valor + $dados['valor'];
                } else if($met_pag_array[0] != 1){
                    $valor = $valor + $dados['valor'];
                }
            }
            if($array[1] == $mes_ref - 1){
                $met_pag = explode(":..:",$dados['met_pag']);
                $met_pag_array = explode(";.,;",$met_pag[1]);
                if($met_pag_array[0] != 0 && $met_pag_array[0] != 3){
                    if($array[0] >= $met_pag_array[1]){
                        $valor = $valor + $dados['valor'];
                    }
                }
            }
        }
        return $valor;
    }
    function gastos_mes_row($mes_ref){
        $link = mysqli_connect ("localhost","root","","mercado") or die ();
        $sql = mysqli_query($link,"select * from compras");
        $count = 0;
        while($dados = mysqli_fetch_array($sql)){
            $array = explode("/",$dados['data']);
            if($array[1] == $mes_ref){
                $count++;
            }
        }
        return $count;
    }
?>