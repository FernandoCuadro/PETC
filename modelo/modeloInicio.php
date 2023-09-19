<?php

    class modeloInicio{

        private $conexion;
        private $inicio;

        // Iniciamos las variables
        public function __construct(){

            $this->conexion = projectoinovacion::conexion();
            $this->inicio = array();
        }
        


        /*Función usada para mostrar todos las áreas en la
        parte del menu*/
       



        /*Funcion usada para mostrar todos los articulos de 
        apartado Inicio*/
        public function PrimerasNoticias(){

            // Se define la consulta a ejecutar
            /* Se busca que se muestren los articulos que su 
            estado esté en modo Activo*/
            $sqlConsulta1 = "SELECT id_not as id, 
            fecha_not as fecha, 
            titulo_not as titulo, 
            descripcion_not as descripcion, 
            min_not as miniatura 
            FROM noticias
            where estado = 'activo' and
            fecha_not <= now()
            order by fecha_not desc limit 4;";  

            /* Se envia la consulta a la base de datos y se obtiene la información
            de todos los articulos que existen hasta el momento
            en el apartado Inicio*/
            $sqlConsulta1 = $this->conexion->query($sqlConsulta1);

                /*Generamos un array con el resultado obtenido
                de la consulta realizada a la base de datos*/
                while($filas=$sqlConsulta1->fetch_assoc()){
                $this->inicio[]=$filas;
                }

                // Liberamos la variable
                return $this->inicio;
            }
        
            

            public function obtenerNiveles(){
                /*  session_start();
                 $id_come = $_SESSION['com'];
                */  
                    $sqlRespuestas = "SELECT idnivel as id, 
                    nivelnombre as nombre, 
                    nivelnumero as numero 
                    FROM niveles
                    order by nivelnumero asc;"; 
                    
                    $sqlRespuestasResultado = $this->conexion->query($sqlRespuestas);
              
                    while($filas=$sqlRespuestasResultado->fetch_assoc()){
                        $this->inicio[]=$filas;
                    }
              
                    return $this->inicio;
                }
              




    }

?>