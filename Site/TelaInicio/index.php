<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Bootstrap/css/bootstrap.css">
</head>

<body>
    <?php
    session_start();
    if ($_SESSION) {
        if($_SESSION['id_Usuario']){
            include_once('headerLogado.php');
        }
    } else {
        include_once('header.php');
    }
    ?>
    <div class="container-fluid" style="background-color: #01031b;">
        <div class="container">
            <nav class='row nav nav-tabs border-0'>
                <div class='offset-sm-3 col-sm-2'>
                    <a class='nav-link text-center rounded-1 my-2 text-white fs-4' href='index.php' style='background-color: #36397B'>Início</a>
                </div>
                <div class='col-sm-2'>
                    <a class='nav-link text-center rounded-1 my-2 text-white fs-4' href='../TelaUsuario/Usuario.php' style="background-color: #181B5A;">Freelancers</a>
                </div>
                <div class='col-sm-2'>
                    <a class='nav-link text-center rounded-1 my-2 text-white fs-4' href='../TelaServiço/Servico.php' style="background-color: #181B5A;">Serviços</a>
                </div>
            </nav>
            <div class="row">
                <div class="col-sm-12 mt-3">
                    <h1 class="text-white text-center">Bem vindo a GetDev, uma plataforma para programadores
                        programarem.
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 p-5">
                    <div id="carouselExampleCaptions" class="carousel slide carousel-dark" data-bs-ride="false">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../Img/pasted image 0.png" class="d-block" alt="...">

                                <div class="carousel-caption d-none d-md-block">
                                    <div class="rounded-pill text-white p-1" style="background-color: #36397B;">
                                        <h1>Seja seu próprio chefe!</h1>
                                        <p>Escolha seus clientes e seus projetos, faça seu talento render.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="../Img/what-is-software-engineering.png" class="d-block" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="rounded-pill text-white p-1" style="background-color: #36397B;">
                                        <h1>Trabalhe onde e quando quiser!</h1>
                                        <p>
                                            Seja em uma praia paradisíaca, na sua cafeteria chique favorita ou em sua
                                            casa, trabalhe onde quiser e quando quiser.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="../Img/desenvolvedor-de-software-1200x700.png" class="d-block" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="rounded-pill text-white p-1" style="background-color: #36397B;">
                                        <h1>Escolha a pessoa que dará vida ao seu projeto!</h1>
                                        <p>Escolha um freelancer ou receba propostas de profissionais interresados em
                                            seu projeto.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>

            <hr class="featurette-divider">
            <div class="row justify-content-around align-items-center">

                <div class="col-sm-6 text-white rounded-2" style="background-color:#181B5A;">
                    <h1>Para você que busca um trabalho freelancer</h1>
                    <p>
                        Encontre projetos ideais para você, envie a sua proposta para o cliente que você tenha interesse
                        em trabalhar com, trabalhe do seu jeito e ao finalizar o projeto receba o seu suado pagamento.
                    </p>
                </div>
                <div class="col-sm-5">
                    <div class="col-sm-12 text-center">
                        <img src="../Img/programacao-700x394.png" alt="" class="img-fluid w-75">
                    </div>
                </div>
            </div>
            <hr class="featurette-divider">
            <div class="row justify-content-around align-items-center mt-3">
                <div class="col-sm-5 text-center">
                    <img src="../Img/29458e68-edfc-4d96-b73d-639c63d57f50.webp" alt="" class="img-fluid w-75">
                </div>
                <div class="col-sm-6 text-white rounded-2" style="background-color:#181B5A; ">
                    <h1>Para você que busca um programador para seu projeto</h1>
                    <p>
                        Publique um projeto e comece a receber propostas de profissionais, descreva o serviço de que
                        você necessita, o tipo de profissional e o seu orçamento. Interaja e selecione o melhor
                        profissional para o serviço qeu você necessita, revise os perfis que mostraram interesse em seu
                        projeto e converse e entre em um acordo com o freelancer.
                    </p>
                </div>
            </div>
            <hr class="featurette-divider">
            <div class="row justify-content-evenly">
                <div class="col-sm-2 text-white rounded-5" style="background-color: #36397B;">
                    <img src="../Img/writing.png" alt="" class="img-fluid bg-white rounded-5 my-2 px-1">
                    <h1>Projetos</h1>
                    <hr>
                    <p>
                        Seja uma simples manutenção em seu site, programa, sistema ou até mesmo desenvolver do zero o
                        seu projeto, seja pessoal ou profissional.
                    </p>
                </div>
                <div class="col-sm-2 text-white rounded-5" style="background-color: #36397B;">
                    <img src="../Img/user.png" alt="" class="img-fluid bg-light  rounded-5 my-2 p-2">
                    <h1>Quem é você </h1>
                    <hr>
                    <p>Descreva quem é você, sua trajetora, seus hobbies. em resumo se apresente.</p>
                </div>
                <div class="col-sm-2 text-white rounded-5" style="background-color: #36397B;">
                    <img src="../Img/book.png" alt="" class="img-fluid bg-white rounded-5 my-2 px-2">
                    <h1> Sua Formação</h1>
                    <hr>
                    <p>
                        Descreva sua trajetora acadêmica, sua escolaridade, seus cursos e como você trabalha.
                    </p>
                </div>
            </div>
            <hr class="featurette-divider">
            <div class="row p-3">
                <div class="col-sm-7 text-white text-center">
                    <h1>O que está esperando?!</h1>
                </div>
                <div class="col-sm-5 text-center">
                    <button class="btn btn-primary btn-lg" style="background-color: #54456b;">
                        Cadastrar
                    </button>
                    <button class="btn btn-primary btn-lg" style="background-color: #54456b;">
                        Entrar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php
        include_once("footer.php");
    ?>
    <script src="../../Bootstrap/js/bootstrap.js"></script>
</body>

</html>