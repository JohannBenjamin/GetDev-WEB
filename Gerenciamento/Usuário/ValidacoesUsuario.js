let formulario = document.getElementById("frmUsuario");
let id = document.getElementById("txtId");
let nome = document.getElementById("txtNome");
let telefone = document.getElementById("txtCelular");
let nascimento = document.getElementById("txtNascimento");
let email = document.getElementById("txtEmail");
let usuario = document.getElementById("txtUsuario");
let senha = document.getElementById("txtSenha");
let stts = document.getElementById("txtStatus");
let obs = document.getElementById("txtObs");
let btn = document.getElementById("BotaoGambi"); //volte no código tela usuario e coloque a gambiarra
let avaliacao = document.getElementById("txtAvaliacao");
let projeto = document.getElementById("txtProjRealizado");
let desc = document.getElementById("txtDescricao");

function exec() {
    formulario.action = "TelaUsuario.php";
    formulario.submit();
}

function Pesquisar() {
    if (id.value.trim() == "" || id.value == null) {
        alert("Preencha o Id!");
        id.focus();
        return;
    }

    btn.value = "buscar";
    exec();
}

function Cadastrar() {
    if (nome.value.trim() == "" || nome.value == null) {
        alert("Preencha o nome!");
        nome.focus();
        return;
    }
    if (telefone.value.trim() == "" || telefone.value == null) {
        alert("Preencha o seu número de telefone!");
        telefone.focus();
        return;
    }
    if (nascimento.value.trim() == "" || !nascimento.checkValidity()) { //tem a possibilidade disso não funcionar, volte se necessario.
        alert("Preencha a sua data de nascimento!");
        nascimento.focus();
        return;
    }
    if(email.value.trim() == "" || email.value == null){
        alert("Preencha o email!");
        email.focus();
        return;
    }
    if(usuario.value.trim() == "" || usuario.value == null){
        alert("Preencha o nome de usuário!");
        usuario.focus();
        return;
    }
    if(senha.value.trim() == "" || senha.value == null){
        alert("Preencha a senha do usuário!");
        senha.focus();
        return;
    }
    if (stts.value.trim() == "" || stts.value == null) {
        alert("Defina o status!");
        stts.focus();
        return;
    }

    btn.value = "cadastrar";
    exec();

}

function Alterar() {
    if (id.value.trim() == "" || id.value == null) {
        alert("Preencha o Id!");
        id.focus();
        return;
    }

    btn.value = "alterar";
    exec();
}

function Limpar() {
    id.value = "";
    nome.value = "";
    telefone.value = "";
    nascimento.value = "";
    email.value = "";
    usuario.value = "";
    senha.value = "";
    avaliacao.value = "";
    txtProjRealizado.value = "";
    desc.value = "";     
    stts.value = "";
    obs.value = "";
}

function Excluir() {
    if (id.value.trim() == "" || id.value == null) {
        alert("Preencha o Id!");
        id.focus();
        return;
    }

    btn.value = "excluir";
    exec();
}

