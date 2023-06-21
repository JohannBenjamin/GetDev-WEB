<?php
    include_once('../../Conexão/conexao.php');

    if($_POST)
    {
        if(!empty($_POST['txtId']) || !empty($idCampo))
        {
            $id = $_POST['txtId'];
            if(!empty($idCampo))
            {
                $id = $idCampo;
            }

            try {
                $sql = $conn->query("
                    select * from Usuario where id_Usuario=$id
                ");

                if ($sql->rowCount()>=1) {
                    foreach ($sql as $row) {
                        $idCampo = $row[0];
                        $nomeCampo = $row[1];
                        $celularCampo = $row[2];
                        $emailCampo = $row[3];
                        $usuarioCampo = $row[4];
                        $senhaCampo = $row[5];
                        $descricaoCampo = $row[6];
                        $nascimentoCampo = $row[7];
                        $cadastroCampo = $row[8];
                        $avaliacaoCampo = $row[9];
                        $projRealizadoCampo = $row[10];
                        $imgCampo = $row[11];
                        $curriculoCampo = $row[12];
                        $statusCampo = $row[13];
                        $obsCampo = $row[14];
                    }
                    $msg = 'Busca realizada com sucesso!';
                }
                else
                {
                    $msg = 'Erro! Usuário não existe';
                }

            } catch (PDOException $ex) {
                $msg = $ex->getMessage();
            }
        }
        else
        {
            $msg = 'Erro! Informe o Id para Pesquisar.';
        }
    }
    else
    {
        header('Location:TelaUsuario.php');
    }
?>