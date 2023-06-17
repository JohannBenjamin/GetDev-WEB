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
        background-color: #2A3270;
    }
    #formulario 
    {
        background-color: #FFCE2B;
    }
</style>

<body>
    <?php
    $nomeCadastro = '';
    $nascimentoCadastro = '';
    $emailCadastro = '';
    $senhaCadastro = '';
    $telefoneCadastro = '';
    $msg = '';

    if ($_POST) {
       $btn = $_POST['btn']; //volte aqui quando tiver os botões ou botão
       if($btn == 'Cadastrar')
       {
        include_once('BotaoCadastro.php');
       }
    }

    ?>
    <div class="container mt-3 w-25">
        <div class="row">
            <div class="col-sm-12 text-light text-center">
                <h1>Crie uma conta!</h1>
            </div>
        </div>
        <form action="" id="formulario" method="post" class= "form-control">
            <div class="row mt-3">
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="txtNome" placeholder="Insira o seu nome completo">
                    <!-- volte aqui para colocar os valores (value) -->
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <input type="date" class="form-control" name="txtNascimento"
                        placeholder="Insira a sua data de nascimento">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <input type="email" class="form-control" name="txtEmail" placeholder="Insira o seu Email">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <input type="password" class="form-control" name="txtSenha" placeholder="Insira a sua Senha">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <input type="tel" class="form-control" name="txtTelefone"
                        placeholder="Insira o seu número de telefone">
                    <!-- Volte aqui quando descobrir como usar o input tel corretamente!! -->
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <textarea name="txtDescricao" id="txtDescricao" rows="5" class="form-control"
                        placeholder="Coloque uma pequena descrição sobre você e suas habilidades."></textarea>
                    <!--volte aqui para colocar nome e id -->
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12 text-end">
                    <button  name = "btn" id="btnCadastrar" class="btn btn-primary" formaction="TelaCadastro.php" value="Cadastrar">Cadastrar</button>
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
</body>

</html>