<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Bootstrap/css/bootstrap.css">
    <title>Alterando relação</title>
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

        include_once('../../Conexão/conexao.php');

        $id = $_GET['id'];

        try {
            $sql = $conn->query("
                select SL.id_ServicoLinguagem, SL.id_Servico_ServicoLinguagem, SL.id_Linguagem_ServicoLinguagem, SL.status_ServicoLinguagem, SL.obs_ServicoLinguagem, L.nome_Linguagem
                from ServicoLinguagem as SL
                inner join Linguagem as L on L.id_Linguagem = SL.id_Linguagem_ServicoLinguagem
                where SL.id_ServicoLinguagem = $id
            ");

            if($sql->rowCount() >= 1)
            {
                foreach($sql as $row)
                {
                    $idCampo = $row[0];
                    $idServicoCampo = $row[1];
                    $idLinguagemCampo = $row[2];
                    $statusCampo = $row[3];
                    $obsCampo = $row[4];
                    $nomeLinguagemCampo = $row[5];
                }
            }
        } catch (PDOException $ex) {
            $msg = $ex->getMessage();
        }
    ?>
    <div class="container mt-3 w-50">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1>Alteração</h1>
            </div>
        </div>
        <form action="" method="post" class="form-control" id="frmAlterar" onsubmit="return false;">
            <div class="row mt-3 justify-content-around">
                <div class="col-sm-2">
                    <input type="number" name="txtId" id="txtId" class="form-control" placeholder="Id" value="<?=$idCampo?>" min="0" readonly>
                </div>
                <div class="col-sm-6">
                    <select name="txtStatus" id="txtStatus" class="form-control">
                        <option value="">--- Selecione o status ---</option>
                        <option value="Ativo" <?=($statusCampo=="Ativo"?"selected":"")?>>Ativo</option>
                        <option value="Inativo" <?=($statusCampo=="Inativo"?"selected":"")?>>Inativo</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3 justify-content-around">
                <div class="col-sm-2">
                    <input type="number" name="txtIdServico" id="txtIdServico" class="form-control" placeholder="Id do Serviço" value="<?=$idServicoCampo?>" min="0" readonly>
                </div>
                <div class="col-sm-6">
                    <select class="form-control" name="txtNomeServico" id="txtNomeServico" disabled="true">
                        <option value="">-- Selecione um Serviço --</option>
                        <?php include_once('BuscarServico.php'); ?>
                    </select>
                </div>
            </div> 
            <div class="row mt-3 justify-content-around">
                <div class="col-sm-2">
                    <input type="number" name="txtIdLinguagem" id="txtIdLinguagem" class="form-control" placeholder="Id da Linguagem" value="<?=$idLinguagemCampo?>" min="0" readonly>
                </div>
                <div class="col-sm-6">
                    <select class="form-control" name="txtNomeLinguagem" id="txtNomeLinguagem" disabled="true">
                        <option value="">-- Selecione uma Linguagem --</option>
                        <?php include_once('../UsuárioLinguagem/BuscarLinguagem.php'); ?>
                    </select>
                </div>
            </div>
            <div class="row mt-3 justify-content-center">
                <div class="col-sm-10">
                    <textarea name="txtObs" id="txtObs" rows="5" class="form-control" placeholder="Observações"><?=$obsCampo?></textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12 text-end pe-5">
                    <button type="button" name="btn" id="btnOK" class="btn btn-success" onclick="Alterar()">Alterar</button>
                    <button type="button" name="btn" id="btnCancelar" class="btn btn-danger" onclick="Cancelar()">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        let formulario = document.getElementById("frmAlterar");
        let stts = document.getElementById("txtStatus");

        function Alterar() {
            if (stts.value.trim() == "" || stts.value == null) {
                alert("Defina o status!");
                stts.focus();
                return;
            }

            formulario.action = "AlterarServicoLinguagem.php";
            formulario.submit();
        }

        function Cancelar() {
            formulario.action = "TelaServicoLinguagem.php";
            formulario.submit();
        }
    </script>
</body>
</html>