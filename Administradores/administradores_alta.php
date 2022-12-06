<?php
	require "header.php";
?>
<html>
	<head>
		<title>Ingresar Nuevo Administrador</title>
		<link rel="stylesheet"  href="Tabla.css">
		<script src="JS/jquery-3.3.1.min.js" type="text/javascript"></script>   
		<script>
			
			function validaDatos() {
				<!-- Inicializamos las variables -->
				var Nombre = $('#nombre').val();
				var Apellido = $('#apellidos').val();
				var Email = $('#correo').val();
				var Password = $('#pass').val();
				var Rol = $('#rol').val();
				var Archivo = $('#archivo').val();
				
				
				if(Nombre == null || Nombre.length == 0 || /^\s+$/.test(Nombre) 
							|| Email == null || Email.length == 7 || Apellido == null || Apellido.length == 0 || /^\s+$/.test(Apellido) 
							|| Password.length == 0 || Rol == 0 || Archivo.length == 0)
						{
							$('#mensaje3').html('[ERROR] Faltan Campos por llenar!!!');
							setTimeout("$('#mensaje3').html('');", 3000);
							return false;
						}
				document.forma01.submit();
			}
			
			
			function validaMail() {
				var Correo = $('#correo').val();
				$.ajax({
							url		: 'valida_correo.php?correo='+Correo,
							type	: 'post',
							dataType: 'text',
							success	: function(res) {
									if(res == 1) {
										
										$('#mensaje2').html('El correo '+Correo+' ya existe D:');
										$('#correo').val('');
										setTimeout("$('#mensaje2').html('');", 3000);
										limpiarCampo();
									} 
								},
							error	: function() {
									alert('[ERROR] Archivo no encontrado...');
								}
						});
				}	
			
			function limpiarCampo() {
				$('#mensaje1').html('');
			}
			
			
			//onClick
			//onChange
			//onBlur
			//onChange
			
		</script>
		
		<style>
			.error {
				display: inline;
				color: #FF0000;
			}
		</style>
	</head>
		
	<body>
		<div class="Titulo2"> <h4>ALTA DE ADMINISTRADORES </h4> </div>
		<div class="main_div2">
			<form name="forma01" action="administradores_salva.php" method= "POST" enctype="multipart/form-data">		
				<input class="in" type="text" name="nombre" id="nombre" placeholder="Escribe tu nombre"><br> 
				<input class="in" type="text" name="apellidos" id="apellidos" placeholder="Escribe tus apellidos"><br>
				<input class="in" type="text" name="correo" id="correo" placeholder="Escribe tu correo" onBlur="validaMail();">
				<div class="error" id="mensaje2"> </div><br>
				<input class="in" type="password" name="pass" id="pass" placeholder="Escribe tu password"><br>
				<select class="in" name="rol" id="rol" onChange="valorRol();">
					<option value="0"> Selecciona </option>
					<option value="1"> Gerente </option>
					<option value="2"> Ejecutivo </option>
				</select> <br>
				<input type="file" id="archivo" name="archivo" accept="image/*"><br>
				<input class="in" type="hidden" name="usuarioID" id="usuarioID" value="0"><br>
				<input type="submit" name="Salvar" value="Salvar" onClick="validaDatos(); return false;"><br>
				<div class="error" id="mensaje3"> </div><br>
				
			</form>	
		</div>
		<a href="administradores_lista.php"><img src = "./Imagenes/Regresar.png" width = "150" height = "75" 
				alt = "Regresar al listado de administradores"/></a>
	</body>
	
</html>