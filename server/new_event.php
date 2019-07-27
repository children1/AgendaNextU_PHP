<?php
    session_start();
    require('data_access.php');

    if(isset($_SESSION["email"])){
        $query = "INSERT INTO Eventos (Titulo, FechaIni, FechaFin, HoraIni, HoraFin, AllDay, Usuario) VALUES (" .
                 "'" . $_POST['titulo'] . "', '" . $_POST['start_date'] . "', '" . $_POST['end_date'] . "', '" .
                 $_POST['start_hour'] . "', '" .  $_POST['end_hour'] . "', " . $_POST['allDay'] . ", '" .
                 $_SESSION['email'] . "')";

        $oAgenda =  new dataAccess();
        $response['msg'] = $oAgenda->updateData($query, "ingresar");

        echo json_encode($response);
    }
    else {
        echo "No se ha inciado sesión... redireccionando a la pagina de registro";
        header("Location: ../client/index.html");
    }   
?>
