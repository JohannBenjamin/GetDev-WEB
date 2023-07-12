<?php
    include_once('../../Conexão/conexao.php');

    if(!$_POST)
    {
        header("Location:TelaProjeto.php");
    }

    if(empty($_POST['txtId']) && empty($idCampo))
    {
        $msg = 'Erro! Informe o Id para Pesquisar.';
        return;
        
    }

    $id = $_POST['txtId'];
    if(!empty($idCampo))
    {
        $id = $idCampo;
    }

    try {
        $sql = $conn->query("
            select P.id_Projeto, P.id_Usuario_Projeto, P.nome_Projeto, P.link_Projeto, P.img_Projeto, P.status_Projeto, P.obs_Projeto, U.nome_Usuario
            from Projeto as P
            inner join Usuario as U on U.id_Usuario = P.id_Usuario_Projeto
            where P.id_Projeto=$id
        ");

        if ($sql->rowCount()>=1) {
            foreach ($sql as $row) {
                $idCampo = $row[0];
                $idUsuarioCampo = $row[1];
                $nomeCampo = $row[2];
                $linkCampo = $row[3];
                $imgCampo = $row[4];
                $statusCampo = $row[5];
                $obsCampo = $row[6];
                $nomeUsuarioCampo = $row[7];
            }
            $msg = 'Busca realizada com sucesso!';
        }
        else
        {
            $msg = 'Erro! Projeto não existe';
        }

    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
    }
?>