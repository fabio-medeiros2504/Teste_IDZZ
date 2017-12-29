<?php
    function FormataData($Data, $FormatoPara) {
        if ((strlen($Data) != 10) && (strlen($Data) != 8))
            Return "";

        if (($FormatoPara == "DMA") || ($FormatoPara == "DMY")) {
            if (($Data[4] == "-") || ($Data[4] == "/"))
                $Data = substr($Data, 8, 2) . "/" . substr($Data, 5, 2) . "/" . substr($Data, 0, 4);
        } else if (($FormatoPara == "AMD") || ($FormatoPara == "YMD")) {
            if (($Data[2] == "-") || ($Data[5] == "/")) 
                $Data = substr($Data, 6, 4) . "-" . substr($Data, 3, 2) . "-" . substr($Data, 0, 2);
        } else if ($FormatoPara == "SDMA") {
            if (($Data[4] == "-") || ($Data[4] == "/")) {
                $dataTmp = mktime(0, 0, 0, substr($Data, 5, 2), substr($Data, 8, 2), substr($Data, 0, 4));

                switch(date("N", $dataTmp)) {
                    case 1: $diaSemana = "Segunda-Feira"; break;
                    case 2: $diaSemana = "Terça-Feira"; break;
                    case 3: $diaSemana = "Quarta-Feira"; break;
                    case 4: $diaSemana = "Quinta-Feira"; break;
                    case 5: $diaSemana = "Sexta-Feira"; break;
                    case 6: $diaSemana = "Sábado"; break;
                    case 7: $diaSemana = "Domingo"; break;
                }
                $Data = $diaSemana . ", " . substr($Data, 8, 2) . "/" . substr($Data, 5, 2) . "/" . substr($Data, 0, 4);
            }
        }

        return $Data;
    }

    function FormataDataSql($data)
    {
        return substr($data, 6, 4) . '-' . substr($data, 3, 2) . '-' . substr($data, 0, 2);
    }
        
    function timeSet(){
        date_default_timezone_set("America/Recife");
    }

    function formataDataDDMMYYYY($data){
        return date('d/m/Y', strtotime($data));
    }

    function formataDataDDMMYYYYHHMM($data){
        return date('d/m/Y H:i', strtotime($data));
    }

    function formataDataHoraMySql($data){
        return date('Y-m-d H:i:s', strtotime($data));
    }

    function formataDataMySql($data){
        return date('Y-m-d', strtotime($data));
    }

    function formataHora($data){
        return date('H:i', strtotime($data));
    }
?>