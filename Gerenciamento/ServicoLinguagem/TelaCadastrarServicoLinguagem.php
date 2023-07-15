<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Bootstrap/css/bootstrap.css">
    <title>Cadastrar uma Linguagem</title>
</head>
<body>
    <?php
        $msg = '';
        $idCampo = '';
        $idServicoCampo = '';
        $idLinguagemCampo = '';
        $statusCampo = '';
        $obsCampo = '';

        if(!isset($_GET['id']))
        {
            header("Location:TelaServicoLinguagem.php");
        }
    ?>
    <div class="container mt-3 w-50">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1>Cadastrando relação</h1>
            </div>
        </div>
        <form action="" method="post" class="form-control" id="frmCadastrar" onsubmit="return false;">
        <input type="hidden" name="txtIdServico" id="txtIdServico" value="<?=$_GET["id"]?>">
            <div class="row mt-3 justify-content-around">
                <div class="col-sm-3">
                    <input type="number" name="txtIdLinguagem" id="txtIdLinguagem" class="form-control" placeholder="Id da Linguagem" value="<?=$idLinguagemCampo?>" min="0">
                </div>
                <div class="col-sm-5">
                    <select class="form-control" name="txtNomeLinguagem" id="txtNomeLinguagem" disabled="true">
                        <option value="">-- Selecione uma Linguagem --</option>
                        <?php include_once('BuscarLinguagem.php'); ?>
                    </select>
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
                <div class="col-sm-12">
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
                        <?php include_once('../Linguagem/TabelaLinguagem.php')?>
                    </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 text-end">
                    <button type="button" name="btn" id="btnOK" class="btn btn-success" onclick="Cadastrar()">Cadastrar</button>
                    <button type="button" name="btn" id="btnCancelar" class="btn btn-danger" onclick="Cancelar()">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        let formulario = document.getElementById("frmCadastrar");
        let idLinguagem = document.getElementById("txtIdLinguagem")
        let stts = document.getElementById("txtStatus");

        function Cadastrar() {
            if (idLinguagem.value.trim() == "" || idLinguagem.value == null) {
                alert("Defina o Id da Linguagem!");
                idLinguagem.focus();
                return;
            }
            if (stts.value.trim() == "" || stts.value == null) {
                alert("Defina o status!");
                stts.focus();
                return;
            }

            formulario.action = "CadastrarServicoLinguagem.php";
            formulario.submit();
        }

        function Cancelar() {
            formulario.action = "TelaServicoLinguagem.php";
            formulario.submit();
        }
    </script>
</body>
</html>