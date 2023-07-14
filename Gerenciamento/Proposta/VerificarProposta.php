<?php
    include_once('../../Conexão/conexao.php');

    if(!$_POST)
    {
        header('Location:TelaProposta.php');
    }

    $situacao = TRUE;
    try {
        $sql = $conn->query("
            select id_Usuario_Servico from Servico where id_Servico=$idServico
        ");

        if ($sql->rowCount()>=1) {
            foreach ($sql as $row) {
                $idUsuarioServico = $row[0];
            }

            if(!($idUsuarioServico == $idUsuario))
            {
                $situacao = FALSE;
            }
        }
    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
    }
?>