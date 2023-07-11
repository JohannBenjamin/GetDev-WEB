<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Bootstrap/css/bootstrap.css">
    <title>Gerenciamento de Linguagens dos Usuários</title>
</head>

<body>
    <?php
        $msg = '';
        $idCampo = '';
        $idUsuarioCampo = '';
        $usuarioCampo = '';
        $statusCampo = '';
        $obsCampo = '';
        $array = [''];

        if($_POST)
        {
            include_once("PesquisarUsuarioLinguagem.php");
        }
    ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1>Gerenciamento de Linguagens dos Usuários</h1>
            </div>
        </div>
        <form action="" method="post" class="form-control" id="frmUsuarioLinguagem" onsubmit="return false;">
            <div class="row mt-3">
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="number" name="txtIdUsuario" id="txtIdUsuario" class="form-control" placeholder="Id do Usuário" value="<?=$idUsuarioCampo?>" min="0">
                        <button class="btn btn-primary" id="btnBuscar" name="btn" value="buscar" onclick="Pesquisar()">Buscar</button>
                    </div>
                </div>
                <div class="col-sm-3 align-self-end">
                    <h5><?=$msg?></h5>
                </div>
                <div class="col-sm-6 text-end">
                    <button type="button" name="btn" id="btnCadastrar" class="btn btn-success" <?= ($usuarioCampo == ""?"disabled":"") ?> onclick="Cadastrar()">Cadastrar</button>
                    <button type="button" name="btn" id="btnLimpar" class="btn btn-warning" <?= ($usuarioCampo == ""?"disabled":"") ?> onclick="Limpar()">Limpar</button>
                    <button type="button" name="btn" id="btnSair" class="btn btn-dark" <?= ($usuarioCampo == ""?"disabled":"") ?>>Sair</button>
                </div>
            </div>
            
            <div class="row mt-3">
                <div class="col-sm-6">
                    <h3><?= ($usuarioCampo == ""?"":"Usuário: $usuarioCampo") ?></h3>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-info table-sm table-bordered caption-top mt-3" id="tabela">
                    <?= ($usuarioCampo==""?"":"<caption>Lista de Linguagens:</caption>
                    <thead>
                        <tr>
                        <th scope='col'>#Id</th>
                        <th scope='col'>Linguagem</th>
                        <th scope='col'>#Linguagem</th>
                        <th scope='col'>Status</th>
                        <th scope='col'>Observações</th>
                        <th scope='col'>Ações</th>
                        </tr>
                    </thead>")?>
                    <tbody>

                    <?php
                    if($_POST)
                    {
                        if(sizeof($array) != 0)
                        {
                            foreach ($array as $value) {
                                echo $value;
                            }
                        }
                    }
                    ?>

                    </tbody>
                </table>
            </div>

            <input type="hidden" name="txtIdUsuarioLinguagem" id="txtIdUsuarioLinguagem">
            <input type="hidden" name="txtIdLinguagem" id="txtIdLinguagem">
            <input type="hidden" name="BotaoGambi" id="BotaoGambi">
        </form>
    </div>
    <script src="../../Bootstrap/js/bootstrap.bundle.js"></script> <!--para funcionar o dropdown-->
    <script src="ValidacoesUsuarioLinguagem.js"></script>
</body>
</html>