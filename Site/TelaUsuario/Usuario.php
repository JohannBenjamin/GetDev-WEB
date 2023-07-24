<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Usuários</title>

    <style>
        .checked {
            color: orange;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        if ($_SESSION) {
            if($_SESSION['id_Usuario']){
                include_once('../TelaInicio/headerLogado.php');
            }
        } else {
            include_once('../TelaInicio/header.php');
        }
    ?>
    <div class="container-fluid"  style="background-color: #01031b;">
        <nav class='row nav nav-tabs border-0'>
            <div class='offset-sm-3 col-sm-2'>
                <a class='nav-link text-center rounded-1 my-2 text-white fs-4' href='../TelaInicio/index.php' style="background-color: #181B5A;">Início</a>
            </div>
            <div class='col-sm-2'>
                <a class='nav-link text-center rounded-1 my-2 text-white fs-4' href='Usuario.php' style='background-color: #36397B'>Freelancers</a>
            </div>
            <div class='col-sm-2'>
                <a class='nav-link text-center rounded-1 my-2 text-white fs-4' href='../TelaServiço/Servico.php' style="background-color: #181B5A;">Serviços</a>
            </div>
        </nav>
        <div class="row">
            <h1 class="text-center text-white my-3">Ache os melhores Freelancers!</h1>
            <div class="offset-sm-1 col-sm-3 my-4">
                <div class="card text-white" style="background-color:#36397B;">
                    <div class="card-body">
                        <form action="" method="post">
                            <h3>Filtro</h3>
                            <br>

                            <h5>Linguagem</h5>
                            <hr>
                            <div class="row row-cols-2">
                                <?php
                                    include_once('../TelaServiço/BuscaLinguagens.php');
                                ?>
                            </div>
                            <br>

                            <h5>Serviços Realizados</h5>
                            <hr>
                            <!--div class="form-check">
                                <input class="form-check-input" type="radio" name="momento" id="qualquer" value="30" checked>
                                <label class="form-check-label" for="qualquer">
                                    Qualquer momento
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="momento" id="24h" value="1">
                                <label class="form-check-label" for="24h">
                                    Últimas 24 horas
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="momento" id="3d" value="3">
                                <label class="form-check-label" for="3d">
                                    Últimos 3 dias
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="momento" id="semana" value="7">
                                <label class="form-check-label" for="semana">
                                    Desta semana
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="momento" id="mes" value="30">
                                <label class="form-check-label" for="mes">
                                    Deste mês
                                </label>
                            </div-->

                            <label for="rangeServico" class="form-label">Número de serviços realizados</label>
                            <input type="range" class="form-range" min="0" max="5" name="rangeServico" id="rangeServico" value="0" oninput="((this.value == 5) ? this.nextElementSibling.value = '+'+this.value : this.nextElementSibling.value = this.value)">
                            <output class="offset-sm-5 text-center p-2">0</output>
                            <br>
                            <br>

                            <h5>Avaliação</h5>
                            <hr>

                            <div class="row my-3 justify-content-center">
                                <div class="col-sm-4">
                                    <input type="radio" class="btn-check" name="rangeAvaliacao" id="minimo" autocomplete="off" value="0-1">
                                    <label class="btn btn-outline-primary" for="minimo">0 - 1 estrelas</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="radio" class="btn-check" name="rangeAvaliacao" id="medio" autocomplete="off" value="2-4">
                                    <label class="btn btn-outline-primary" for="medio">2 - 4 estrelas</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="radio" class="btn-check" name="rangeAvaliacao" id="maximo" autocomplete="off" value="5">
                                    <label class="btn btn-outline-primary" for="maximo">5 estrelas</label>
                                </div>
                            </div>

                            <div class="text-end">
                                <button id="btnFiltro" name="btnFiltro" class="btn btn-primary" formaction="FiltroUsuario.php">Filtrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <?php
                    if($_GET)
                    {
                        include_once("BuscaFiltroUsuario.php");
                        if($vazio){
                            echo "<h1 class='mt-3 text-white'>Sem Resultados!</h1>";
                        }
                    }
                    else
                    {
                        include_once("BuscaUsuarios.php");
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>