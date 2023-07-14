<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Bootstrap/css/bootstrap.css">
    <title>Gerenciamento de Serviços</title>
</head>
<body>
    <?php
        $msg = 'Execute uma operação..';
        $idCampo = '';
        $idUsuarioCampo = '';
        $publicacaoCampo = '';
        $nomeCampo = '';
        $statusCampo = '';
        $descricaoCampo = '';
        $obsCampo = '';

        if($_POST)
        {
            $btn = $_POST['BotaoGambi'];
            if($btn == 'buscar')
            {
                include_once('PesquisarServico.php');
            }
            if($btn == 'cadastrar')
            {
                include_once('CadastrarServico.php');
            }
            if($btn == 'alterar')
            {
                include_once('AlterarServico.php');
            }
            if($btn == 'excluir')
            {
                include_once('ExcluirServico.php');
            }
        }
    ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1>Gerenciamento de Serviços</h1>
            </div>
        </div>
        <form action="" method="post" class="form-control" id="frmServico" onsubmit="return false;">
            <div class="row mt-3">
                <div class="col-sm-2">
                    <input type="number" name="txtId" id="txtId" class="form-control" placeholder="Id" value="<?= $idCampo ?>">
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-primary" id="btnBuscar" name="btn" value="buscar" onclick="Pesquisar()">Buscar</button>
                </div>
                <div class="col-sm">
                    <input type="hidden" id="BotaoGambi" name="BotaoGambi">
                </div>
                <div class="col-sm-2">
                    <input type="number" name="txtIdUsuario" id="txtIdUsuario" class="form-control" placeholder="Id do Usuário" value="<?= $idUsuarioCampo ?>">
                </div>
                <div class="col-sm-3">
                    <select class="form-control" name="txtNomeUsuario" id="txtNomeUsuario" disabled="true">
                        <option value="">-- Selecione um Usuário --</option>
                        <?php include_once('../Proposta/BuscarUsuario.php'); ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <input type="date" name="txtPublicacao" id="txtPublicacao" class="form-control" value="<?= substr($publicacaoCampo, 0, 10) ?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-7">
                    <input type="text" name="txtNome" id="txtNome" class="form-control" placeholder="Nome" value="<?= $nomeCampo ?>">
                </div>
                <div class="col-sm-2">
                    <input type="number" name="txtValor" id="txtValor" class="form-control" placeholder="Valor" value="<?= $valorCampo ?>" min=0 step="0.01">
                </div>
                <div class="col-sm-3">
                    <select name="txtStatus" class="form-control" id="txtStatus">
                        <option value="">-- Selecione um Status --</option>
                        <option value="Ativo" <?=($statusCampo=="Ativo"?"selected":"")?>>Ativo</option>
                        <option value="Inativo" <?=($statusCampo=="Inativo"?"selected":"")?>>Inativo</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <textarea name="txtDescricao" id="txtDescricao" rows="2" class="form-control" placeholder="Descrição"><?= $descricaoCampo ?></textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <textarea name="txtObs" id="txtObs" rows="5" class="form-control" placeholder="Observações"><?= $obsCampo ?></textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-6 text-center">
                    <h5><?= $msg ?></h5>
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
    <script src="ValidacoesServico.js"></script>
</body>
</html>