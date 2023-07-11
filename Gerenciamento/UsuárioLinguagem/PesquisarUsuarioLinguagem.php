<?php
    include_once('../../Conexão/conexao.php');

    if(!$_POST)
    {
        header('Location:TelaLinguagem.php');
    }

    if(empty($_POST['txtIdUsuario']))
    {
        $msg = "Informe um Id";
    }
    
    $id = $_POST['txtIdUsuario'];

    try {
        $sql = $conn->query("
            select UL.id_UsuarioLinguagem, L.id_Linguagem, U.id_Usuario, U.nome_Usuario, L.nome_Linguagem, UL.status_UsuarioLinguagem, UL.obs_UsuarioLinguagem
            from UsuarioLinguagem as UL
            inner join Linguagem as L on L.id_Linguagem = UL.id_Linguagem_UsuarioLinguagem
            inner join Usuario as U on U.id_Usuario = UL.id_Usuario_UsuarioLinguagem
            where U.id_Usuario=$id
        ");

        if ($sql->rowCount()>=1) {
            $indice = 0;

            foreach ($sql as $row) {
                $idCampo = $row[0];
                $idLinguagemCampo = $row[1];
                $idUsuarioCampo = $row[2];
                $usuarioCampo = $row[3];
                $nomeCampo = $row[4];
                $statusCampo = $row[5];
                $obsCampo = $row[6];

                
                $array[$indice] = "
                <tr onmousedown='Selecionar(id)' id='$idCampo' class=''>
                    <th scope='row'>$idCampo</th>
                    <td>$nomeCampo</td>
                    <td>$idLinguagemCampo</td>
                    <td>$statusCampo</td>
                    <td>$obsCampo</td>
                    <td class=''>
                        <button class='btn btn-sm btn-secondary' onclick='Alterar()'>Alterar</button>
                        <button class='btn btn-sm btn-danger' onclick='Excluir()'>X</button>
                    </td>
                </tr>
                ";
                
                $indice = $indice + 1;
            }
            $msg = 'Busca realizada com sucesso!';
        }
        else
        {
            $msg = "Sem Resultados para a busca";
        }

    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
    }
?>

