<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Bootstrap/css/bootstrap.css">
    <title>Gerenciamento de Projetos dos Usuários</title>
</head>
<body>
    <?php
        $msg = 'Execute uma operaçao...';
        $idCampo = '';
        $idUsuarioCampo = '';
        $nomeUsuarioCampo = '';
        $nomeCampo = '';
        $linkCampo = '';
        $statusCampo = '';
        $obsCampo = '';

        if($_POST)
        {
            $btn = $_POST['BotaoGambi'];
            if($btn == 'buscar')
            {
                include_once('PesquisarProjeto.php');
            }
            if($btn == 'cadastrar')
            {
                include_once('CadastrarProjeto.php');
                /*if($situacao)
                {
                    $idCampo = $id;
                    include_once('PesquisarProjeto.php');
                    $msg = 'Dados Cadastrados com sucesso. ID Gerado: '.$id;
                }*/
            }
            if($btn == 'alterar')
            {
                include_once('AlterarProjeto.php');
                /*if($situacao)
                {
                    $idCampo = $id;
                    include_once('PesquisarProjeto.php');
                    $msg = 'Dados Alterados com sucesso';
                }*/
            }
            if($btn == 'excluir')
            {
                include_once('ExcluirProjeto.php');
            }
        }
    ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1>Gerenciamento de Projetos dos Usuários</h1>
            </div>
        </div>
        <form enctype="multipart/form-data"  action="" method="post" class="form-control" id="frmProjeto" onsubmit="return false;">
            <div class="row mt-3">
                <div class="col-sm-2">
                    <input type="number" name="txtId" id="txtId" class="form-control" placeholder="Id" value="<?=$idCampo?>" min=0>
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-primary" id="btnBuscar" name="btn" value="buscar" onclick = "Pesquisar()">Buscar</button>
                </div>
                <div class="col-sm-3">

                </div>
                <div class="col-sm-2">
                    <input type="number" name="txtIdUsuario" id="txtIdUsuario" class="form-control" placeholder="Id do Usuário" value="<?=$idUsuarioCampo?>" min=0>
                </div>
                <div class="col-sm-3">
                    <select class="form-control" name="txtNomeUsuario" id="txtNomeUsuario" disabled="true">
                        <option value="">-- Selecione um Usuário --</option>
                        <?php include_once('BuscarUsuario.php'); ?>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-8">
                    <input type="text" name="txtNome" id="txtNome" class="form-control" placeholder="Nome" value=<?=$nomeCampo?>>
                </div>
                <div class="col-sm-4">
                    <input type="text" name="txtLink" id="txtLink" class="form-control" placeholder="GitHub, Site, etc.." value=<?=$linkCampo?>>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-8">
                    <input type="file" name="txtImg" id="txtImg" class="form-control">
                </div>
                <div class="col-sm-4">
                    <select name="txtStatus" class="form-control" id="txtStatus">
                        <option value="">-- Selecione um Status --</option>
                        <option value="Ativo" <?=($statusCampo=="Ativo"?"selected":"")?>>Ativo</option>
                        <option value="Inativo" <?=($statusCampo=="Inativo"?"selected":"")?>>Inativo</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <textarea name="txtObs" placeholder="Observações" class="form-control" rows="5" id="txtObs"><?=$obsCampo?></textarea>
                </div>                    
            </div>
            <input type="hidden" id="BotaoGambi" name="BotaoGambi">
            <div class="row mt-3">
                <div class="col-sm-6">
                    <div class="col-sm-12 text-center">
                        <h5><?=$msg?></h5>
                    </div>
                </div>
                <div class="col-sm-6 text-end">
                    <button id="btnCadastrar" name="btn" class="btn btn-success" value="cadastrar" onclick = "Cadastrar()">Cadastrar</button>
                    <button id="btnAlterar" name="btn" class="btn btn-secondary" value="alterar" onclick = "Alterar()">Alterar</button>
                    <button id="btnLimpar" name="btn" class="btn btn-warning" value="limpar" onclick = "Limpar()" >Limpar</button>
                    <button id="btnExcluir" name="btn" class="btn btn-danger" value="excluir" onclick = "Excluir()">Excluir</button>
                    <button id="btnSair" name="btn" class="btn btn-dark" formaction="" value="sair">Sair</button>
                </div>
            </div>
        </form>
    </div>
    <script src= "ValidacoesProjeto.js"></script>
</body>
</html>