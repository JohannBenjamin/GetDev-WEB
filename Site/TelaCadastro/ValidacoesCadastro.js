let frmPt1 = document.getElementById("formularioCadastro");
let frmPt2 = document.getElementById("formularioCadastro2");
let nome = document.getElementById("txtNome");
let nascimento = document.getElementById("txtNascimento");
let email = document.getElementById("txtEmail");
let senha = document.getElementById("txtSenha");
let usuario = document.getElementById("txtUsuario");
let telefone = document.getElementById("txtCelular");
let btn1 = document.getElementById("BotaoGambi1");
let btn2 = document.getElementById("BotaoGambi2");
let btnGet = document.getElementById("BotaoGet");

function CadastrarPt1() {
    if (nome.value.trim() == "" || nome.value == null) {
        alert("Preencha o nome!");
        nome.focus();
        return;
    }
    if (nascimento.value.trim() == "" || !nascimento.checkValidity()) {
        alert("Preencha a sua data de nascimento!");
        nascimento.focus();
        return;
    }
    if(email.value.trim() == "" || email.value == null){
        alert("Preencha o email!");
        email.focus();
        return;
    }
    if(senha.value.trim() == "" || senha.value == null){
        alert("Preencha a senha do usuário!");
        senha.focus();
        return;
    }

    btn1.value = "Cadastrar";
    frmPt1.action = "TelaCadastro.php";
    frmPt1.submit();
}

function CadastrarPt2() {
    if(usuario.value.trim() == "" || usuario.value == null){
        alert("Preencha o nome de usuário!");
        usuario.focus();
        return;
    }
    if (telefone.value.trim() == "" || telefone.value == null) {
        alert("Preencha o seu número de telefone!");
        telefone.focus();
        return;
    }

    btn2.value = "Cadastrar";
    frmPt2.action = "TelaCadastroPerfil.php?" + btnGet.value;
    frmPt2.submit();
}

function Voltar() {
    window.location.href="../TelaInicio/index.php";
}

function VoltarDif() {
    window.location.href="TelaCadastro.php";
}