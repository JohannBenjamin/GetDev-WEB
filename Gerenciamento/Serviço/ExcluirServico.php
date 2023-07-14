<?php
    include_once('../../Conexão/conexao.php');

    if(!$_POST)
    {
        header('Location:TelaServico.php');
    }

    if(empty($_POST['txtId']))
    {
        $msg = 'Erro! Informe o Id para excluir.';
    }

    $id = $_POST['txtId'];

    try {
        $sql = $conn->prepare("
            delete from Servico where id_Servico=:id_Servico
        ");

        $sql->execute(array(
            ':id_Servico'=>$id
        ));

        if ($sql->rowCount()>=1) {
            $msg = 'Dados Excluidos com sucesso';
        }
        else
        {
            $msg = 'Erro na exclusão!';
        }

    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
    }
?>