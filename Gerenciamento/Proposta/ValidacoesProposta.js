let formulario = document.getElementById("frmProposta");
let id = document.getElementById("txtId");
let idUsuario = document.getElementById("txtIdUsuario");
let idServico = document.getElementById("txtIdServico");
let descricao = document.getElementById("txtDescricao");
let valor = document.getElementById("txtValor");
let stts = document.getElementById("txtStatus");
let obs = document.getElementById("txtObs");
let btn = document.getElementById("BotaoGambi");

function exec() {
    formulario.action = "TelaProposta.php";
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
    if (idServico.value.trim() == "" || idServico.value == null) {
        alert("Preencha o Id da Serviço!");
        idServico.focus();
        return;
    }
    if (descricao.value.trim() == "" || descricao.value == null) {
        alert("Preencha a Descrição!");
        descricao.focus();
        return;
    }
    if(valor.value.trim() == "" || valor.value == null){
        alert("Preencha o Valor!");
        valor.focus();
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
    window.location.href="TelaProposta.php";
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