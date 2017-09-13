<?php
  header( 'Content-Type: text/html;charset=utf-8' );

  $GLOBALS['localhost'] = "localhost";
  $GLOBALS['usuario_db'] = "root";
  $GLOBALS['contrasena_db'] = "";
  $GLOBALS['base_datos'] = "db_saybe";

  function ejecutarSQLCommand($commando){
    $mysqli = new mysqli($GLOBALS['localhost'], $GLOBALS['usuario_db'], $GLOBALS['contrasena_db'], $GLOBALS['base_datos']);

    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    if ( $mysqli->multi_query($commando)) {
         if ($resultset = $mysqli->store_result()) {
        	while ($row = $resultset->fetch_array(MYSQLI_BOTH)) {

        	}
        	$resultset->free();
         }
    }
    $mysqli->close();
  }

  function getSQLResultSet($commando){

    $mysqli = new mysqli($GLOBALS['localhost'], $GLOBALS['usuario_db'], $GLOBALS['contrasena_db'], $GLOBALS['base_datos']);
    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    if ( $mysqli->multi_query($commando)) {
    	return $mysqli->store_result();
    }

    $mysqli->close();
  }
?>
