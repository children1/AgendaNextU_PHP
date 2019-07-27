<?php
    session_start();
    require('data_access.php');

    if(isset($_SESSION['email'])){
        $response['msg'] = "OK";
    }
    else {
        $oAgenda = new dataAccess();


        $query = "SELECT Password FROM usuarios WHERE Email = '" . $_POST['username'] . "'";
        $resul = $oAgenda->selectData($query, $data);

        if($resul === "OK"){
//            echo json_encode($response);
    
            if($data->num_rows > 0){
                $response['msg'] = $resul;

                $register = $data->fetch_assoc();
                if(password_verify($_POST['password'], $register['Password'])){
                    $response['msg'] = "OK";
                    $_SESSION['email'] = $_POST['username'];
                }
                else{
                    $response['msg'] = "Contraseña incorrecta";   
                }
                
            }
            else{
                $response['msg'] = "Correo electrónico incorrecto";
            }
            
        }
        else{
            $response['msg'] = "No pudo iniciarse la sesión";
        }
        
    }

    echo json_encode($response);
 
?>
