<?php
    include_once('../../Conexão/conexao.php');

    if($_POST)
    {
        if(!empty($_POST['txtId']))
        {
            $id = $_POST['txtId'];
        
            try {
                $sql = $conn->query("
                    select img_Usuario, curriculo_Usuario from Usuario where id_Usuario = $id;
                ");

                if ($sql->rowCount()>=1) {
                    foreach ($sql as $row) {
                        $excluirImg = $row[0];
                        $excluirCurriculo = $row[1];
                    }
                }
            } catch (PDOException $ex) {
                $msg = $ex->getMessage();
            }

            try {
                $sql = $conn->prepare("
                    delete from Usuario where id_Usuario=:id_Usuario
                ");

                $sql->execute(array(
                    ':id_Usuario'=>$id
                ));

                if ($sql->rowCount()>=1) {
                    $msg = 'Dados Excluidos com sucesso';

                    if(!$excluirImg == NULL)
                    {
                        $caminhoImg = '../../Files/Usuario/Img/';
                        unlink($caminhoImg.$excluirImg);
                    }
                    if(!$excluirCurriculo == NULL)
                    {
                        $caminhoCurriculo = '../../Files/Usuario/Curriculo/';
                        unlink($caminhoCurriculo.$excluirCurriculo);
                    }
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
        header('Location:TelaUsuario.php');
    }
?>