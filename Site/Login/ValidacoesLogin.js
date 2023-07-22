let frm = document.getElementById("frmLogin");
let senha = document.getElementById("txtSenha");
let usuario = document.getElementById("txtUsuario");

function Login() {
    if(usuario.value.trim() == "" || usuario.value == null){
        alert("Preencha o nome de usuário!");
        usuario.focus();
        return;
    }
    if (senha.value.trim() == "" || senha.value == null) {
        alert("Preencha a senha!");
        senha.focus();
        return;
    }

    frm.action = "TelaLogin.php";
    frm.submit();
}

function Voltar() {
    window.location.href="../TelaInicio/index.php";
}