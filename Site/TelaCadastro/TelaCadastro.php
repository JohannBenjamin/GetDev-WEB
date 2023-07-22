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

    #formularioCadastro {
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
    $msg = '';

    if ($_POST) {
        $btn = $_POST['BotaoGambi'];
        if ($btn == 'Cadastrar') {
            $texto ='';
            foreach ($_POST as $dado => $valor) {
                if($dado=="BotaoGambi"){
                    break;
                }
                if(trim($texto) != "") {
                    $texto = $texto."&";
                }
                $texto=$texto."$dado=$valor";
            }

            header("Location:TelaCadastroPerfil.php?$texto");
        }
    }

    ?>
    <div class="container mt-3 w-25">
        <div class="row">
            <div class="col-sm-12 text-light text-center">
                <h1>Crie uma conta!</h1>
            </div>
        </div>
        <form action="" id="formularioCadastro" method="post" class="form-control border-0" onsubmit="return false;">
            <div class="row mt-3">
                <div class="col-sm-12">
                    <label for="txtNome" class="form-label text-white fs-4">Nome</label>
                    <input type="text" class="form-control" name="txtNome" id="txtNome" placeholder="Insira o seu nome completo">
                    <!-- volte aqui para colocar os valores (value) -->
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <label for="txtNascimento" class="form-label text-white fs-4">Data de nascimento</label>
                    <input type="date" class="form-control" name="txtNascimento" id="txtNascimento"
                        placeholder="Insira a sua data de nascimento">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <label for="txtEmail" class="form-label text-white fs-4">Email</label>
                    <input type="email" class="form-control" name="txtEmail" id="txtEmail" placeholder="Insira o seu Email">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <label for="txtSenha" class="form-label text-white fs-4">Senha</label>
                    <input type="password" class="form-control" name="txtSenha" id="txtSenha" placeholder="Insira a sua Senha">
                </div>
            </div>

            <input type="hidden" name="BotaoGambi" id="BotaoGambi1">

            <div class="row mt-3">
                <div class="col-sm-12 text-end">
                    <button class = "btn text-light" id="btnVoltar" name="btn" onclick="Voltar()">Voltar</button>
                    <button name="btn" id="btnCadastrar" class="btn btn-primary text-light" onclick="CadastrarPt1()">Cadastrar</button>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <p>
                        <?= $msg ?>
                    </p>
                </div>
            </div>
        </form>
    </div>
    <script src="ValidacoesCadastro.js"></script>
</body>

</html>