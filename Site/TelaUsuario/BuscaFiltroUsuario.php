<?php
    include_once('../../Conexão/conexao.php');

    $vazio = true;
    $texto = '';
    foreach ($_GET as $filtro => $valor) {

        if($filtro != "rangeServico" && $filtro != "rangeAvaliacao") {
            if(trim($texto) == "") {
                $texto = " and ( ";
            }
            else {
                $texto = $texto." or ";
            }
            $texto = $texto." L.nome_Linguagem = '$valor' ";
        }
        else{
            if($texto != "") {
                $texto = $texto." ) ";
            }
        }

        if($filtro == "rangeServico") {
            $texto = $texto." and U.projRealizado_Usuario =".$valor;
        }

        if($filtro == "rangeAvaliacao") {
            if($valor == "0-1") {
                $texto = $texto." and (U.avaliacao_Usuario between 0 and 1) ";
            }
            elseif($valor == "2-4") {
                $texto = $texto." and (U.avaliacao_Usuario between 2 and 4) ";
            }
            else{
                $texto = $texto." and U.avaliacao_Usuario = 5 ";
            }
        }
        
    }

    try {
        $sql = $conn->query("
            select U.id_Usuario, U.nome_Usuario, U.descricao_Usuario, U.avaliacao_Usuario, U.projRealizado_Usuario, U.img_Usuario from Usuario as U
            inner join UsuarioLinguagem as UL on UL.id_Usuario_UsuarioLinguagem = U.id_Usuario
            inner join Linguagem as L on L.id_Linguagem = UL.id_Linguagem_UsuarioLinguagem
            where U.status_Usuario like 'Ativo' $texto
            group by U.id_Usuario
            order by U.avaliacao_Usuario DESC
           
        ");
        
        if ($sql->rowCount()>=1) {
            foreach ($sql as $row) {
                $idUsuario = $row[0];
                $nomeUsuario = $row[1];
                $descricaoUsuario = $row[2];
                $avaliacaoUsuario = $row[3];
                $projRealizadoUsuario = $row[4];
                $imgUsuario = $row[5];

                $textoDesc = (strlen($descricaoUsuario) >= 300)? substr($descricaoUsuario, 0, 299).".." : $descricaoUsuario;
                
                include("BuscaUsuarioLinguagens.php");

                $textoAvaliacao = '';
                for ($i=0; $i < 5; $i++) { 
                    if($i<$avaliacaoUsuario){
                        $textoAvaliacao=$textoAvaliacao."<span class='fa fa-star checked'></span>";
                    }
                    else{
                        $textoAvaliacao=$textoAvaliacao."<span class='fa fa-star'></span>";
                    }
                }
                echo 
                "
                <div class='card text-white my-4' style='background-color:#36397B;'>
                    <div class='card-body'>
                        <div class='row d-flex'>
                            <div class='col-sm-2 text-center align-self-center'>
                                <div class=''>
                                    <img src='".($imgUsuario == ""? "./img/usuarioPadrao.webp":"data:image/png;base64,$imgUsuario")."' alt='imgUsuario' class='img-fluid rounded-2 p-2' style='background-color: #686BA3'>
                                </div>
                            </div>
                            <div class='col-sm-10'>
                                <div class='row'>
                                    <div class='col-sm-9'>
                                        <h2>$nomeUsuario</h2>
                                    </div>
                                    <div class='col-sm-3 align-self-center text-center rounded-3 pt-1' style='background-color: #686BA3'>
                                        <h6>".($projRealizadoUsuario == 1? $projRealizadoUsuario.' Serviço realizado' : $projRealizadoUsuario.' Serviços realizados')."</h6>
                                    </div>
                                </div>
                                <div class='row'>
                                    <p class='text-center my-2 rounded-3 py-1' style='max-height: 10vh; background-color: #686BA3'>".($textoDesc == ""?"Sem Descrição":$textoDesc)."</p>
                                </div>
                                <div class='d-inline-block'>
                                    $btnLinguagens
                                </div>
                                <div class='text-end mt-2'>
                                    $textoAvaliacao
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ";
                $vazio = false;
            }
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
?>