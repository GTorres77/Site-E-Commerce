<?php

require_once('../conn/connect.php'); 

$data = array();

if ((isset($_POST["Tipo_Registo"])) && ($_POST["Tipo_Registo"] != '')) {

    $Tipo_Registo = $_POST["Tipo_Registo"];

    if (($Tipo_Registo === "1") && (isset($_POST["id_linha"]))) {
        $id_carrinho = $_POST["id_linha"];
        if (is_numeric($id_carrinho)) {
            $Apagar = mysqli_query($conn, "DELETE FROM carrinho "
                    . "WHERE ((id_carrinho = '$id_carrinho') AND (id_user = '" . $_SESSION['id_user'] . "'))");
            if ($Apagar) {
                $data['tipo'] = "1";
                $data['msg'] = 'Artigo removido';
            } else {
                $data['tipo'] = "0";
                $data['msg'] = 'Erro ao eliminar';
            }
        } else {
            $data['tipo'] = "0";
            $data['msg'] = 'Id inválido';
        }
    } else { 
        $data['tipo'] = "0";
        $data['msg'] = 'Erro. ' . $Tipo_Registo;
    }
} else {
    header("Location: ../index.php");
}

mysqli_close($conn);
echo json_encode($data);
