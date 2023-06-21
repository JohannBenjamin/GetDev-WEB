<?php
$idUsuarioLogin = '';
$nomeUsuario = '';
$loginUsuarioLogin = '';
$imgUsuarioLogin = '';

session_start();

if($_SESSION)
{
    if(isset($_SESSION['id_Usuario']) && isset($_SESSION['nome_Usuario']) && isset($_SESSION['login_Usuario']) && isset($_SESSION['img_Usuario'])) //se existe, se der bugs volte aqui deve ser aqui
    {
        $idUsuarioLogin = $_SESSION['id_Usuario'];
        $nomeUsuario = $_SESSION['nome_Usuario'];
        $loginUsuarioLogin = $_SESSION['login_Usuario'];
        $imgUsuarioLogin = $_SESSION['img_Usuario'];
    }
    else
    {
        header('location:TelaLogin.php');
    }
}
else
{
    header('location:TelaLogin.php');
}
?>