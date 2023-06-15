<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    include_once('conexao.php');

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
    }
    ?>
</body>

</html>