<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Bootstrap/css/bootstrap.css">
</head>
<style>
    body {
        /*background-color: #2A3270;          #3D54CC*/
        background-color: #01031b;
    }

    #frmLogin {
        /* background-color: #FFCE2B;*/
        background-color: #181B5A;
    }

    #btnVoltar {
        background-color: #686BA3;
    }

    #btnVoltar:hover {
        background-color: #36397B;
    }
</style>
<body>
    <?php
        $erro = '';

        if ($_POST) {
            include_once('../../Conexão/conexao.php');
            $usuario = $_POST['txtUsuario'];
            $senha = $_POST['txtSenha'];
        
            try {
                $sql = $conn->query("
                    select * from Usuario where usuario_Usuario like '$usuario' and senha_Usuario like md5('$senha')
                ");
        
                if ($sql->rowcount() == 1) {
                    session_start();

                    foreach ($sql as $row) {
                        $_SESSION['id_Usuario'] = $row[0];
                        $_SESSION['usuario_Usuario'] = $row[4];
                        $_SESSION['nome_Usuario'] = $row[1];
                        $_SESSION['img_Usuario'] = $row[11];
                        header('Location:../TelaInicio/index.php');
                    }
                } else {
                    $erro = 'Erro, usuário ou senha inválidos!';
                }
            } catch (PDOException $ex) {
                $erro = $ex->getMessage();
            }
        }
    ?>
    <div class="container mt-5 w-25">
        <div class="container">
            <form action="" method="post" class="form-control border-0" name="frmLogin" id="frmLogin" onsubmit="return false;">
                <div class="row">
                    <div class="col-sm-12 text-light text-center">
                        <h1 class="my-4">Entrar</h1>
                    </div>
                </div>
                <div class="row d-flex">
                    <div class="col-sm-12 text-light">
                        <div class="form-outline mb-4">
                            <label class= "form-label fs-4" for="txtUsuario">Usuário</label>
                            <input type="text" id= "txtUsuario" name = "txtUsuario" class="form-control form-control-md">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12  text-light">
                        <div class="form-outline mb-4">
                            <label class= "form-label fs-4" for="txtSenha">Senha</label>
                            <input type="password" name="txtSenha" id="txtSenha" class="form-control form-control-md">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-end">
                        <button class = "btn text-light" id="btnVoltar" name="btn" onclick="Voltar()">Voltar</button>
                        <button class = "btn btn-primary text-light" id="btnLogin" name="btn" onclick="Login()">Login</button>
                        <p><?= $erro ?></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="ValidacoesLogin.js"></script>
</body>
</html>