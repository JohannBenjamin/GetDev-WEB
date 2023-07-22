<?php
    include_once('../../Conexão/conexao.php');

    if (!$_GET) {
        header("Location:TelaCadastro.php");
    }

    $nomeCadastro = $_GET['txtNome'];
    $nascimentoCadastro = $_GET['txtNascimento'];
    $emailCadastro = $_GET['txtEmail'];
    $senhaCadastro = $_GET['txtSenha'];
    $usuarioCadastro = $_POST['txtUsuario'];
    $celularCadastro = $_POST['txtCelular'];
    $descricaoCadastro = $_POST['txtDescricao'];
    $imgCadastro = $_FILES['txtImg']['tmp_name'];
    $curriculoCadastro = $_FILES['txtCurriculo']['tmp_name'];
    
    $imgCadastro = ($imgCadastro == ""?"":base64_encode(file_get_contents($imgCadastro)));
    $curriculoCadastro = ($curriculoCadastro == ""?"":base64_encode(file_get_contents($curriculoCadastro)));

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
                cadastro_Usuario,
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
                NOW(),
                :img_Usuario,
                :curriculo_Usuario,
                'Ativo',
                'Sem Obs'
            )"
        );

        $sql->execute(
            array(
                ':nome_Usuario' => $nomeCadastro,
                ':celular_Usuario' => $celularCadastro,
                ':email_Usuario' => $emailCadastro,
                ':usuario_Usuario' => $usuarioCadastro,
                ':senha_Usuario' => $senhaCadastro,
                ':descricao_Usuario' => $descricaoCadastro,
                ':nascimento_Usuario' => $nascimentoCadastro,
                ':img_Usuario' => $imgCadastro,
                ':curriculo_Usuario' => $curriculoCadastro
            )
        );

        if ($sql->rowcount() >= 1) {
            $id = $conn->lastInsertId();
            session_start();

            $_SESSION['id_Usuario'] = $id;
            $_SESSION['usuario_Usuario'] = $usuarioCadastro;
            $_SESSION['nome_Usuario'] = $nomeCadastro;
            $_SESSION['img_Usuario'] = $imgCadastro;
            header('Location:../TelaInicio/index.php');
        } else {
            $msg = 'Algo deu errado em seu cadastro, tente novamente mais tarde!';
            header("TelaCadastro.php");
        }
    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
    }
?>