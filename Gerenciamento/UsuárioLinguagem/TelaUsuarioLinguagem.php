<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Bootstrap/css/bootstrap.css">
    <title>Gerenciamento de Linguagens dos Usuários</title>
</head>

<body onload="Carregar()">
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
        <form action="" method="post" class="form-control" id="frmUsuarioLinguagem">
            <div class="row mt-3">
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="number" name="txtIdUsuario" id="txtIdUsuario" class="form-control" placeholder="Id do Usuário" value="<?=$idUsuarioCampo?>" min="0">
                        <button class="btn btn-primary" id="btnBuscar" name="btn" value="buscar" formaction="TelaUsuarioLinguagem.php">Buscar</button>
                    </div>
                </div>
                
                <div class="col-sm-9">
                    <h5><?=$msg?></h5>
                </div>
            </div>
            <!-- input de -->
            <div class="row border-top border-bottom mt-3 p-2">
                <div class="col-sm-6">
                    <h3><?= ($usuarioCampo == ""?"":"Usuário: $usuarioCampo") ?></h3>
                </div>
                <div class="col-sm-6 text-end">
                    <button type="button" name="btn" id="btnCadastrar" class="btn btn-success" <?= ($usuarioCampo == ""?"disabled":"") ?> >Cadastrar</button>
                    <button type="button" name="btn" id="btnAlterar" class="btn btn-secondary" <?= ($usuarioCampo == ""?"disabled":"") ?> onclick="Alterar()">Alterar</button>
                    <button type="button" name="btn" id="btnLimpar" class="btn btn-warning" <?= ($usuarioCampo == ""?"disabled":"") ?> onclick="Limpar()">Limpar</button>
                    <button type="button" name="btn" id="btnExcluir" class="btn btn-danger" <?= ($usuarioCampo == ""?"disabled":"") ?>>Excluir</button>
                    <button type="button" name="btn" id="btnSair" class="btn btn-dark" <?= ($usuarioCampo == ""?"disabled":"") ?>>Sair</button>
                </div>
            </div>
            <div class="container mt-3 table-responsive">
                <table class="table table-info table-sm table-bordered caption-top mt-3" id="tabela">
                    <?= ($usuarioCampo==""?"":"<caption>Lista de Linguagens:</caption>
                    <thead>
                        <tr>
                        <th scope='col'>#</th>
                        <th scope='col'>Linguagem</th>
                        <th scope='col'>Status</th>
                        <th scope='col'>Observações</th>
                        </tr>
                    </thead>")?>
                    <tbody>

                    <!--tr ondblclick="Selecionar(id)" id="10" class="">
                        <th scope='row'>1</th>
                        <td>$nome</td>
                        <td>$status</td>
                        <td>$obs</td>
                    </tr-->

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

            <input type="hidden" name="txtIdLinguagem" id="txtIdLinguagem">
            <input type="hidden" name="BotaoGambi" id="BotaoGambi">

            <div class="row p-2" id="inputsHidden">
                <div class="row">
                    <div class="col-sm-4 text-end">
                        <select name="txtStatus" id="txtStatus" class="form-control">
                            <option value="">--- Selecione o status ---</option>
                            <option value="Ativo" <?=($statusCampo=="Ativo"?"selected":"")?>>Ativo</option>
                            <option value="Inativo" <?=($statusCampo=="Inativo"?"selected":"")?>>Inativo</option>
                        </select>
                    </div>

                    <div class="col-sm-8">
                        <textarea type="text" name="txtObs" id="txtObs" rows=2 class="form-control"></textarea>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-sm-12 text-end">
                        <button type="button" name="btn" id="btnOK" class="btn btn-success">OK</button>
                        <button type="button" name="btn" id="btnCancelar" class="btn btn-danger" onclick="Cancelar()">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="../../Bootstrap/js/bootstrap.bundle.js"></script> <!--para funcionar o dropdown-->
    <script>
        let tabela = document.getElementById("tabela");
        let idLinguagem = document.getElementById("txtIdLinguagem");
        let status = document.getElementById("txtStatus");
        let obs = document.getElementById("txtObs");
        let teste =document.getElementById("inputsHidden");
        let botaoAlterar =document.getElementById("btnAlterar");
        let botaoExcluir =document.getElementById("btnExcluir");

        function ValidarAlterar()
        {
            if (idLinguagem.value.trim() == "" || idLinguagem.value == null) {
                botaoAlterar.disabled = true;
                botaoExcluir.disabled = true;
            }
            else
            {
                botaoAlterar.disabled = false;
                botaoExcluir.disabled = false;
            }
        }
        
        function Alterar()
        {
            teste.style.visibility = 'visible';
        }

        function Carregar() {
            ValidarAlterar();
            Cancelar();
        }

        function Cancelar() {
            teste.style.visibility = 'hidden';
            status.value = '';
            obs.value = '';
        }
        
        function Selecionar(id)
        {
            let tamanho = tabela.rows.length; //retorna a quantidade de rows/<tr>

            for (let row of tabela.rows)
            {
                let removerEfeito = row.classList;
                removerEfeito.remove("table-active");
            }

            let linhaSelecionada = document.getElementById(id).classList; //pega a lista das classes da linha selecionada
            linhaSelecionada.add("table-active"); //adiciona table-active na classe

            celula =document.getElementById(id).cells.item(0).innerHTML;
            idLinguagem.value = celula;
            ValidarAlterar();
        }

        function Limpar() {
            for (let row of tabela.rows)
            {
                let removerEfeito = row.classList;
                removerEfeito.remove("table-active");
            }
            idLinguagem.value = "";
            ValidarAlterar();
        }
    </script>
</body>

</html>