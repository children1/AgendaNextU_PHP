<?php
    session_start();
    require('data_access.php');

    if(isset($_SESSION["email"])){
        $query = "DELETE FROM Eventos WHERE id = " . $_POST['id'];

        $oAgenda =  new dataAccess();
        $response['msg'] = $oAgenda->updateData($query, "eliminar");

        echo json_encode($response);
    }
    else {
        echo "No se ha inciado sesión... redireccionando a la pagina de registro";
        header("Location: ../client/index.html");
    }
 ?>
