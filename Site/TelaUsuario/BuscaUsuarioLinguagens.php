<?php
    include_once('../../Conexão/conexao.php');
    $btnLinguagens = '';

    try {
        $sql = $conn->query("
            select L.nome_Linguagem from UsuarioLinguagem as UL
            inner join Linguagem as L on L.id_Linguagem = UL.id_Linguagem_UsuarioLinguagem
            where UL.id_Usuario_UsuarioLinguagem = $idUsuario
            order by L.id_Linguagem
        ");

        if ($sql->rowCount()>=1) {
            foreach ($sql as $row) {
                $btnLinguagens = $btnLinguagens.
                "
                    <a class='d-inline-block rounded-3 p-1 btn btn-outline-light border-0' href='Usuario.php?".$row[0]."=".$row[0]."' style='background-color: #686BA3'>$row[0]</a>\r\n
                ";
            }
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
?>