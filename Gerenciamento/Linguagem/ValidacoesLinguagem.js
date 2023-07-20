let formulario = document.getElementById("frmLinguagem");
let id = document.getElementById("txtId");
let nome = document.getElementById("txtNome");
let stts = document.getElementById("txtStatus");
let obs = document.getElementById("txtObs");
let btn = document.getElementById("BotaoGambi");

function exec() {
    formulario.action = "TelaLinguagem.php";
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
    window.location.href="TelaLinguagem.php";
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