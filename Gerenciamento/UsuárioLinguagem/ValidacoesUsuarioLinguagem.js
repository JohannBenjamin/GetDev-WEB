let formulario = document.getElementById("frmUsuarioLinguagem");
let tabela = document.getElementById("tabela");
let idUsuarioLinguagem = document.getElementById("txtIdUsuarioLinguagem");
let idUsuario = document.getElementById("txtIdUsuario");

function Selecionar(id)
{
    idUsuarioLinguagem.value = id;
}
function Pesquisar() {
    if (idUsuario.value.trim() == "" || idUsuario.value == null) {
        alert("Preencha o Id do Usuário!");
        idUsuario.focus();
        return;
    }
    
    formulario.action = "TelaUsuarioLinguagem.php";
    formulario.submit();
}

function Cadastrar() {
    if (idUsuario.value.trim() == "" || idUsuario.value == null) {
        alert("Preencha o Id do Usuário!");
        idUsuario.focus();
        return;
    }
    
    formulario.action = "TelaCadastrarUsuarioLinguagem.php?id="+idUsuario.value;
    formulario.submit();
}

function Alterar() {
    if (idUsuario.value.trim() == "" || idUsuario.value == null) {
        alert("Preencha o Id do Usuário!");
        idUsuario.focus();
        return;
    }
    
    formulario.action = "TelaAlterarUsuarioLinguagem.php?id="+idUsuarioLinguagem.value;
    formulario.submit();
}

function Limpar() {    
    window.location.href="TelaUsuarioLinguagem.php";
}

function Excluir() {
    if (idUsuario.value.trim() == "" || idUsuario.value == null) {
        alert("Preencha o Id do Usuário!");
        idUsuario.focus();
        return;
    }

    formulario.action = "ExcluirUsuarioLinguagem.php?id="+idUsuarioLinguagem.value;
    formulario.submit();
}