<?php
    include_once('../../Conexão/conexao.php');

    try {
        $sql = $conn->query("
            select * from Linguagem
        ");

        if ($sql->rowCount()>=1) {
            foreach ($sql as $row) {
                $id = $row[0];
                $nome = $row[1];
                $status = $row[2];
                $obs = $row[3];

                echo 
                "
                <tr>
                    <th scope='row'>$id</th>
                    <td>$nome</td>
                    <td>$status</td>
                    <td>$obs</td>
                </tr>
                ";
            }
        }
        else
        {
            echo "Sem Resultados";
        }

    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
?>