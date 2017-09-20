<?php
	session_start();
	$_SESSION['iniciado'] = 0; 
	session_unset();  
	session_destroy();
	
	header('Location: ../lab/index.php');


?>