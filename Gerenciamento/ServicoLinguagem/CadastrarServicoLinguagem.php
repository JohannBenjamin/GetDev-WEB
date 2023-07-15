<?php
    include_once('../../Conexão/conexao.php');

    if(!$_POST)
    {
        header('Location:TelaServicoLinguagem.php');
    }

    if(empty($_POST['txtIdLinguagem']) ||
    empty($_POST['txtIdServico']) ||
    empty($_POST['txtStatus']))
    {
        echo 'Erro! Preencha todos os campos para Cadastrar uma Linguagem para o Serviço';
        return;
    }

    $situacao = FALSE;

    $idLinguagem = $_POST['txtIdLinguagem'];
    $idServico = $_POST['txtIdServico'];
    $status = $_POST['txtStatus'];
    $obs = $_POST['txtObs'];

    try {
        $sql = $conn->query("
            select * from ServicoLinguagem where id_Servico_ServicoLinguagem = $idServico and id_Linguagem_ServicoLinguagem = $idLinguagem
        ");

        if ($sql->rowCount()>=1) {
            header("Location:TelaServicoLinguagem.php");
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
                insert into ServicoLinguagem
                (
                    id_Servico_ServicoLinguagem,
                    id_Linguagem_ServicoLinguagem,
                    status_ServicoLinguagem,
                    obs_ServicoLinguagem
                )
                values
                (
                    :id_Servico_ServicoLinguagem,
                    :id_Linguagem_ServicoLinguagem,
                    :status_ServicoLinguagem,
                    :obs_ServicoLinguagem
                )
            ");
    
            $sql->execute(array(
                ':id_Servico_ServicoLinguagem' => $idServico,
                ':id_Linguagem_ServicoLinguagem' => $idLinguagem,
                ':status_ServicoLinguagem' => $status,
                ':obs_ServicoLinguagem' => $obs
            ));
    
            if ($sql->rowCount()>=1) {
                header("Location:TelaServicoLinguagem.php");
            }
            else
            {
                echo "Erro no cadastro!";
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
?>