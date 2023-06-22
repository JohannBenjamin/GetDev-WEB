<?php
    include_once('../../Conexão/conexao.php');

    if($_POST)
    {
        $situacao = FALSE;

        if(empty($_POST['txtNome']) ||
        empty($_POST['txtCelular']) ||
        empty($_POST['txtNascimento']) ||
        empty($_POST['txtEmail']) ||
        empty($_POST['txtUsuario']) ||
        empty($_POST['txtSenha']) ||
        empty($_POST['txtStatus']))
        {
            $msg = 'Erro! Preencha os campos obrigatórios para Cadastrar um Usuário';
        }
        else
        {
            $nome = $_POST['txtNome'];
            $celular = $_POST['txtCelular'];
            $nascimento = $_POST['txtNascimento'];
            $email = $_POST['txtEmail'];
            $usuario = $_POST['txtUsuario'];
            $senha = $_POST['txtSenha'];
            $descricao = $_POST['txtDescricao'];
            $avaliacao = $_POST['txtAvaliacao'];
            $projRealizado = $_POST['txtProjRealizado'];
            $img = $_FILES['txtImg']['tmp_name'];
            $curriculo = $_FILES['txtCurriculo']['tmp_name'];
            $status = $_POST['txtStatus'];
            $obs = $_POST['txtObs'];

            //Convertendo a img em base64
            if(! ($img == NULL))
            {
                /*$indiceImg = strpos($img, '.');
                $tipoImg = substr($img, $indiceImg);
                $img = $usuario.$tipoImg;*/

                $img = base64_encode(file_get_contents($img));
            }
            
            //Renomeando o Curriculo
            if(!$curriculo == NULL)
            {
                /*$indiceCurriculo = strpos($curriculo, '.');
                $tipoCurriculo = substr($curriculo, $indiceCurriculo);
                $curriculo = $usuario.$tipoCurriculo;*/

                $curriculo = base64_encode(file_get_contents($curriculo));
            }

            try {
                $sql = $conn->prepare("
                    insert into Usuario
                    (
                        nome_Usuario,
                        celular_Usuario,
                        email_Usuario,
                        usuario_Usuario,
                        senha_Usuario,
                        descricao_Usuario,
                        nascimento_Usuario,
                        avaliacao_Usuario,
                        projRealizado_Usuario,
                        img_Usuario,
                        curriculo_Usuario,
                        status_Usuario,
                        obs_Usuario
                    )
                    values
                    (
                        :nome_Usuario,
                        :celular_Usuario,
                        :email_Usuario,
                        :usuario_Usuario,
                        md5(:senha_Usuario),
                        :descricao_Usuario,
                        :nascimento_Usuario,
                        :avaliacao_Usuario,
                        :projRealizado_Usuario,
                        :img_Usuario,
                        :curriculo_Usuario,
                        :status_Usuario,
                        :obs_Usuario
                    )
                ");

                $sql->execute(array(
                    ':nome_Usuario' => $nome,
                    ':celular_Usuario' => $celular,
                    ':email_Usuario' => $email,
                    ':usuario_Usuario' => $usuario,
                    ':senha_Usuario' => $senha,
                    ':descricao_Usuario' => $descricao,
                    ':nascimento_Usuario' => $nascimento,
                    ':avaliacao_Usuario' => $avaliacao,
                    ':projRealizado_Usuario' => $projRealizado,
                    ':img_Usuario' => $img,
                    ':curriculo_Usuario' => $curriculo,
                    ':status_Usuario' => $status,
                    ':obs_Usuario' => $obs
                ));

                if ($sql->rowCount()>=1) {
                    $id = $conn->lastInsertId();
                    $situacao = TRUE;

                    /*if(! ($img == NULL))
                    {
                        $caminhoImg = "../../Files/Usuario/Img/";
                        $arquivo = $caminhoImg.$img;
                        move_uploaded_file($_FILES['txtImg']['tmp_name'], $arquivo);
                    }
                    if(! ($curriculo == NULL))
                    {
                        $caminhoCurriculo = "../../Files/Usuario/Curriculo/";
                        $arquivo = $caminhoCurriculo.$curriculo;
                        move_uploaded_file($_FILES['txtCurriculo']['tmp_name'], $arquivo);
                    }*/
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
        header('Location:TelaUsuario.php');
    }
?>