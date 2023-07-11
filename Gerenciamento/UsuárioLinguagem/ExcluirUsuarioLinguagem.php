<?php
    include_once('../../Conexão/conexao.php');

    if(!$_POST)
    {
        header('Location:TelaUsuarioLinguagem.php');
    }

    if(empty($_GET['id']))
    {
        header('Location:TelaUsuarioLinguagem.php');
    }

    $id = $_GET['id'];
        
    try {
        $sql = $conn->prepare("
            delete from UsuarioLinguagem where id_UsuarioLinguagem=:id_UsuarioLinguagem
        ");

        $sql->execute(array(
            ':id_UsuarioLinguagem'=>$id
        ));

        if ($sql->rowCount()>=1) {
            header("Location:TelaUsuarioLinguagem.php");
        }
        else
        {
            echo 'Erro na exclusão!';
        }

    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
?>