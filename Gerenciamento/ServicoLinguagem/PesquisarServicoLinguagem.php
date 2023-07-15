<?php
    include_once('../../Conexão/conexao.php');

    if(!$_POST)
    {
        header('Location:TelaServicoLinguagem.php');
    }

    if(empty($_POST['txtIdServico']))
    {
        $msg = "Informe um Id";
        return;
    }
    
    $id = $_POST['txtIdServico'];

    try {
        $sql = $conn->query("
            select SL.id_ServicoLinguagem, L.id_Linguagem, S.id_Servico, S.nome_Servico, L.nome_Linguagem, SL.status_ServicoLinguagem, SL.obs_ServicoLinguagem
            from ServicoLinguagem as SL
            inner join Linguagem as L on L.id_Linguagem = SL.id_Linguagem_ServicoLinguagem
            inner join Servico as S on S.id_Servico = SL.id_Servico_ServicoLinguagem
            where S.id_Servico=$id
        ");

        if ($sql->rowCount()>=1) {
            $indice = 0;

            foreach ($sql as $row) {
                $idCampo = $row[0];
                $idLinguagemCampo = $row[1];
                $idServicoCampo = $row[2];
                $servicoCampo = $row[3];
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

