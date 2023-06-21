<?php
    include_once('../../Conexão/conexao.php');

    if($_POST)
    {
        $situacao = FALSE;

        if(empty($_POST['txtNome']) ||
        empty($_POST['txtStatus']))
        {
            $msg = 'Erro! Preencha todos os campos para Cadastrar uma Linguagem';
        }
        else
        {
            $nome = $_POST['txtNome'];
            $status = $_POST['txtStatus'];
            $obs = $_POST['txtObs'];

            try {
                $sql = $conn->prepare("
                    insert into Linguagem
                    (
                        nome_Linguagem,
                        status_Linguagem,
                        obs_Linguagem
                    )
                    values
                    (
                        :nome_Linguagem,
                        :status_Linguagem,
                        :obs_Linguagem
                    )
                ");

                $sql->execute(array(
                    ':nome_Linguagem' => $nome,
                    ':status_Linguagem' => $status,
                    ':obs_Linguagem' => $obs
                ));

                if ($sql->rowCount()>=1) {
                    $id = $conn->lastInsertId();
                    $situacao = TRUE;
                }
                else
                {
                    $msg = 'Erro no cadastro!';
                }
            } catch (PDOException $ex) {
                $msg = $ex->getMessage();
            }
        }
    }
    else
    {
        header('Location:TelaLinguagem.php');
    }
?>