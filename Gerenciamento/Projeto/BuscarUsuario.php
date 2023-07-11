<?php
    include_once('../../Conexão/conexao.php');

    try {
        $sql = $conn->query("
            select nome_Usuario from Usuario
        ");

        if ($sql->rowCount()>=1) {
            foreach ($sql as $row) {

                $j = 0;
                $palavra = '';
                do {
                    $palavra = $palavra.$row[0][$j];
                    $j = $j + 1;
                }while ($row[0][$j] != Null);
                if($nomeUsuarioCampo==$palavra)
                {
                    $selected = 'selected';
                }
                else
                {
                    $selected = '';
                }
                echo '<option value="'.$palavra.'" '.$selected.'>'.$palavra.'</option>';
            }
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
?>