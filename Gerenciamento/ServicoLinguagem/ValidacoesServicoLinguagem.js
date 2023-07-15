let formulario = document.getElementById("frmServicoLinguagem");
let tabela = document.getElementById("tabela");
let idServicoLinguagem = document.getElementById("txtIdServicoLinguagem");
let idServico = document.getElementById("txtIdServico");

function Selecionar(id)
{
    idServicoLinguagem.value = id;
}
function Pesquisar() {
    if (idServico.value.trim() == "" || idServico.value == null) {
        alert("Preencha o Id do Serviço!");
        idServico.focus();
        return;
    }
    
    formulario.action = "TelaServicoLinguagem.php";
    formulario.submit();
}

function Cadastrar() {
    if (idServico.value.trim() == "" || idServico.value == null) {
        alert("Preencha o Id do Serviço!");
        idServico.focus();
        return;
    }
    
    formulario.action = "TelaCadastrarServicoLinguagem.php?id="+idServico.value;
    formulario.submit();
}

function Alterar() {
    if (idServico.value.trim() == "" || idServico.value == null) {
        alert("Preencha o Id do Serviço!");
        idServico.focus();
        return;
    }
    
    formulario.action = "TelaAlterarServicoLinguagem.php?id="+idServicoLinguagem.value;
    formulario.submit();
}

function Limpar() {    
    window.location.href="TelaServicoLinguagem.php";
}

function Excluir() {
    if (idServico.value.trim() == "" || idServico.value == null) {
        alert("Preencha o Id do Serviço!");
        idServico.focus();
        return;
    }

    formulario.action = "ExcluirServicoLinguagem.php?id="+idServicoLinguagem.value;
    formulario.submit();
}