<?php
    include_once('../../Conexão/conexao.php');

    if($_POST)
    {
        $situacao = FALSE;

        if(!empty($_POST['txtId']))
        {
            $id = $_POST['txtId'];
        
            try {
                $sql = $conn->query("
                    select * from Linguagem where id_Linguagem=$id
                ");

                if ($sql->rowCount()>=1) {
                    foreach ($sql as $row) {
                        $nome = $row[1];
                        $status = $row[2];
                        $obs = $row[3];
                        
                        $situacao = TRUE;
                    }
                }
                else
                {
                    $msg = 'Erro! Linguagem não existe';
                }

            } catch (PDOException $ex) {
                $msg = $ex->getMessage();
            }

            if ($situacao)
            {
                if(empty($_POST['txtNome']) &&
                empty($_POST['txtStatus']) &&
                empty($_POST['txtObs']))
                {
                    $msg = 'Nenhum dado a Alterar!';
                    $situacao = FALSE;
                }
                else
                {
                    if(!empty($_POST['txtNome']))
                    {
                        $nome = $_POST['txtNome'];
                    }
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
                            update Linguagem set
                                nome_Linguagem=:nome_Linguagem,
                                status_Linguagem=:status_Linguagem,
                                obs_Linguagem=:obs_Linguagem
                            where id_Linguagem=:id_Linguagem
                        ");

                        $sql->execute(array(
                            ':id_Linguagem'=>$id,
                            ':nome_Linguagem' => $nome,
                            ':status_Linguagem' => $status,
                            ':obs_Linguagem' => $obs
                        ));

                        if ($sql->rowCount()>=1) {
                            $situacao = TRUE;
                        }
                        else
                        {
                            $msg = 'Erro na alteração!';
                            $situacao = FALSE;
                        }

                    } catch (PDOException $ex) {
                        $msg = $ex->getMessage();
                    }
                }
            }
        }
        else
        {
            $msg = 'Erro! Informe o Id para alterar';
        }
    }
    else
    {
        header('Location:TelaLinguagem.php');
    }
?>