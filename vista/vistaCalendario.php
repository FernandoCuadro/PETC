<!DOCTYPE html>
<html lang="spanish">
<head>
	
  <!--Meta tags-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; utf-8">

  <meta name="description" content="Conocé todas las fechas importantes con respecto al PETC. Enterate de exámenes, feriados y más.">

  <meta name="keywords" content="informática,diseño,construcción,bachillerato,novedades,noticias,polo,educativo,tecnológico,cerro,información,montevideo,utu,petc,tecnicatura,logística,steel,framing,wood,framing,prevencionista,técnico,terciario,ingeniero,EMT,tecnólogo,bachiller,utu cerro,cursos,universidad de trabajo">

  <meta name="DateCreated" content="Tue, 28 June 2022 17:00:00 GMT-3">
  <meta name="Revisit-after" content="7 days">
  <meta name="robots" content="all">
	
  <!-- Calendario -->
  <link rel="stylesheet" href="">
	<link rel="stylesheet" type="text/css" href="css/fullcalendar.min2.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/home2.css">

  <!--Link a icono y hojas de estilo-->
  <link rel="icon" type="image/jpg" href="img/Logo.png"/>
  <link rel="stylesheet" type="text/css" href="css/styleCalendario7.css">
  <link rel="stylesheet" type="text/css" href="fontawesome-free-6.0.0-web/css/all.css">

	<!-- Fuente usada para la descripcion -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300&display=swap" rel="stylesheet">  

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  
	<title>Calendario</title>
</head>
<body>
	<a href="javascript:void(0);" id="scroll" title="Volver arriba">Top<span></span></a>

	<div id="contenedor-carga">
  			
		<div class="spinner"></div>
			
  	</div>
	<header>
    <img id="img-header" src="img/banner.png">

	<?php   
        session_start();
        if(empty($_SESSION['usuario'])){       			
    ?>
	<?php
        }elseif($_SESSION['perfil'] == 'administrador'){
    ?> 
		<div id="contenedor-sesion">
		<p><i class="fa-solid fa-user"></i><a href="logout.php" class="btn-cerrar-sesion">Cerrar sesión</a> | <a href="admin.php" id="modo-admin">Administrador</a></p>
		</div>
	<?php
		}elseif($_SESSION['perfil'] == 'moderador'){
	?>
		<div id="contenedor-sesion">	
	    <p><i class="fa-solid fa-user"></i><a href="logout.php" class="btn-cerrar-sesion">Cerrar sesión</a> | <span id="modo-editor">Moderador</span></p>
		</div>
	<?php } ?>
		<div id="logo-normal-size">
	    	<h1><a href="index.php"><img src="img/Logo.png"></a></h1>
	    </div>

	    <!-- Empieza menu responsive -->
	    <nav>

	    	<div id="logo-responsive">
	    		<h1><a href="index.php"><img src="img/Logo.png"></a></h1>
	    	</div>

	    	<div id="contenedor-burger-menu">
	    		<div id="burger-menu">
		    		<div id="bar1"></div>
		    		<div id="bar2"></div>
		    		<div id="bar3"></div>
	    		</div>
	    	</div>

		    <div id="menu-responsive">
		        <ul>
		            <li><a href="index.php"><i class="fa-solid fa-house"></i>Home</a></li>
		            <li><a href="nosotros.php"><i class="fa-solid fa-users"></i>Nosotros</a></li>
		            <li><a href="cursos.php"><i class="fa-solid fa-chalkboard"></i>Cursos</a></li>
		            <li><a href="noticias.php"><span><i class="fa-solid fa-newspaper"></i>Novedades</span></a></li>     
		            <li><a href="calendario.php"><i class="fa-solid fa-calendar-days"></i>Calendario</a></li>
		            <li><a href="unidad-de-extension.php"><i class="fa-solid fa-arrow-trend-up"></i>Unidad de extensión</a></li>
		            <li><a href="contacto.php"><i class="fa-solid fa-phone"></i>Contacto</a></li>
		        </ul>
		    </div>
		    <!-- Termina el menu responsive -->

		    <!-- Empieza menu normal -->
		    <div id="menu-normal-size">
		    	<ul>
		            <li><a href="index.php"><i class="fa-solid fa-house"></i>Home</a></li>
		            <li><a href="nosotros.php"><i class="fa-solid fa-users"></i>Nosotros</a></li>
		            <li><a href="cursos.php"><i class="fa-solid fa-chalkboard"></i>Cursos</a></li>
		            <li><a href="noticias.php"><span><i class="fa-solid fa-newspaper"></i>Novedades</span></a></li>     
		            <li><a href="calendario.php"><i class="fa-solid fa-calendar-days"></i>Calendario</a></li>
		            <li><a href="unidad-de-extension.php"><i class="fa-solid fa-arrow-trend-up"></i>Unidad de extensión</a></li>
		            <li><a href="contacto.php"><i class="fa-solid fa-phone"></i>Contacto</a></li>
		        </ul>
		    </div>
		</nav>
	    <!-- Termina menu -->
  	</header>
  	
  	<!-- Empieza contenido de la pagina -->
  	<main>
	  <?php
			  if($_SESSION['perfil'] == 'administrador' || $_SESSION['perfil'] == 'moderador'){ 
					?>
		<article>
	<!-- mensajes -->
          <div class="mt-5"></div>
            <div class="container">
                <div class="row">
                    <div class="col msjs">
                    <?php
                    if(isset($_REQUEST['e'])){ ?>
<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
  <strong>Felicitaciones!</strong> El evento fue registrado correctamente.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>

<?php
if(isset($_REQUEST['ea'])){ ?>
<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
  <strong>Felicitaciones!</strong> El evento fue actualizado correctamente.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>

<div class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="display: none;">
  <strong>Felicitaciones!</strong> El evento fue borrado correctamente.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
                    </div>
                </div> 
            </div>    


<div id="calendar"></div>


<?php  
  include('modalNuevoEvento.php');
  include('modalUpdateEvento.php');
?>



<script src ="js/jquery-3.0.0.min.js"> </script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/moment.min.js"></script>	
<script type="text/javascript" src="js/fullcalendar.min.js"></script>


<script src='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/locale/es.js'></script>

<script type="text/javascript">
$(document).ready(function() {
  $("#calendar").fullCalendar({
    header: {
      left: "prev,next today",
      center: "title",
      right: "month,agendaWeek,agendaDay"
    },

    locale: 'es',

    defaultView: "month",
    navLinks: true, 
    editable: true,
    eventLimit: true, 
    selectable: true,
    selectHelper: false,

//Nuevo Evento
select: function(start, end){
      $("#exampleModal").modal();
      $("input[name=fecha_inicio]").val(start.format('DD-MM-YYYY HH:mm'));
       
      var valorFechaFin = end.format("DD-MM-YYYY HH:mm");
      var F_final = moment(valorFechaFin, "DD-MM-YYYY HH:mm").subtract(1, 'days').format('DD-MM-YYYY'); //Le resto 1 dia
      $('input[name=fecha_fin').val(F_final);  

    },
      
    events: [
      <?php
       foreach($datoseventos as $dataEvento){ ?>
          {
          _id: '<?php echo $dataEvento['id']; ?>',
          title: '<?php echo $dataEvento['evento']; ?>',
          start: '<?php echo $dataEvento['fecha_inicio']; ?>',
          end:   '<?php echo $dataEvento['fecha_fin']; ?>',
          color: '<?php echo $dataEvento['color_evento']; ?>'
          },
        <?php } ?>
    ],

//Eliminar Evento
eventRender: function(event, element) {
    element
      .find(".fc-content")
      .prepend("<span id='btnCerrar'; class='closeon material-icons'>&#xe5cd;</span>");
    
       //Eliminar evento
       element.find(".closeon").on("click", function() {

var pregunta = confirm("Deseas Borrar este Evento?");   
if (pregunta) {

  $("#calendar").fullCalendar("removeEvents", event._id);

   $.ajax({
          type: "POST",
          url: 'vista/deleteEvento.php',
          data: {id:event._id},
          success: function(datos)
          {
            $(".alert-danger").show();

            setTimeout(function () {
              $(".alert-danger").slideUp(500);
            }, 3000); 

          }
      });
    }
  });
},



//Moviendo Evento Drag - Drop
eventDrop: function (event, delta) {
  var idEvento = event._id;
  var start = (event.start.format('DD-MM-YYYY HH:mm'));
  var end = (event.end.format("DD-MM-YYYY HH:mm"));

    $.ajax({
        url: 'drag_drop_evento.php',
        data: 'start=' + start + '&end=' + end + '&idEvento=' + idEvento,
        type: "POST",
        success: function (response) {
         // $("#respuesta").html(response);
        }
    });
},

//Modificar Evento del Calendario 
eventClick:function(event){
    var idEvento = event._id;
    $('input[name=idEvento').val(idEvento);
    $('input[name=evento').val(event.title);
    $('input[name=fecha_inicio').val(event.start.format('DD-MM-YYYY HH:mm'));
    $('input[name=fecha_fin').val(event.end.format("DD-MM-YYYY HH:mm"));

    $("#modalUpdateEvento").modal();
  },


  });


//Oculta mensajes de Notificacion
  setTimeout(function () {
    $(".alert").slideUp(300);
  }, 3000); 


});

</script>

        <?php
          }elseif(empty($_SESSION['usuario'])){ 
            ?>   

<article>
	<!-- mensajes -->
          <div class="mt-5"></div>
            <div class="container">
                <div class="row">
                    <div class="col msjs">
                    <?php
                    if(isset($_REQUEST['e'])){ ?>
<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
  <strong>Felicitaciones!</strong> El evento fue registrado correctamente.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>

<?php
if(isset($_REQUEST['ea'])){ ?>
<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
  <strong>Felicitaciones!</strong> El evento fue actualizado correctamente.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>

<div class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="display: none;">
  <strong>Felicitaciones!</strong> El evento fue borrado correctamente.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
                    </div>
                </div> 
            </div>    
            
<div id="calendar"></div>





<script src ="js/jquery-3.0.0.min.js"> </script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/moment.min.js"></script>	
<script type="text/javascript" src="js/fullcalendar.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/locale/es.js'></script>


<script type="text/javascript">
$(document).ready(function() {
  $("#calendar").fullCalendar({
    header: {
      left: "prev,next today",
      center: "title",
      right: "month,agendaWeek,agendaDay"
    },

    locale: 'es',

    defaultView: "month",
    


      
    events: [
      <?php
       foreach($datoseventos as $dataEvento){ ?>
          {
          _id: '<?php echo $dataEvento['id']; ?>',
          title: '<?php echo $dataEvento['evento']; ?>',
          start: '<?php echo $dataEvento['fecha_inicio']; ?>',
          end:   '<?php echo $dataEvento['fecha_fin']; ?>',
          color: '<?php echo $dataEvento['color_evento']; ?>'
          },
        <?php } ?>
    ],








  });


//Oculta mensajes de Notificacion
  setTimeout(function () {
    $(".alert").slideUp(300);
  }, 3000); 


});

</script>
<?php } ?>
</article>

  		<aside>
        <div class="share">
        <i class="fa fa-plus"></i>
      </div>
        <div class="one">
          <a href="https://www.facebook.com/Polo-Educativo-Tecnol%C3%B3gico-Cerro-2488348534525108/" target="__blank"><i class="fa-brands fa-facebook-f"></i></a>
      </div>

        <div class="two">
          <a href="https://instagram.com/educativopolo" target="__blank"><i class="fa-brands fa-instagram"></i></a>
        </div>

        <div class="three">
          <a href="https://www.youtube.com/user/arqlopezviana/videos" target="__blank"><i class="fa-brands fa-youtube"></i></a>
        </div>
      </aside>
  	</main>

  	<footer>
      <section>
        <div>
          <p>E-mail: <a href="https://www.gmail.com" target="__blank">poloeducativocerro@gmail.com</a></p>
          <p>© 2022 Polo Educativo Tecnológico Cerro, todos los derechos reservados.</p>
        </div>
      </section>

      <section>
        <div id="contenedor-creditos">
          <p>Diseño y desarrollo por <a href="#">2FAR™</a></p>
        </div>
      </section>
    </footer>

  	<script src="js/loaderScreen.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/irArriba.js"></script>
    <script src="js/redesSociales.js"></script>

</body>
</html>