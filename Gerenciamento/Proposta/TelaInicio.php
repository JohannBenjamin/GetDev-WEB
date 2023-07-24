<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Bootstrap/css/bootstrap.css">
    <title>Dashboard</title>

    <style>
        .subMenu{
            background-color: #686BA3;
            transition: 1s;
        }
        .nav-item:hover{
            background-color: #36397B;
        }
    </style>
</head>
<body>
    <?php
        include_once("../_Sistema/Autenticar.php");

        if($nomeUsuarioLogin != "admin"){
            header("Location:../../Site/Login/TelaLogin.php");
        }

        $tela='';
        if($_GET){
            $tela=$_GET['tela'];
        }
    ?>

    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-sm-2">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="../_Sistema/3093000.png" alt="usuario" class="rounded-circle img-fluid" style="width: 150px;"> <!-- terminar o card recem copiados-->
                        <h5 class="my-3"><?=$usuarioUsuarioLogin?></h5>
                        <p class="text-muted mb-1"><?=$nomeUsuarioLogin?></p>
                        <div class="d-flex justify-content-center mb-2">
                            <a class="btn btn-primary" href="../../Site/TelaInicio/index.php">Voltar</a>
                            <a class="btn btn-outline-primary ms-1" href="../../Site/Login/LoginLogoff.php">Sair</a>
                        </div>
                    </div>
                </div>

                <nav>
                    <ul class="nav nav-pills flex-column mb-0 align-items-center" id="menu">
                        <li class="nav-item rounded-2 my-2" <?=(!$_GET?"style='background-color: #36397B;'": "style='background-color: #686BA3'")?>>
                            <a href="../_Sistema/TelaInicio.php" class="nav-link text-white text-center fs-5" style='width:10vw;'>Início</a>
                        </li>
                        <li class="nav-item rounded-2 my-2" <?=($tela == "Usuario"?"style='background-color: #36397B;'": "style='background-color: #686BA3'")?>>
                            <a href="../Usuário/TelaInicio.php?tela=Usuario" class="nav-link text-white text-center fs-5" style='width:10vw;'>Usuário</a>
                        </li>
                        <li class="nav-item rounded-2 my-2" <?=($tela == "Servico"?"style='background-color: #36397B;'": "style='background-color: #686BA3'")?>>
                            <a href="../Serviço/TelaInicio.php?tela=Servico" class="nav-link text-white text-center fs-5" style='width:10vw;'>Serviço</a>
                        </li>
                        <li class="nav-item rounded-2 my-2" <?=($tela == "Linguagem"?"style='background-color: #36397B;'": "style='background-color: #686BA3'")?>>
                            <a href="../Linguagem/TelaInicio.php?tela=Linguagem" class="nav-link text-white text-center fs-5" style='width:10vw;'>Linguagem</a>
                        </li>
                        <li class="nav-item rounded-2 my-2" <?=($tela == "Projeto"?"style='background-color: #36397B;'": "style='background-color: #686BA3'")?>>
                            <a href="../Projeto/TelaInicio.php?tela=Projeto" class="nav-link text-white text-center fs-5" style='width:10vw;'>Projeto</a>
                        </li>
                        <li class="nav-item rounded-2 my-2" <?=($tela == "Proposta"?"style='background-color: #36397B;'": "style='background-color: #686BA3'")?>>
                            <a href="TelaInicio.php?tela=Proposta" class="nav-link text-white text-center fs-5" style='width:10vw;'>Proposta</a>
                        </li>
                        <li class="nav-item rounded-2 my-2" <?=($tela == "ServicoLinguagem"?"style='background-color: #36397B;'": "style='background-color: #686BA3'")?>>
                            <a href="../ServicoLinguagem/TelaInicio.php?tela=ServicoLinguagem" class="nav-link text-white text-center fs-5" style='width:13vw;'>ServicoLinguagem</a>
                        </li>
                        <li class="nav-item rounded-2 my-2" <?=($tela == "UsuarioLinguagem"?"style='background-color: #36397B;'": "style='background-color: #686BA3'")?>>
                            <a href="../UsuarioLinguagem/TelaInicio.php?tela=UsuarioLinguagem" class="nav-link text-white text-center fs-5" style='width:13vw;'>UsuarioLinguagem</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-sm-10">
                <?php
                    include_once("TelaProposta.php");
                ?>
            </div>
        </div>
    </div>
</body>
</html>