<?php
    include_once('../../Conexão/conexao.php');

    if(!$_POST)
    {
        header('Location:TelaAlterarServicoLinguagem.php');
    }

    if(empty($_POST['txtId']))
    {
        header('Location:TelaAlterarServicoLinguagem.php');
    }

    $situacao = FALSE;

    $id = $_POST['txtId'];
        
    try {
        $sql = $conn->query("
            select status_ServicoLinguagem, obs_ServicoLinguagem from ServicoLinguagem where id_ServicoLinguagem=$id
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
                update ServicoLinguagem set
                    status_ServicoLinguagem=:status_ServicoLinguagem,
                    obs_ServicoLinguagem=:obs_ServicoLinguagem
                where id_ServicoLinguagem=:id_ServicoLinguagem
            ");

            $sql->execute(array(
                ':id_ServicoLinguagem'=>$id,
                ':status_ServicoLinguagem' => $status,
                ':obs_ServicoLinguagem' => $obs
            ));

            if ($sql->rowCount()>=1) {
                header("Location:TelaServicoLinguagem.php");
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