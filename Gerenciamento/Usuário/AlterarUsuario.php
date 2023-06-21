<?php
    include_once('../../Conexão/conexao.php');

    if($_POST) ///falta aq pra baixo, n esquece de img e curriculo
    {
        $situacao = FALSE;

        if(!empty($_POST['txtId']))
        {
            $id = $_POST['txtId'];
        
            try {
                $sql = $conn->query("
                    select * from Usuario where id_Usuario=$id
                ");

                if ($sql->rowCount()>=1) {
                    foreach ($sql as $row) {                        
                        $nome = $row[1];
                        $celular = $row[2];
                        $email = $row[3];
                        $usuario = $row[4];
                        $senha = $row[5];
                        $descricao = $row[6];
                        $nascimento = $row[7];
                        $cadastro = $row[8];
                        $avaliacao = $row[9];
                        $projRealizado = $row[10];
                        $img = $row[11];
                        $curriculo = $row[12];
                        $status = $row[13];
                        $obs = $row[14];

                        $situacao = TRUE;
                    }
                }
                else
                {
                    $msg = 'Erro! Usuário não existe';
                }

            } catch (PDOException $ex) {
                $msg = $ex->getMessage();
            }

            if ($situacao)
            {
                if(empty($_POST['txtNome']) &&
                empty($_POST['txtCelular']) &&
                empty($_POST['txtEmail']) &&
                empty($_POST['txtUsuario']) &&
                empty($_POST['txtSenha']) &&
                empty($_POST['txtNascimento']) &&
                empty($_POST['txtDescricao']) &&
                empty($_POST['txtAvaliacao']) &&
                empty($_POST['txtProjRealizado']) &&
                empty($_FILES['txtImg']['name']) &&
                empty($_FILES['txtCurriculo']['name']) &&
                empty($_POST['txtStatus']) &&
                empty($_POST['txtObs']))
                {
                    $msg = 'Nenhum dado a Alterar!';
                    $situacao = FALSE;
                }
                else
                {
                    $situacaoUsuario = FALSE;
                    $situacaoImg = FALSE;
                    $situacaoCurriculo = FALSE;
                    if(!empty($_POST['txtNome']))
                    {
                        $nome = $_POST['txtNome'];
                    }
                    if(!empty($_POST['txtCelular']))
                    {
                        $celular = $_POST['txtCelular'];
                    }
                    if(!empty($_POST['txtEmail']))
                    {
                        $email = $_POST['txtEmail'];
                    }
                    if(!empty($_POST['txtUsuario']))
                    {
                        $usuario = $_POST['txtUsuario'];
                        $situacaoUsuario = TRUE;
                    }
                    if(!empty($_POST['txtSenha']))
                    {
                        $senha = $_POST['txtSenha'];
                    }
                    if(!empty($_POST['txtNascimento']))
                    {
                        $nascimento = $_POST['txtNascimento'];
                    }
                    if(!empty($_POST['txtDescricao']))
                    {
                        $descricao = $_POST['txtDescricao'];
                    }
                    if(!empty($_POST['txtAvaliacao']))
                    {
                        $avaliacao = $_POST['txtAvaliacao'];
                    }
                    if(!empty($_POST['txtProjRealizado']))
                    {
                        $projRealizado = $_POST['txtProjRealizado'];
                    }
                    if(!empty($_FILES['txtImg']['name']))
                    {
                        $nomeImgVelho = $img;
                        $img = $_FILES['txtImg']['name'];
                        $situacaoImg = TRUE;
                    }
                    else if (! ($img == NULL)) {
                        unlink('../../Files/Usuario/Img/'.$img);
                        $img = NULL;
                    }
                    if(!empty($_FILES['txtCurriculo']['name']))
                    {
                        $nomeCurriculoVelho = $nome;
                        $curriculo = $_FILES['txtCurriculo']['name'];
                        $situacaoCurriculo = TRUE;
                    }
                    else if (! ($curriculo == NULL)) {
                        unlink('../../Files/Usuario/Curriculo/'.$curriculo);
                        $curriculo = NULL;
                    }
                    if(!empty($_POST['txtStatus']))
                    {
                        $status = $_POST['txtStatus'];
                    }
                    if(!empty($_POST['txtObs']))
                    {
                        $obs = $_POST['txtObs'];
                    }

                    //considere que o $usuario já vai ter o nome alterado ou não, por isso vai funcionar
                    if($situacaoImg)
                    {
                        $indiceImg = strpos($img,'.');
                        $tipoImg = substr($img, $indiceImg);
                        $img = $usuario.$tipoImg;

                        $caminhoImg = '../../Files/Usuario/Img/';
                        $arquivoImg = $caminhoImg.$img;
                        move_uploaded_file($_FILES['txtImg']['tmp_name'], $arquivoImg);

                        if(! ($nomeImgVelho == $img))
                        {
                            unlink($caminhoImg.$nomeImgVelho);
                        }
                    }
                    if($situacaoCurriculo)
                    {
                        $indiceCurriculo = strpos($curriculo,'.');
                        $tipoCurriculo = substr($curriculo, $indiceCurriculo);
                        $curriculo = $usuario.$tipoCurriculo;

                        $caminhoCurriculo = '../../Files/Usuario/Curriculo/';
                        $arquivoCurriculo = $caminhoCurriculo.$curriculo;
                        move_uploaded_file($_FILES['txtCurriculo']['tmp_name'], $arquivoCurriculo);

                        if(! ($nomeCurriculoVelho == $curriculo))
                        {
                            unlink($caminhoCurriculo.$nomeCurriculoVelho);
                        }
                    }
                    if($situacaoUsuario)
                    {
                        //renomeando a img existente
                        if(!($img == NULL))
                        {
                            if(!$situacaoImg)
                            {
                                $caminhoImg = '../../Files/Usuario/Img/';
                                $caminhoImgVelho = $caminhoImg.$img;

                                $indiceImg = strpos($img,'.');
                                $tipoImg = substr($img, $indiceImg);
                                $img = $usuario.$tipoImg;
                                
                                $caminhoImgNovo = $caminhoImg.$img;
                                rename($caminhoImgVelho,$caminhoImgNovo);
                            }
                        }
                        
                        //renomeando o curriculo existente
                        if(!($curriculo == NULL))
                        {
                            if(!$situacaoCurriculo)
                            {
                                $caminhoCurriculo = '../../Files/Usuario/Curriculo/';
                                $caminhoCurriculoVelho = $caminhoCurriculo.$curriculo;

                                $indiceCurriculo = strpos($curriculo,'.');
                                $tipoCurriculo = substr($curriculo, $indiceCurriculo);
                                $curriculo = $usuario.$tipoCurriculo;

                                $caminhoCurriculoNovo = $caminhoCurriculo.$curriculo;
                                rename($caminhoCurriculoVelho, $caminhoCurriculoNovo);
                            }
                        }                        
                    }
                    
                    try {
                        $sql = $conn->prepare("
                            update Usuario set
                                nome_Usuario=:nome_Usuario,
                                celular_Usuario=:celular_Usuario,
                                email_Usuario=:email_Usuario,
                                usuario_Usuario=:usuario_Usuario,
                                senha_Usuario=md5(:senha_Usuario),
                                nascimento_Usuario=:nascimento_Usuario,
                                descricao_Usuario=:descricao_Usuario,
                                avaliacao_Usuario=:avaliacao_Usuario,
                                projRealizado_Usuario=:projRealizado_Usuario,
                                img_Usuario=:img_Usuario,
                                curriculo_Usuario=:curriculo_Usuario,
                                status_Usuario=:status_Usuario,
                                obs_Usuario=:obs_Usuario
                            where id_Usuario=:id_Usuario
                        ");

                        $sql->execute(array(
                            ':id_Usuario'=>$id,
                            ':nome_Usuario' => $nome,
                            ':celular_Usuario' => $celular,
                            ':email_Usuario' => $email,
                            ':usuario_Usuario' => $usuario,
                            ':senha_Usuario' => $senha,
                            ':nascimento_Usuario' => $nascimento,
                            ':descricao_Usuario' => $descricao,
                            ':avaliacao_Usuario' => $avaliacao,
                            ':projRealizado_Usuario' => $projRealizado,
                            ':img_Usuario' => $img,
                            ':curriculo_Usuario' => $curriculo,
                            ':status_Usuario' => $status,
                            ':obs_Usuario' => $obs
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
        header('Location:TelaUsuario.php');
    }
?>