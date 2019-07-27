<?php
    require('data_access.php');

    $query = "INSERT INTO usuarios (Email, NombreC, Password, FechaNac) VALUES " .
             "('luis@agenda.com', 'Luis Lopez Lopez', '" . password_hash("12345", PASSWORD_DEFAULT) . "', '1998-12-25'), " . 
             "('pedro@agenda.com', 'Pedro Garcia Garcia', '" . password_hash("12345", PASSWORD_DEFAULT) . "', '2001-04-11'), " .
             "('juan@agenda.com', 'Juan Martinez Martinez', '" . password_hash("12345", PASSWORD_DEFAULT) . "', '1988-09-04')";

    $oAgenda = new dataAccess();

    if(($resul = $oAgenda->updateData($query, "ingresar")) === "OK"){
        echo "<b>LOS USUARIOS FUERON REGISTRADOS SATISFACTORIAMENTE</b>";
    }
    else {
        echo "<b>" . $resul . "</b>";
    }
 ?>
