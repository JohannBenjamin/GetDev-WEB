<?php
    include_once('../../Conexão/conexao.php');

    try {
        $sql = $conn->query("
            select nome_Servico from Servico where id_Servico = $idServicoCampo
        ");

        if ($sql->rowCount()>=1) {
            foreach ($sql as $row) {
                echo '<option value="'.$row[0].'" selected>'.$row[0].'</option>';
            }
        }

    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
?>