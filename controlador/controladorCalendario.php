<?php

	error_reporting(0);
	require_once("modelo/modeloCalendario.php");
  /*  $areaMenu = new modeloCalendario();
	$areaMenu2 = new modeloCalendario();
 */   
    $eventos = new modeloCalendario();
    $agregarevento = new modeloCalendario();
    $editarevento = new modeloCalendario();
    $mover = new modeloCalendario();
 


   /* $datosAreasMenu = $areaMenu->obtenerAreasMenu();
	$datosAreasMenu2 = $areaMenu2->obtenerAreasMenu();
   */ 
    $datoseventos = $eventos->obtenerEventos();
    require_once("vista/vistaCalendario.php");

   

    if(isset($_POST['agregar'])){   
        $agregar = $agregarevento->agregarEvento(
            
            $evento            = ucwords($_REQUEST['evento']),
            $f_inicio          = $_REQUEST['fecha_inicio'],
            $fecha_inicio      = date('Y-m-d\TH:i', strtotime($f_inicio)),            
            $f_fin             = $_REQUEST['fecha_fin'],
            $seteando_f_final  = date('Y-m-d\TH:i', strtotime($f_fin)),
            $fecha_fin1        = strtotime($seteando_f_final),
            $fecha_fin         = date('Y-m-d\TH:i', ($fecha_fin1)),
            $color_evento      = $_REQUEST['color_evento']

);
    }

    if(isset($_POST['editar'])){    
        $editar = $editarevento->editarEvento(
            $idEvento         = $_POST['idEvento'],

            $evento            = ucwords($_REQUEST['evento']),
            $f_inicio          = $_REQUEST['fecha_inicio'],
            $fecha_inicio      = date('Y-m-d\TH:i', strtotime($f_inicio)),

            $f_fin             = $_REQUEST['fecha_fin'],
            $seteando_f_final  = date('Y-m-d\TH:i', strtotime($f_fin)),
            $fecha_fin1        = strtotime($seteando_f_final),
            $fecha_fin         = date('Y-m-d\TH:i', ($fecha_fin1)),
            $color_evento      = $_REQUEST['color_evento']

    );
}
?>