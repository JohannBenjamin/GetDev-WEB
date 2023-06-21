<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Bootstrap/css/bootstrap.css">
    <title>Gerenciamento de Linguagens</title>
</head>
<body>
    <?php
        $idCampo = '';
        $nomeCampo = '';
        $statusCampo = '';
        $obsCampo = '';
        $msg = 'Execute uma operação...';

        if($_POST)
        {
            $btn = $_POST['btn'];
            if($btn == 'buscar')
            {
                include_once('PesquisarLinguagem.php');
            }
            if($btn == 'cadastrar')
            {
                include_once('CadastrarLinguagem.php');
                if($situacao)
                {
                    $idCampo = $id;
                    include_once('PesquisarLinguagem.php');
                    $msg = 'Dados Cadastrados com sucesso. ID Gerado: '.$id;
                }
            }
            if($btn == 'alterar')
            {
                include_once('AlterarLinguagem.php');
                if($situacao)
                {
                    $idCampo = $id;
                    include_once('PesquisarLinguagem.php');
                    $msg = 'Dados Alterados com sucesso';
                }
            }
            if($btn == 'excluir')
            {
                include_once('ExcluirLinguagem.php');
            }
        }
    ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1>Gerenciamento de Linguagens</h1>
            </div>
        </div>
        <form action="" method="post" class="form-control">
            <div class="row mt-3">
                <div class="col-sm-2">
                    <input type="number" name="txtId" id="txtId" class="form-control" placeholder="Id" value="<?=$idCampo?>">
                </div>
                <div class="col-sm-10">
                    <button class="btn btn-primary" id="btnBuscar" name="btn" value="buscar" formaction="TelaLinguagem.php">Buscar</button>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-8">
                    <input type="text" name="txtNome" id="txtNome" class="form-control" placeholder="Nome" value="<?=$nomeCampo?>">
                </div>
                <div class="col-sm-4">
                    <select name="txtStatus" id="txtStatus" class="form-control">
                        <option value="">--- Selecione o status ---</option>
                        <option value="Ativo" <?=($statusCampo=="Ativo"?"selected":"")?>>Ativo</option>
                        <option value="Inativo" <?=($statusCampo=="Inativo"?"selected":"")?>>Inativo</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <textarea name="txtObs" id="txtObs" rows="5" class="form-control" placeholder="Observações"><?=$obsCampo?></textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-6 text-center">
                    <h5><?=$msg?></h5>
                </div>
                <div class="col-sm-6 text-end">
                    <button class="btn btn-success" id="btnCadastrar"name="btn" value="cadastrar" formaction="TelaLinguagem.php">Cadastrar</button>
                    <button class="btn btn-secondary" id="btnAlterar" name="btn" value="alterar" formaction="TelaLinguagem.php">Alterar</button>
                    <button class="btn btn-warning" id="btnLimpar" name="btn" value="limpar" formaction="TelaLinguagem.php">Limpar</button>
                    <button class="btn btn-danger" id="btnExcluir" name="btn" value="excluir" formaction="TelaLinguagem.php">Excluir</button>
                    <button class="btn btn-dark" id="btnSair" name="btn" value="sair" formaction="TelaLinguagem.php">Sair</button>
                </div>
            </div>
        </form>
    </div>
    <br>
    <div class="container mt-3 table-responsive">
        <table class="table table-info table-striped table-sm table-bordered caption-top mt-3">
        <caption>Lista de Linguagens:</caption>
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Status</th>
            <th scope="col">Observações</th>
            </tr>
        </thead>
        <tbody>
            <?php include_once('TabelaLinguagem.php')?>
        </tbody>
        </table>
    </div>

</body>
</html>