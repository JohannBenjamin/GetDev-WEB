let formulario = document.getElementById("frmServico");
let id = document.getElementById("txtId");
let idUsuario = document.getElementById("txtIdUsuario");
let nome = document.getElementById("txtNome");
let valor = document.getElementById("txtValor");
let descricao = document.getElementById("txtDescricao");
let stts = document.getElementById("txtStatus");
let obs = document.getElementById("txtObs");
let btn = document.getElementById("BotaoGambi");

function exec() {
    formulario.action = "TelaServico.php";
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
    if (idUsuario.value.trim() == "" || idUsuario.value == null) {
        alert("Preencha o Id do Usuário!");
        idUsuario.focus();
        return;
    }
    if (nome.value.trim() == "" || nome.value == null) {
        alert("Preencha o Nome!");
        nome.focus();
        return;
    }
    if(valor.value.trim() == "" || valor.value == null){
        alert("Preencha o Valor!");
        valor.focus();
        return;
    }
    if (descricao.value.trim() == "" || descricao.value == null) {
        alert("Preencha a Descrição!");
        descricao.focus();
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
    window.location.href="TelaServico.php";
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