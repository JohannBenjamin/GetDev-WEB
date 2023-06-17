<?php
include_once('../../Conexão/conexao.php');

if ($_POST) {
    $nomeCadastro = $_POST['txtNome'];
    $nascimentoCadastro = $_POST['txtNascimento'];
    $emailCadastro = $_POST['txtEmail'];
    $senhaCadastro = $_POST['txtSenha'];
    $telefoneCadastro = $_POST['txtTelefone'];
    $descricaoCadastro = $_POST['txtDescricao'];

    try {
        $sql = $conn->prepare("
            insert into Usuario
            (
                nome_Usuario,
                celular_Usuario,
                email_Usuario,
                senha_Usuario,
                descricao_Usuario,
                nascimento_Usuario
            )
            values
            (
                :nome_Usuario,
                :celular_Usuario,
                :email_Usuario,
                :senha_Usuario,
                :descricao_Usuario,
                :nascimento_Usuario
            )"
        );

        $sql->execute(
            array(
                ':nome_Usuario' => $nomeCadastro,
                ':celular_Usuario' => $telefoneCadastro,
                ':email_Usuario' => $emailCadastro,
                ':senha_Usuario' => $senhaCadastro,
                ':descricao_Usuario' => $descricaoCadastro,
                ':nascimento_Usuario' => $nascimentoCadastro
            )
        );

        if ($sql->rowcount() >= 1) {
            //volte mais tarde para entrar em login ou sistema

        } else {
            $msg = 'Algo deu errado em seu cadastro, tente novamente mais tarde!';
        }
    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
    }


}
?>