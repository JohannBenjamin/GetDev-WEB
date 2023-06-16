<?php
    include_once('../../Conexão/conexao.php');

    if($_POST)
    {
        if(!empty($_POST['txtId']))
        {
            $id = $_POST['txtId'];

            try {
                $sql = $conn->prepare("
                    delete from Linguagem where id_Linguagem=:id_Linguagem
                ");

                $sql->execute(array(
                    ':id_Linguagem'=>$id
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
        }
        else
        {
            $msg = 'Erro! Informe o Id para excluir.';
        }
    }
    else
    {
        header('Location:TelaLinguagem.php');
    }
?>