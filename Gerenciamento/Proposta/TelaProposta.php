<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Bootstrap/css/bootstrap.css">
    <title>Gerenciamento de Propostas</title>
</head>
<body>
    <?php
        $msg = 'Execute uma operação..';
        $idCampo = '';
        $cadastroCampo = '';
        $idUsuarioCampo = '';
        $nomeUsuarioCampo = '';
        $idLinguagemCampo = '';
        $nomeLinguagemCampo = '';
        $descricaoCampo = '';
        $emailCampo = '';
        $celularCampo = '';
        $valorCampo = '';
        $statusCampo = '';
        $obsCampo = '';

        if($_POST)
        {
            $btn = $_POST['BotaoGambi'];
            if($btn == 'buscar')
            {
                include_once('PesquisarProposta.php');
            }
            if($btn == 'cadastrar')
            {
                include_once('CadastrarProposta.php');
            }
            if($btn == 'alterar')
            {
                include_once('AlterarProposta.php');
            }
            if($btn == 'excluir')
            {
                include_once('ExcluirProposta.php');
            }
        }
    ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1>Gerenciamento de Propostas</h1>
            </div>
        </div>
        <form action="" method="post" class="form-control" id="frmProposta" onsubmit="return false;">
            <div class="row mt-3">
                <div class="col-sm-2">
                    <input type="number" name="txtId" id="txtId" class="form-control" placeholder="Id" value="<?=$idCampo?>" min=0>
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-primary" id="btnBuscar" name="btn" value="buscar" onclick="Pesquisar()">Buscar</button>
                </div>
                <div class="col-sm-2">
                    <input type="number" name="txtIdServico" id="txtIdServico" class="form-control" placeholder="Id do Servico" value="<?=$idServicoCampo?>" min="0">
                </div>
                <div class="col-sm-2">
                    <input type="number" name="txtIdUsuario" id="txtIdUsuario" class="form-control" placeholder="Id do Usuário" value="<?=$idUsuarioCampo?>" min="0">
                </div>
                <div class="col-sm-3">
                    <select class="form-control" name="txtNomeUsuario" id="txtNomeUsuario" disabled="true">
                        <option value="">-- Selecione um Usuário --</option>
                        <?php include_once('BuscarUsuario.php'); ?>
                    </select>
                </div>
                    <input type="hidden" id="BotaoGambi" name="BotaoGambi">
                <div class="col-sm-2">
                    <input type="date" name="txtCadastro" id="txtCadastro" class="form-control"
                        value="<?= substr($publicacaoCampo, 0, 10) ?>" disabled="true">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <textarea name="txtDescricao" placeholder="Descrição" class="form-control" rows="2" id="txtDescricao"><?=$descricaoCampo?></textarea>
                </div>                    
            </div>
            <div class="row mt-3">
                <div class="col-sm-4">
                    <input type="email" name="txtEmail" id="txtEmail" class="form-control" placeholder="name@example.com" value="<?= $emailCampo ?>">
                </div>
                <div class="col-sm-3">
                    <input type="tel" name="txtCelular" id="txtCelular" class="form-control" placeholder="(99)99999-9999" onkeydown="return mascaracelular(event)" value="<?= $celularCampo ?>">
                </div>
                <div class="col-sm-2">
                    <input type="number" name="txtValor" id="txtValor" class="form-control" step="0.01" min="0" placeholder="Valor" value="<?=$valorCampo?>">
                </div>
                <div class="col-sm-3">
                    <select name="txtStatus" id="txtStatus" class="form-control">
                        <option value="">--- Selecione o status ---</option>
                        <option value="Ativo" <?= ($statusCampo == "Ativo" ? "selected" : "") ?>>Ativo</option>
                        <option value="Inativo" <?= ($statusCampo == "Inativo" ? "selected" : "") ?>>Inativo</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <textarea name="txtObs" id="txtObs" rows="5" class="form-control" placeholder="Observações"><?= $obsCampo ?></textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-6 text-center">
                    <h5>
                        <?= $msg ?>
                    </h5>
                </div>
                <div class="col-sm-6 text-end">
                    <button class="btn btn-success" id="btnCadastrar" name="btn" value="cadastrar" onclick="Cadastrar()">Cadastrar</button>
                    <button class="btn btn-secondary" id="btnAlterar" name="btn" value="alterar" onclick="Alterar()">Alterar</button>
                    <button class="btn btn-warning" id="btnLimpar" name="btn" value="limpar" onclick="Limpar()">Limpar</button>
                    <button class="btn btn-danger" id="btnExcluir" name="btn" value="excluir" onclick="Excluir()">Excluir</button>
                    <button class="btn btn-dark" id="btnSair" name="btn" value="sair" formaction="TelaUsuario.php">Sair</button>
                </div>
            </div>
        </form>
    </div>
    <script src="ValidacoesProposta.js"></script>
    <script>
        function mascaracelular(event) {
            let tecla = event.key;
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

            if (!["Backspace", "Delete", "Tab"].includes(tecla)) {
                return false;
            }
        }
    </script>
</body>
</html>