<?php

	session_start();
	
	session_unset();
	session_destroy();
//	echo "<script>alert('Cerrando session');</script>";
	header('location:index.php');

?>