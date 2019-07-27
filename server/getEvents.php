<?php
    session_start();
    require('data_access.php');

    if(isset($_SESSION['email'])){
        $query = "SELECT * FROM Eventos WHERE Usuario = '" . $_SESSION['email'] . "'";

        $oAgenda = new dataAccess();
        $resul = $oAgenda->selectData($query, $data);

        if($resul === "OK"){
            if($data->num_rows > 0){
                $i = 0;
                while($fila = $data->fetch_assoc()){
                    $response['eventos'][$i]['id'] = $fila['id'];
                    $response['eventos'][$i]['title'] = $fila['Titulo'];
                    if ($fila['AllDay'] == 0){
                        $allDay = false;
                        $response['eventos'][$i]['start'] = $fila['FechaIni'].'T'. $fila['HoraIni'];
                        $response['eventos'][$i]['end'] = $fila['FechaFin'].'T'.$fila['HoraFin'];
                    }else{
                        $allDay= true;
                        $response['eventos'][$i]['start'] = $fila['FechaIni'];
                        $response['eventos'][$i]['end'] = "";
                    }
                
                    $response['eventos'][$i]['allDay'] = $allDay;
                    $i++;
                }
            }
            $response['msg'] = "OK";
        }
        else {
            $response['msg'] = $resul;
        }

        echo json_encode($response);
    }
    else {
        echo "No se ha inciado sesión... redireccionando a la pagina de registro";
        header("Location: ../client/index.html");
    }
?>
