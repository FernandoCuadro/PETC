<?php
date_default_timezone_set("America/Montevideo");

    class modeloCalendario{

        private $conexion;
        private $calendario;

        // Iniciamos las variables
        public function __construct(){

            $this->conexion = projectoinovacion::conexion();
            $this->calendario = array();
        }


     
        public function obtenerEventos(){
          
            //Se define la consulta a ejecutar
            /*Se busca que se muestren las distintas áreas
            que estén activas, para luego poder filtrar la 
            información mostrada a partir de ellas*/
            $sqleventos = "SELECT * FROM eventoscalendar";

            /*Se envia la consulta a la base de datos y se obtiene la información
            de todas las áreas que estén activas*/
            $sqlResultadoeventos = $this->conexion->query($sqleventos);

            /*Generamos un array con el resultado obtenido
            de la consulta realizada a la base de datos*/
            while($filas=$sqlResultadoeventos->fetch_assoc()){
            $this->calendario[]=$filas;
            }

            // Liberamos la variable
            return $this->calendario;

        }

        public function agregarEvento($evento, $f_inicio, $fecha_inicio, $f_fin, $seteando_f_final, $fecha_fin1, $fecha_fin, $color_evento){
   
            $InsertNuevoEvento = "INSERT INTO eventoscalendar(
                evento,
                fecha_inicio,
                fecha_fin,
                color_evento
                )
              VALUES (
                '" .$evento. "',
                '". $fecha_inicio."',
                '" .$fecha_fin. "',
                '" .$color_evento. "'
            )";
          $resultadoNuevoEvento = $this->conexion->query($InsertNuevoEvento);
          $fecha_actual = date("Y-m-d H:i:s");
          $ci = $_SESSION['ci'];
          $nombreusuario = $_SESSION['usuario'];
          $consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a agregado un evento: $evento', '$fecha_actual')";
          $sqlauditoria = $this->conexion->query($consauditoria);   
          echo"<script language='javascript'>window.location='calendario.php?e=1'</script>";
          //header("Location:calendario.php?e=1");


        }

        public function editarEvento($idEvento, $evento, $f_inicio, $fecha_inicio, $f_fin, $seteando_f_final, $fecha_fin1, $fecha_fin, $color_evento){

            $UpdateProd = ("UPDATE eventoscalendar 
            SET evento ='$evento',
                fecha_inicio ='$fecha_inicio',
                fecha_fin ='$fecha_fin',
                color_evento ='$color_evento'
            WHERE id='".$idEvento."' ");
        $result = $this->conexion->query($UpdateProd);
        $fecha_actual = date("Y-m-d H:i:s");
        $ci = $_SESSION['ci'];
        $nombreusuario = $_SESSION['usuario'];
        $consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a editado un evento: $evento', '$fecha_actual')";
        $sqlauditoria = $this->conexion->query($consauditoria);   
          echo"<script language='javascript'>window.location='calendario.php?ea=1'</script>";
          //header("Location:calendario.php?e=1");


        }

    }

    ?>