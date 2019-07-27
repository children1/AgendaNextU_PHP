<?php
    class dataAccess{
        private $DB_Server = 'localhost';
        private $DB_UserName = 'root';
        private $DB_Password = '';
        private $DB_Name = 'Agenda';
        private $conexion;

        private function OpenConnection(){
            $resul = "";

            $this->conexion = new mysqli($this->DB_Server, $this->DB_UserName, $this->DB_Password, $this->DB_Name);
            if(!$this->conexion->connect_error){
                $resul = "OK";
            }
            else{
                $resul = "Error al realizar la conexion con el servidor MySQL, verifique los parámetros de conexión";
            }

            return $resul;
        }

        private function CloseConnection(){
            if($this->conexion)
                $this->conexion->close();
        }

        public function updateData($query, $oper){
            $resul = "";

            if(($resul = $this->OpenConnection()) === 'OK'){
                if($this->conexion->query($query) === TRUE){
                    $resul = "OK";
                }
                else {
                    $resul = "Error al " . $oper . " el registro en la base de datos";
                }

                $this->CloseConnection();
            }

            return $resul;
        }

        public function selectData($query, &$data){
            $resul = "";

            if(($resul = $this->OpenConnection()) === 'OK'){
                $data = $this->conexion->query($query);
                if(!$data){//mysqli_connect_errno()){
                    $resul = "Error al realizar la consulta a la base de datos";
                }
                else {
                    $resul = "OK";
                }

                $this->CloseConnection();
            }

            return $resul;
        }
    }
?>
