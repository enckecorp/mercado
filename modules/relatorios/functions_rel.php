<?php
    function gastos_brutos_ano($ano_ref){
        //gastos brutos do mes
        $link = mysqli_connect ("localhost","root","","mercado") or die ();
        $sql = mysqli_query($link,"select * from compras");
        $valor = 0;
        while($dados = mysqli_fetch_array($sql)){
            $array = explode("/",$dados['data']);
            if($array[2] == $ano_ref){
                $valor = $valor + $dados['valor'];
            }
        }
        return $valor;
    }
    function gastos_brutos_mes($mes_ref,$ano_ref){
        //gastos brutos do mes
        $link = mysqli_connect ("localhost","root","","mercado") or die ();
        $sql = mysqli_query($link,"select * from compras");
        $valor = 0;
        while($dados = mysqli_fetch_array($sql)){
            $array = explode("/",$dados['data']);
            if($array[1] == $mes_ref){
                if($array[2] == $ano_ref){
                    $valor = $valor + $dados['valor'];
                }
            }
        }
        return $valor;
    }
    function gastos_brutos_dia($dia_ref,$mes_ref,$ano_ref){
        //gastos brutos do dia
        $link = mysqli_connect ("localhost","root","","mercado") or die ();
        $sql = mysqli_query($link,"select * from compras");
        $valor = 0;
        while($dados = mysqli_fetch_array($sql)){
            $array = explode("/",$dados['data']);
            if($array[0] == $dia_ref){
                if($array[1] == $mes_ref){
                    if($array[2] == $ano_ref){
                        $valor = $valor + $dados['valor'];
                    }
                }
            }
        }
        return $valor;
    }
    function gastos_brutos_hora($dia_ref,$mes_ref,$ano_ref,$hora_ref){
        //gastos brutos do dia
        $link = mysqli_connect ("localhost","root","","mercado") or die ();
        $sql = mysqli_query($link,"select * from compras");
        $valor = 0;
        while($dados = mysqli_fetch_array($sql)){
            $array = explode("/",$dados['data']);
            if($array[0] == $dia_ref){
                if($array[1] == $mes_ref){
                    if($array[2] == $ano_ref){
                        $hora = explode(":",$dados['hora']);
                        if($hora[0] == $hora_ref){
                            $valor = $valor + $dados['valor'];    
                        }
                    }
                }
            }
        }
        return $valor;
    }
    function gastos_liquidos_mes($mes_ref,$ano_ref){
        //gastos liquidos do mes
        $link = mysqli_connect ("localhost","root","","mercado") or die ();
        $sql = mysqli_query($link,"select * from compras");
        $valor = 0;
        while($dados = mysqli_fetch_array($sql)){
            $array = explode("/",$dados['data']);
            if($array[1] == $mes_ref){
                if($array[2] == $ano_ref){
                    $met_pag = explode(":..:",$dados['met_pag']);
                    $met_pag_array = explode(";.,;",$met_pag[1]);
                    if($array[0] <= $met_pag_array[1]){
                        $valor = $valor + $dados['valor'];
                    } else if($met_pag_array[0] != 1){
                        $valor = $valor + $dados['valor'];
                    }
                }
            }
            if($array[1] == $mes_ref - 1){
                if($array[2] == $ano_ref){
                    $met_pag = explode(":..:",$dados['met_pag']);
                    $met_pag_array = explode(";.,;",$met_pag[1]);
                    if($met_pag_array[0] != 0 && $met_pag_array[0] != 3){
                        if($array[0] >= $met_pag_array[1]){
                            $valor = $valor + $dados['valor'];
                        }
                    }
                }
            }
        }
        return $valor;
    }
    function gastos_liquidos_dia($dia_ref,$mes_ref,$ano_ref){
        //gastos liquidos do dia
        $link = mysqli_connect ("localhost","root","","mercado") or die ();
        $sql = mysqli_query($link,"select * from compras");
        $valor = 0;
        while($dados = mysqli_fetch_array($sql)){
            $array = explode("/",$dados['data']);
            if($array[0] == $dia_ref){
                if($array[1] == $mes_ref){
                    if($array[2] == $ano_ref){
                        $met_pag = explode(":..:",$dados['met_pag']);
                        $met_pag_array = explode(";.,;",$met_pag[1]);
                        if($array[0] <= $met_pag_array[1]){
                            $valor = $valor + $dados['valor'];
                        } else if($met_pag_array[0] != 1){
                            $valor = $valor + $dados['valor'];
                        }
                    }
                }
            }
            if($array[1] == $dia_ref - 1){
                if($array[1] == $mes_ref){
                    if($array[2] == $ano_ref){
                        $met_pag = explode(":..:",$dados['met_pag']);
                        $met_pag_array = explode(";.,;",$met_pag[1]);
                        if($met_pag_array[0] != 0 && $met_pag_array[0] != 3){
                            if($array[0] >= $met_pag_array[1]){
                                $valor = $valor + $dados['valor'];
                            }
                        }
                    }
                }
            }
        }
        return $valor;
    }
    function gastos_ano_row($ano_ref){
        //numero de gastos do mes
        $link = mysqli_connect ("localhost","root","","mercado") or die ();
        $sql = mysqli_query($link,"select * from compras");
        $count = 0;
        while($dados = mysqli_fetch_array($sql)){
            $array = explode("/",$dados['data']);
            if($array[2] == $ano_ref){
                $count++;
            }
        }
        return $count;
    }
    function gastos_mes_row($mes_ref,$ano_ref){
        //numero de gastos do mes
        $link = mysqli_connect ("localhost","root","","mercado") or die ();
        $sql = mysqli_query($link,"select * from compras");
        $count = 0;
        while($dados = mysqli_fetch_array($sql)){
            $array = explode("/",$dados['data']);
            if($array[1] == $mes_ref){
                if($array[2] == $ano_ref){
                    $count++;
                }
            }
        }
        return $count;
    }
    function gastos_dia_row($dia_ref,$mes_ref,$ano_ref){
        //numero de gastos do mes
        $link = mysqli_connect ("localhost","root","","mercado") or die ();
        $sql = mysqli_query($link,"select * from compras");
        $count = 0;
        while($dados = mysqli_fetch_array($sql)){
            $array = explode("/",$dados['data']);
            if($array[0] == $dia_ref){
                if($array[1] == $mes_ref){
                    if($array[2] == $ano_ref){
                        $count++;
                    }
                }
            }
        }
        return $count;
    }
    function valor_por_metodo($mes_ref,$ano_ref,$metodo){
        $link = mysqli_connect ("localhost","root","","mercado") or die ();
        $sql = mysqli_query($link,"select * from compras");
        $valor = 0;
        while($dados = mysqli_fetch_array($sql)){
            $array = explode("/",$dados['data']);
            $met_pag = explode(":..:",$dados['met_pag']);
            $met_pag2 = explode(";.,;",$met_pag[1]);
            if($array[1] == $mes_ref){
                if($array[2] == $ano_ref){
                    //resolver problema de lquidez do crédito
                    if($met_pag2[0] == $metodo){
                        $valor = $valor + $dados['valor'];
                    }
                }
            }
        }
        return $valor;
    }
    function maior_menor($mes_ref,$ano_ref,$tipo){
        //maior (0) menor (1) compra do mês
        $link = mysqli_connect ("localhost","root","","mercado") or die ();
        $sql = mysqli_query($link,"select * from compras");
        $valor = array(0);
        while($dados = mysqli_fetch_array($sql)){
            $array = explode("/",$dados['data']);
            if($array[1] == $mes_ref){
                if($array[2] == $ano_ref){
                    array_push($valor,$dados['valor']);
                }
            }
        }
        if(count($valor) != null){
            if($tipo == 0){
                return max($valor);
            } else {
                return min($valor);
            }
        }
        return $valor;
    }
    function maior_menor_dia($dia_ref,$mes_ref,$ano_ref,$tipo){
        //maior (0) menor (1) compra do mês
        $link = mysqli_connect ("localhost","root","","mercado") or die ();
        $sql = mysqli_query($link,"select * from compras");
        $valor = array(0);
        while($dados = mysqli_fetch_array($sql)){
            $array = explode("/",$dados['data']);
            if($array[0] == $dia_ref){
                if($array[1] == $mes_ref){
                    if($array[2] == $ano_ref){
                        array_push($valor,$dados['valor']);
                    }
                }
            }
        }
        if(count($valor) != null){
            if($tipo == 0){
                return max($valor);
            } else {
                return min($valor);
            }
        }
        return $valor;
    }
?>
