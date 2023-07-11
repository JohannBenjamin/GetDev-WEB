let formulario = document.getElementById("frmProjeto");
let id = document.getElementById("txtId");
let id_usuario = document.getElementById("txtIdUsuario");
let nome = document.getElementById("txtNome");
let link = document.getElementById("txtLink");
let img = document.getElementById("txtImg"); // variavel da imagem
let stts = document.getElementById("txtStatus");
let obs = document.getElementById("txtObs");
let btn = document.getElementById("BotaoGambi");

function exec() {
    formulario.action = "TelaProjeto.php";
    formulario.submit();
}

function Pesquisar() {
    if (id.value.trim() == "" || id.value == null) {
        alert("Preencha o ID!");
        id.focus();
        return;
    }

    btn.value = "buscar";
    exec();
}

function Cadastrar() {
    if (nome.value.trim() == "" || nome.value == null) {
        alert("Preencha o seu nome!");
        nome.focus();
        return;
    }
    if (link.value.trim() == "" || link.value == null) {
        alert("Insira a sua conta do GitHub ou de seu portfolio");
        link.focus();
        return;
    }
    if (img.value.trim() == "" || img.value == null) {
        alert("Insira uma imagem de seu projeto");
        img.focus();
        return;
    }
    if(stts.value.trim() == "" || stts.value == null){
        alert("Insira um Status");
        stts.focus();
        return;
    }

    btn.value = "cadastrar";
    exec();
}

function Alterar(){
    if(id.value.trim() == "" || id.value == null){
        alert("Preencha o ID!");
        id.focus();
        return;
    }
    
    btn.value = "alterar";
    exec();
}

function Limpar(){
    id.value = "";
    id_usuario = "";
    nome.value = "";
    link.value = "";
    img.value = "";
    stts.value = "";
    obs.value = "";
}

function Excluir(){
    if(id.value.trim() == "" || id.value == null){
        alert("Antes de deletar preencha o ID!");
        id.focus();
        return;
    }

    btn.value = "excluir"
    exec();
}


