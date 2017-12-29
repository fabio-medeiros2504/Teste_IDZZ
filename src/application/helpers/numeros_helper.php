<?php
    function numeroEmReais($numero, $precision = 2) {
        return number_format($numero, $precision, ",", ".");
    }

    function numeroMySQL($numero){
        return str_replace(',','.', str_replace('.','', $numero));
    }

    function calculaGoleMeio($valor){
        $retorno = 0;
        
        if ((float)$valor <= 1.50){
            $retorno = (float)$valor + 0.50;
        }elseif ((float)$valor <= 2.00) {
            $retorno = (float)$valor + 0.75;
        }elseif ((float)$valor <= 2.50){
            $retorno = (float)$valor + 1.00;
        }elseif ((float)$valor <= 3.00){
            $retorno = (float)$valor + 1.5;
        }elseif ((float)$valor <= 5.00){
            $retorno = (float)$valor * 2.00;
        }else{
            $retorno = (float)$valor * 2.50;
        }
        
        return $retorno;
    }

    function numeroEmEzcambo($numero){
        $valor = str_replace("." , "" , $numero );// Primeiro tira os pontos
        $valor = str_replace("," , "" , $numero);// Depois tira a vírgula
        
        return $valor * 100;
    }
?>