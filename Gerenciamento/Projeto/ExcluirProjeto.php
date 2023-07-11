<?php
    include_once('../../Conexão/conexao.php');

    if(!$_POST)
    {
        header('Location:TelaProjeto.php');
    }

    if(empty($_POST['txtId']))
    {
        $msg = 'Erro! Informe o Id para excluir.';
    }

    $id = $_POST['txtId'];

    try {
        $sql = $conn->prepare("
            delete from Projeto where id_Projeto=:id_Projeto
        ");

        $sql->execute(array(
            ':id_Projeto'=>$id
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