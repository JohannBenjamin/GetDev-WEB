<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Bootstrap/css/bootstrap.css">
</head>

<body>
    <?php
        $erro = '';

        if ($_POST) {
            include_once('../../Conexão/conexao.php');
            $login = $_POST['txtLogin']; //caso algo esteja errado volte aqui, provavelmente é aqui
            $senha = $_POST['txtSenha']; //idem
        
            try {
                $sql = $conn->query("
                select * from Usuario where usuario_Usuario like '$login' and senha_Usuario like md5('$senha'); ");
                
             // volte aqui mais tarde
        
                if ($sql->rowcount() == 1) {
                    session_start();

                    foreach ($sql as $row) {
                        $_SESSION['id_Usuario'] = $row[0];
                        $_SESSION['usuario_Usuario'] = $row[4];
                        $_SESSION['nome_Usuario'] = $row[1];
                        $_SESSION['img_Usuario'] = $row[11];
                        header('Location:../../Gerenciamento/Linguagem/TelaLinguagem.php');
                    } //
                    //volte aqui para o header
                } else {
                    $erro = 'Erro, usuário ou senha inválidos!';
                }
            } catch (PDOException $ex) {
                $erro = $ex->getMessage();
            }
        }
    ?>

    <form action="" method="post" name="login" id="login">
        <section class="vh-100" style="background-color: #508bfc;">
            <div class="container py-5 5-100">
                <div class="row d-flex justify-content-center align-item-center h-100">
                    <div class="col-12" col-md-8 col-lg-6 col-x1-5>
                        <div class="card-body p-5 text-center">
                            <h3 class="mb-5">Entrar</h3>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id= "txtLogin" name = "txtLogin" class="form-control form-control-lg"> <!-- volte aqui possa ter um erro aqui -->
                            <label class= "form-label" for="txtLogin">Usuário</label>
                        </div>
                        
                        <div class="form-outline mb-4">
                            <input type="text" name="txtSenha" id="txtSenha" class="form-control form-control-lg">
                            <label class= "form-label" for="txtSenha">Senha</label>
                        </div>
                    </div>
                    <button class = "btn btn-primary btn-lg btn block" id="btnLogin" name="btn" formaction="TelaLogin.php">Login</button>
                    <hr>
                    <p><?= $erro ?></p>
                </div>
            </div>
        </section>
    </form>
</body>
</html>