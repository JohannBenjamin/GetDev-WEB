<?php
    include_once('../../Conexão/conexao.php');

    try {
        $sql = $conn->query("
            select nome_Linguagem from Linguagem
        ");

        if ($sql->rowCount()>=1) {
            foreach ($sql as $row) {

                $j = 0;
                $palavra = '';
                do {
                    $palavra = $palavra.$row[0][$j];
                    $j = $j + 1;
                }while ($row[0][$j] != Null);
                if($nomeLinguagemCampo==$palavra)
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