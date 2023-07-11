<?php
    include_once('../../Conexão/conexao.php');

    if(!$_POST)
    {
        header('Location:TelaUsuarioLinguagem.php');
    }

    if(empty($_POST['txtIdLinguagem']) ||
    empty($_POST['txtIdUsuario']) ||
    empty($_POST['txtStatus']))
    {
        echo 'Erro! Preencha todos os campos para Cadastrar uma Linguagem para o Usuário';
        return;
    }

    $situacao = FALSE;

    $idLinguagem = $_POST['txtIdLinguagem'];
    $idUsuario = $_POST['txtIdUsuario'];
    $status = $_POST['txtStatus'];
    $obs = $_POST['txtObs'];

    try {
        $sql = $conn->query("
            select * from UsuarioLinguagem where id_Usuario_UsuarioLinguagem = $idUsuario and id_Linguagem_UsuarioLinguagem = $idLinguagem
        ");

        if ($sql->rowCount()>=1) {
            header("Location:TelaUsuarioLinguagem.php");
        }
        else
        {
            $situacao = TRUE;
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }

    if($situacao)
    {
        try {
            $sql = $conn->prepare("
                insert into UsuarioLinguagem
                (
                    id_Usuario_UsuarioLinguagem,
                    id_Linguagem_UsuarioLinguagem,
                    status_UsuarioLinguagem,
                    obs_UsuarioLinguagem
                )
                values
                (
                    :id_Usuario_UsuarioLinguagem,
                    :id_Linguagem_UsuarioLinguagem,
                    :status_UsuarioLinguagem,
                    :obs_UsuarioLinguagem
                )
            ");
    
            $sql->execute(array(
                ':id_Usuario_UsuarioLinguagem' => $idUsuario,
                ':id_Linguagem_UsuarioLinguagem' => $idLinguagem,
                ':status_UsuarioLinguagem' => $status,
                ':obs_UsuarioLinguagem' => $obs
            ));
    
            if ($sql->rowCount()>=1) {
                header("Location:TelaUsuarioLinguagem.php");
            }
            else
            {
                echo "Erro na alteração!";
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
?>