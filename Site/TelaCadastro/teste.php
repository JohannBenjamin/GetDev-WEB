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
        background-color: #01031b;
    }

    #formulario {
        background-color: #181B5A
    }
</style>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-12 text-white">
                <h1 class="text-center">Continuando o cadastro...</h1>
            </div>
        </div>
        <form action="" id="formulario" method="post" class="form-control border-0">
            <div class="row mt-3">
                <div class="col-sm-12">

                    <label for="NomeUsuario" class="form-label text-white">Usuario</label>
                    <input type="text" class="form-control" name="txtUsuario"
                        placeholder="Insira o seu nome de Usuário">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <label for="txtDescricao" class="form-label text-white">descrição</label>
                    <textarea name="txtDescricao" id="txtDescricao" rows="3" class="form-control"
                        placeholder="Coloque uma pequena descrição sobre você e suas habilidades."></textarea>
                </div>

            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <label for="img" class="form-label text-white">Insira uma foto de perfil</label>
                    <input type="file" class="form-control" name="txtImg">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <label for="curriculo" class="form-label text-white">Insira seu Currículo</label>
                    <input type="file" class="form-control" name="txtCurriculo">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <button name="btn" id="btnCadastrar" class="btn text-light"></button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>