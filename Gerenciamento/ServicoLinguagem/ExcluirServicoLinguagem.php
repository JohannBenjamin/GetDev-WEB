<?php
    include_once('../../Conexão/conexao.php');

    if(!$_POST)
    {
        header('Location:TelaServicoLinguagem.php');
    }

    if(empty($_GET['id']))
    {
        header('Location:TelaServicoLinguagem.php');
    }

    $id = $_GET['id'];
        
    try {
        $sql = $conn->prepare("
            delete from ServicoLinguagem where id_ServicoLinguagem=:id_ServicoLinguagem
        ");

        $sql->execute(array(
            ':id_ServicoLinguagem'=>$id
        ));

        if ($sql->rowCount()>=1) {
            header("Location:TelaServicoLinguagem.php");
        }
        else
        {
            echo 'Erro na exclusão!';
        }

    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
?>