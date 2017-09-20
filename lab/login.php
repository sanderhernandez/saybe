<?php  
 	session_start();	
	$_SESSION['nombreUsuario'] = "usuariox";
	$_SESSION["iniciado"] = 0; 
?>

<!DOCTYPE html>
<html>

<head>
	<title>Acceso </title>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">  
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">  

</head>
<body>
	<div style="margin-top: 70px;"></div>
	 <div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
				<div class="container-fluid">
					<div class="row">
						<div class="panel panel-default ">
							<div class="panel-heading">
								<center>
								<img src="../imagenes/saybelogo.png">
								</center>
							</div>
							<div class="panel-body">
								<center>
								<h3 style="font-family:'Roboto Light';">Inicio de sesión</h3><br>
								</center>
								<form action="../usuario/iniciar_sesion.php" method="POST" >
								  <div class="form-group">
								    <div class="input-group">
									  <span class="input-group-addon" id="basic-addon1"> 
									  <i class="fa fa-user" aria-hidden="true"></i></span>
									  <input type="text" class="form-control input-text-box" placeholder="Tu nombre de usuario" aria-describedby="basic-addon1" id="txtUsuario" name="user">
									</div>
								  </div>
								   <div class="form-group">
								    <div class="input-group">
									  <span class="input-group-addon" id="basic-addon2">
									  <i class="fa fa-eye-slash" aria-hidden="true"></i></span>
									  <input type="password" class="form-control input-text-box" placeholder="Tu contraseña" aria-describedby="basic-addon2" id="txtContrasena" name="contra">
									</div>
								  </div>  
								  <div class="form-group "> 
								  		<center>
								  		<div>
								  			<button type="submit" class="btn btn-success" >Acceder</button>
								  		</div>
								  		</center>
								  </div>								  
								</form> 
								<center> 
								<!-- <hr>
								<ul class="list-inline">
									<li><a href="#">Recuperar contraseña</a></li> 
								</ul> -->
							</div>
							</center>
						</div> 
					</div> <!-- fin de caja de login --> 
				</div>
			</div>
		</div> 

		<script src="../js/jquery.js"></script>
		<script type="text/javascript">

			function autenticar(user, password){ 
				// var parametros = "user="+user+"&contra="+password;
				// $.ajax({
				// 	url: "../usuario/validar_usuario.php",
			 //        data: parametros,
			 //        method:"GET",
			 //        success:function(respuesta){
			        	
			 //        	window.location.assign("http://localhost/saybe/lab/");
			 //        },
			 //        error:function(){
			 //        	alert(respuesta);
			 //        }
				// });
			}

		</script>

</body>


</html>

