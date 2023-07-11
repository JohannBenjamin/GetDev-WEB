<?php
    include_once('../../Conexão/conexao.php');

    if(!$_POST)
    {
        header('Location:TelaAlterarUsuarioLinguagem.php');
    }

    if(empty($_POST['txtId']))
    {
        header('Location:TelaAlterarUsuarioLinguagem.php');
    }

    $situacao = FALSE;

    $id = $_POST['txtId'];
        
    try {
        $sql = $conn->query("
            select status_UsuarioLinguagem, obs_UsuarioLinguagem from UsuarioLinguagem where id_UsuarioLinguagem=$id
        ");

        if ($sql->rowCount()>=1) {
            foreach ($sql as $row) {
                $status = $row[0];
                $obs = $row[1];

                $situacao = TRUE;
            }
        }

    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }

    if ($situacao)
    {
        if(!empty($_POST['txtStatus']))
        {
            $status = $_POST['txtStatus'];
        }
        if(!empty($_POST['txtObs']))
        {
            $obs = $_POST['txtObs'];
        }

        try {
            $sql = $conn->prepare("
                update UsuarioLinguagem set
                    status_UsuarioLinguagem=:status_UsuarioLinguagem,
                    obs_UsuarioLinguagem=:obs_UsuarioLinguagem
                where id_UsuarioLinguagem=:id_UsuarioLinguagem
            ");

            $sql->execute(array(
                ':id_UsuarioLinguagem'=>$id,
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