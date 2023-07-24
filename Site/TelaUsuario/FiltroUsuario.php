<?php
    $texto ='';
    foreach ($_POST as $filtro => $valor) {
        if($filtro=="btnFiltro"){
            break;
        }
        if(trim($texto) != "") {
            $texto = $texto."&";
        }
        $texto=$texto."$filtro=$valor";
    }

    header("Location:Usuario.php?$texto");
?>