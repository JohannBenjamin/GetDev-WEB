<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Bootstrap/css/bootstrap.css">
    <title>Serviços</title>
</head>
<body>
    <?php
        include_once("../TelaInicio/header.php");
    ?>
    <div class="container-fluid"  style="background-color: #01031b;">
        <div class="offset-sm-1 row">
            <div class="col-sm-3 my-4">
                <div class="card text-white" style="background-color:#36397B;">
                    <div class="card-body">
                        <form action="" method="post">
                            <h5>Linguagem</h5>
                            <hr>
                            <div class="row row-cols-2">
                                <?php
                                    include_once('BuscaLinguagens.php');
                                ?>
                            </div>
                            <br>

                            <h5>Data de Publição</h5>
                            <hr>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="momento" id="qualquer" value="qualquer" checked>
                                <label class="form-check-label" for="qualquer">
                                    Qualquer momento
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="momento" id="24h" value="24h">
                                <label class="form-check-label" for="24h">
                                    Últimas 24 horas
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="momento" id="3d" value="3d">
                                <label class="form-check-label" for="3d">
                                    Últimos 3 dias
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="momento" id="semana" value="semana">
                                <label class="form-check-label" for="semana">
                                    Desta semana
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="momento" id="mes" value="mes">
                                <label class="form-check-label" for="mes">
                                    Deste mês
                                </label>
                            </div>
                            <br>

                            <h5>Número de Propostas</h5>
                            <hr>
                            <label for="rangeProposta" class="form-label">Propostas</label>
                            <input type="range" class="form-range" min="0" max="5" name="rangeProposta" id="rangeProposta" value="5" oninput="((this.value == 5) ? this.nextElementSibling.value = '+'+this.value : this.nextElementSibling.value = this.value)">
                            <output class="offset-sm-5 text-center p-2">+5</output>
                            <br>
                            <button id="btnFiltro" name="btnFiltro" class="btn btn-primary" formaction="Filtro.php">Filtrar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <?php
                    if($_GET)
                    {
                        include_once("BuscaServicosFiltro.php");
                    }
                    else
                    {
                        include_once("BuscaServicos.php");
                    }
                ?>
            </div>
        </div>
    </div>
    <footer class="text-center text-lg-start" style="background-color: #070A39;">
        <div class="container d-flex justify-content-center py-4">
            <div class="text-center text-white">
                <p>© 2020 Copyright</p>
            </div>
    </footer>
    <script src="../../Bootstrap/js/bootstrap.js"></script>
</body>
</html>