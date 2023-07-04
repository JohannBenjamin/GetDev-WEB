<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Bootstrap/css/bootstrap.css">
    <title>Gerenciamento de Usuários</title>
</head>

<body>
    <?php
    $idCampo = "";
    $nomeCampo = "";
    $celularCampo = "";
    $emailCampo = "";
    $usuarioCampo = "";
    $senhaCampo = "";
    $descricaoCampo = "";
    $avaliacaoCampo = "";
    $projRealizadoCampo = "";
    $imgCampo = "";
    $curriculoCampo = "";
    $statusCampo = "";
    $obsCampo = "";
    $msg = "Execute uma operação...";

    if ($_POST) {
        $btn = $_POST['BotaoGambi'];
        if ($btn == 'buscar') {
            include_once('PesquisarUsuario.php');
        }
        if ($btn == 'cadastrar') {
            include_once('CadastrarUsuario.php');
            if ($situacao) {
                $idCampo = $id;
                include_once('PesquisarUsuario.php');
                $msg = 'Dados Cadastrados com sucesso. ID Gerado: ' . $id;
            }
        }
        if ($btn == 'alterar') {
            include_once('AlterarUsuario.php');
            if ($situacao) {
                $idCampo = $id;
                include_once('PesquisarUsuario.php');
                $msg = 'Dados alterados com sucesso';
            }

        }
        if ($btn == 'excluir') {
            include_once('ExcluirUsuario.php');
        }
    }
    ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1>Gerenciamento de Usuários</h1>
            </div>
        </div>
        <form enctype="multipart/form-data" action="" id="frmUsuario" method="post" class="form-control"
            onsubmit="return false;">
            <div class="row mt-3">
                <div class="col-sm-2">
                    <input type="number" name="txtId" id="txtId" class="form-control" placeholder="Id"
                        value="<?= $idCampo ?>" min="0">
                </div>
                <input type="hidden" id="BotaoGambi" name="BotaoGambi">
                <div class="col-sm-8">
                    <button class="btn btn-primary" id="btnBuscar" name="btn" value="buscar"
                        onclick="Pesquisar()">Buscar</button>
                </div>
                <div class="col-sm-2">
                    <input type="date" name="txtCadastro" id="txtCadastro" class="form-control"
                        value="<?= substr($cadastroCampo, 0, 10) ?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-6">
                    <input type="text" name="txtNome" id="txtNome" class="form-control" placeholder="Nome*"
                        value="<?= $nomeCampo ?>">
                </div>
                <div class="col-sm-3">
                    <input type="tel" name="txtCelular" id="txtCelular" class="form-control"
                        placeholder="(99)99999-9999*" onkeydown="return mascaracelular(event)"
                        value="<?= $celularCampo ?>">

                </div>
                <div class="col-sm-3">
                    <input type="date" name="txtNascimento" id="txtNascimento" class="form-control"
                        value="<?= substr($nascimentoCampo, 0, 10) ?>" min="1900-12-31" max="2024-12-30">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-6">
                    <input type="email" name="txtEmail" id="txtEmail" class="form-control"
                        placeholder="name@example.com*" value="<?= $emailCampo ?>">
                </div>
                <div class="col-sm-3">
                    <input type="text" name="txtUsuario" id="txtUsuario" class="form-control" placeholder="Usuário*"
                        value="<?= $usuarioCampo ?>">
                </div>
                <div class="col-sm-3">
                    <input type="password" name="txtSenha" id="txtSenha" class="form-control" placeholder="Senha*"
                        value="<?= $senhaCampo ?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-8">
                    <textarea name="txtDescricao" id="txtDescricao" rows="3" class="form-control"
                        placeholder="Descrição"><?= $descricaoCampo ?></textarea>
                </div>
                <div class="col-sm-2">
                    <input type="number" name="txtAvaliacao" id="txtAvaliacao" class="form-control"
                        placeholder="Nota de Avaliação" value="<?= $avaliacaoCampo ?>" min="0" step="0.1">
                </div>
                <div class="col-sm-2">
                    <input type="number" name="txtProjRealizado" id="txtProjRealizado" class="form-control"
                        placeholder="Número de Projetos" value="<?= $projRealizadoCampo ?>" min="0">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-4">
                    <input type="file" name="txtImg" id="txtImg" class="form-control">
                </div>
                <div class="col-sm-4">
                    <input type="file" name="txtCurriculo" id="txtCurriculo" class="form-control"
                        value="<?= $curriculoCampo ?>">
                </div>
                <div class="col-sm-4">
                    <select name="txtStatus" id="txtStatus" class="form-control">
                        <option value="">--- Selecione o status ---</option>
                        <option value="Ativo" <?= ($statusCampo == "Ativo" ? "selected" : "") ?>>Ativo</option>
                        <option value="Inativo" <?= ($statusCampo == "Inativo" ? "selected" : "") ?>>Inativo</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <textarea name="txtObs" id="txtObs" rows="5" class="form-control"
                        placeholder="Observações"><?= $obsCampo ?></textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-6 text-center">
                    <h5>
                        <?= $msg ?>
                    </h5>
                </div>
                <div class="col-sm-6 text-end">
                    <button class="btn btn-success" id="btnCadastrar" name="btn" value="cadastrar"
                        onclick="Cadastrar()">Cadastrar</button>
                    <button class="btn btn-secondary" id="btnAlterar" name="btn" value="alterar"
                        onclick="Alterar()">Alterar</button>
                    <button class="btn btn-warning" id="btnLimpar" name="btn" value="limpar"
                       onclick="Limpar()">Limpar</button>
                    <button class="btn btn-danger" id="btnExcluir" name="btn" value="excluir"
                        onclick="Excluir()">Excluir</button>
                    <button class="btn btn-dark" id="btnSair" name="btn" value="sair"
                        formaction="TelaUsuario.php">Sair</button>
                </div>
            </div>
        </form>
    </div>
    <script src="ValidacoesUsuario.js"></script>
    <script>

        function mascaracelular(event) {
            let tecla = event.key; //caso esteja errado possivelmente é o nome
            let celular = event.target.value.replace(/\D+/g, "");

            if (/^[0-9]$/i.test(tecla)) {
                celular = celular + tecla;
                let tamanho = celular.length;

                if (tamanho >= 12) {
                    return false;
                }
                if (tamanho > 10) {
                    celular = celular.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
                } else if (tamanho > 5) {
                    celular = celular.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
                } else if (tamanho > 2) {
                    celular = celular.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
                }
                else {
                    celular = celular.replace(/^(\d*)/, "($1");
                }

                event.target.value = celular;
            }

            if (!["Backspace", "Delete"].includes(tecla)) {
                return false;
            }
        }

    </script>
</body>

</html>