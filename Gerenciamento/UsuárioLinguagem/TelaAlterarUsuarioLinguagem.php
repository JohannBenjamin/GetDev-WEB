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
        $idUsuarioCampo = '';
        $idLinguagemCampo = '';
        $statusCampo = '';
        $obsCampo = '';

        if(!isset($_GET['id']))
        {
            header("Location:TelaUsuarioLinguagem.php");
        }

        include_once('../../Conexão/conexao.php');

        $id = $_GET['id'];

        try {
            $sql = $conn->query("
                select UL.id_UsuarioLinguagem, UL.id_Usuario_UsuarioLinguagem, UL.id_Linguagem_UsuarioLinguagem, UL.status_UsuarioLinguagem, UL.obs_UsuarioLinguagem, L.nome_Linguagem
                from UsuarioLinguagem as UL
                inner join Linguagem as L on L.id_Linguagem = UL.id_Linguagem_UsuarioLinguagem
                where UL.id_UsuarioLinguagem = $id
            ");

            if($sql->rowCount() >= 1)
            {
                foreach($sql as $row)
                {
                    $idCampo = $row[0];
                    $idUsuarioCampo = $row[1];
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
                    <input type="number" name="txtIdUsuario" id="txtIdUsuario" class="form-control" placeholder="Id do Usuário" value="<?=$idUsuarioCampo?>" min="0" readonly>
                </div>
                <div class="col-sm-6">
                    <select class="form-control" name="txtNomeUsuario" id="txtNomeUsuario" disabled="true">
                        <option value="">-- Selecione um Usuário --</option>
                        <?php include_once('BuscarUsuario.php'); ?>
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
                        <?php include_once('BuscarLinguagem.php'); ?>
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

            formulario.action = "AlterarUsuarioLinguagem.php";
            formulario.submit();
        }

        function Cancelar() {
            formulario.action = "TelaUsuarioLinguagem.php";
            formulario.submit();
        }
    </script>
</body>
</html>