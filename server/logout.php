<?php
    session_start();

    if(isset($_SESSION['email'])){
        session_destroy();
        $response['msg'] = 'Sesión cerrada correctamente';
        header("Location: ../client/index.html");        
    }
    else {
        echo "No se ha inciado sesión... redireccionando a la pagina de registro";
        header("Location: ../client/index.html");
    }

    echo json_encode($response);
 ?>
