<?php
    include_once('../../Conexão/conexao.php');

    try {
        $sql = $conn->query("
            select nome_Usuario from Usuario where id_Usuario = $idUsuarioCampo
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