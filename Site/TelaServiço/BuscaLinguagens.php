<?php
    include_once('../../Conexão/conexao.php');

    try {
        $sql = $conn->query("
            select nome_Linguagem from Linguagem
        ");

        if ($sql->rowCount()>=1) {
            foreach ($sql as $row) {
                echo 
                "
                <div class='col'>
                    <div class='form-check'>
                        <input class='form-check-input' type='checkbox' value='$row[0]' name='$row[0]' id='input$row[0]'>
                        <label class='form-check-label' for='input$row[0]'>
                            $row[0]
                        </label>
                    </div>
                </div>
                ";
            }
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
?>