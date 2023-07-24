<header>
    <nav class="navbar text-white" style="background-color: #181B5A;">
        <div class="row">
            <div class="col-sm-2 justify-content-center">
                <img src="../img/logo.png" alt="" class="img-fluid">
            </div>
            <div class="col-sm">

            </div>
            <div class="col-sm-6 align-self-center text-end">
                <a class="btn btn-primary" href="../../Gerenciamento/_Sistema/TelaInicio.php">Gerenciamento</a>
                <div class="btn-group btn-group-justified px-3">
                    <div class="btn-group">
                        <a class="btn btn-outline-success" name="btn" id="btnEntrar"  href="">Perfil</a>
                        <button class="btn btn-outline-success" name="btn" id="btnEntrar" onclick="Sair()">Sair</button>
                    </div>
                </div>
            </div>
        </div>        
    </nav>
</header>
<script>
    function Sair() {
        var x =confirm("Certeza que deseja sair?");
        if(x == true)
        {
            window.location.href="../Login/LoginLogoff.php";
        }
        return;
    }
</script>