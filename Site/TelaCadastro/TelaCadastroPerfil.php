<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Bootstrap/css/bootstrap.css">
</head>
<style>
    body {
        background-color: #01031b;
    }

    #formularioCadastro2 {
        background-color: #181B5A
    }

    #btnVoltar {
        background-color: #686BA3;
    }

    #btnVoltar:hover {
        background-color: #36397B;
    }
</style>

<body>
    <?php
    $msg= '';
        if ($_POST) {
            $btn = $_POST['BotaoGambi'];
            if ($btn == 'Cadastrar') {
                $textoCadastrar ='';
                foreach ($_POST as $dado => $valor) {
                    if($dado=="BotaoGambi"){
                        break;
                    }
                    if(trim($textoCadastrar) != "") {
                        $textoCadastrar = $textoCadastrar."&";
                    }
                    
                    $textoCadastrar=$textoCadastrar."$dado=$valor";
                }
                $img = $_FILES['txtImg']['tmp_name'];
                $curriculo = $_FILES['txtCurriculo']['tmp_name'];
                //.$_POST['BotaoGet']."&$textoCadastrar&txtImg=$img&txtCurriculo=$curriculo
                include_once("BotaoCadastro.php");

            }
        }
        
        if(!$_GET)
        {
            header("Location:TelaCadastro.php");
        }
        
        $texto = '';

        foreach ($_GET as $dado => $valor) {
            if(trim($texto) != "") {
                $texto = $texto."&";
            }
            $texto=$texto."$dado=$valor";
        }
    ?>
    <div class="container mt-3  w-50">
        <div class="row">
            <div class="col-sm-12 text-white">
                <h1 class="text-center">Continuando o cadastro...</h1>
            </div>
        </div>
        <form enctype="multipart/form-data" action="" id="formularioCadastro2" method="post" class="form-control border-0" onsubmit="return false;">
            <div class="row mt-3">
                <div class="col-sm-8">
                    <label for="txtUsuario" class="form-label text-white fs-4">Usuario*</label>
                    <input type="text" class="form-control" name="txtUsuario" id="txtUsuario"
                        placeholder="Insira o seu nome de Usuário">
                </div>
                <div class="col-sm-4">
                    <label for="txtCelular" class="form-label text-white fs-4">Celular*</label>
                    <input type="tel" name="txtCelular" id="txtCelular" class="form-control"
                        placeholder="(99)99999-9999" onkeydown="return mascaracelular(event)">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <label for="txtDescricao" class="form-label text-white fs-4">Descrição</label>
                    <textarea name="txtDescricao" id="txtDescricao" rows="3" class="form-control"
                        placeholder="Coloque uma pequena descrição sobre você e suas habilidades."></textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-6">
                    <label for="txtImg" class="form-label text-white fs-4">Insira uma foto de perfil</label>
                    <input type="file" class="form-control" name="txtImg" id="txtImg">
                </div>
                <div class="col-sm-6">
                    <label for="txtCurriculo" class="form-label text-white fs-4">Insira seu Currículo</label>
                    <input type="file" class="form-control" name="txtCurriculo" id="txtCurriculo">
                </div>
            </div>

            <input type="hidden" name="BotaoGambi" id="BotaoGambi2">
            <input type="hidden" name="BotaoGet" id="BotaoGet" value="<?=$texto?>">

            <div class="row mt-3">
                <div class="col-sm-12 text-end">
                    <button class = "btn text-light" id="btnVoltar" name="btn" onclick="VoltarDif()">Voltar</button>
                    <button name="btn" id="btnCadastrar" class="btn btn-primary text-light" onclick="CadastrarPt2()">Finalizar seu cadastro</button>
                </div>
            </div>
        </form>
    </div>
    <script src="ValidacoesCadastro.js"></script>
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
                celular = celular.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1)$2-$3");
            } else if (tamanho > 5) {
                celular = celular.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1)$2-$3");
            } else if (tamanho > 2) {
                celular = celular.replace(/^(\d\d)(\d{0,5})/, "($1)$2");
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