<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="txtImg" id="txtImg" accept=".png">
        <button name="btn" id="btnTeste" formaction="paginaTeste.php">Testar</button>

        
    </form>
    
    <?php
    if($_POST)
    {
        $arquivo = file_get_contents($_FILES['txtImg']['tmp_name']);
        echo var_dump($_FILES['txtImg']['tmp_name']);
        echo $codificado = base64_encode($arquivo);
        echo "<a href='data:image/png;base64,$codificado' download='teste'><img src='data:image/png;base64,$codificado' alt=''></a>";
    }
    /*include_once('conexao.php');

    try {
        $sql = $conn->query('select * from Linguagem');

        if ($sql->rowcount() != 0) {
            foreach ($sql as $linha) {
                echo '<pre>';
                print_r($linha);
                echo '</pre>';
                echo "nome da linguagem: " . $linha[1] . "<br>";
            }
        } else {
            echo "A noticia que não queriamos dar!";
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }*/
    ?>
</body>

</html>