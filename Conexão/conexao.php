<?php 
$bd = 'pedped668_getdevweb';
$host = 'mysql.freehostia.com';
$user = 'pedped668_getdevweb';
$pass = 'Php_Seguro69'; //talvez seja necessario voltar aqui


try {
    /*$certificado = array(
        PDO::MYSQL_ATTR_SSL_CA => "/etc/ssl/certs/ca-certificates.crt",
    );*/
    $conn = new PDO("mysql:dbname=$bd;host=$host",$user,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $conn->exec("set names utf8");

    /*$dsn = "mysql:host={$_host};dbname={$bd}";
    $options = array(
        PDO::MYSQL_ATTR_SSL_CA => "/etc/ssl/certs/ca-certificates.crt",
    );
    $pdo = new PDO($dsn, $_ENV["USERNAME"], $_ENV["PASSWORD"], $options);*/
} catch (PDOException $ex) {
    echo $ex->getMessage();
}


?>
  
