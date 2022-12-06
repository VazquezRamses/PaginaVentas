<?php
	session_start(); 
	$id = $_SESSION['ID_adimn'];
	
	if(isset($id))
	{
		header("Location: administradores_inicio.php");
	}
	
?>

<html>
	<head>
		<title>Iniciar Sesion</title>
		<link rel="stylesheet"  href="Login.css">
		<script src="JS/jquery-3.3.1.min.js" type="text/javascript"></script>   
		<script>
			
			function validaDatos() {
				<!-- Inicializamos las variables -->
				
				var Email = $('#correo').val();
				var Password = $('#pass').val();
				
				if(Email == null || Email.length <= 10 || Password.length == 0 || Password == null)
						{
							$('#mensaje3').html('[ERROR] Faltan Campos por llenar!!!');
							setTimeout("$('#mensaje3').html('');", 3000);
							return false;
						}
				// document.forma01.submit();
				IniciarSesion();
			}
			
			
			function IniciarSesion() {
				var Correo = $('#correo').val();
				var Password = $('#pass').val();
				
					$.ajax({
							url		: 'Login_administradores.php?correo='+Correo+'&pass='+Password,
							type	: 'post',
							dataType: 'text',
							success	: function(res) {
								if(res == 1) {	
									 window.location.href="administradores_inicio.php";
								 }
								else
								{
									$('#mensaje3').html('Datos erroneos. Por favor, intentelo otra vez.');
									$('#correo').val('');
									$('#pass').val('');
									 
								}
								
							 },
							error: function() {
								 alert('[ERROR] Archivo no encontrado...');
							 }
						 });
				}	
			
			function limpiarCampo() {
				$('#mensaje3').html('');
			}
			
		</script>
		
		<style>
			.error {
				display: inline;
				color: #05F191; 
			}
		</style>
	</head>
		
	<body>
		<form name="forma01"  method= "POST" class="form_box">
			<h1 class="form_title"> Iniciar Sesion </h1>
			<input type="text" name="correo" id="correo" placeholder="Correo" Onclick="limpiarCampo();" >
			<input type="password" name="pass" id="pass" placeholder="Password" Onclick="limpiarCampo();">
			<input type="submit" name="Iniciar" value="Ingresar" onClick="validaDatos(); return false">
			<div class="error" id="mensaje3"> </div><br>
			
		</form>	
		
	</body>
	
</html>