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
            select * from Projeto where id_Projeto=$id
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