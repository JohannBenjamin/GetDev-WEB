<?php
$idUsuarioLogin = '';
$nomeUsuarioLogin = '';
$usuarioUsuarioLogin = '';
$imgUsuarioLogin = '';

session_start();

if($_SESSION)
{
    if(isset($_SESSION['id_Usuario']) && isset($_SESSION['nome_Usuario']) && isset($_SESSION['usuario_Usuario']))
    {
        $idUsuarioLogin = $_SESSION['id_Usuario'];
        $nomeUsuarioLogin = $_SESSION['nome_Usuario'];
        $usuarioUsuarioLogin = $_SESSION['usuario_Usuario'];
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