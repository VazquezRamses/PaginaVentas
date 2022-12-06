<?php
	require "header.php";
	require "Funciones/coneccion.php";
	
	$con = conecta();
	$id = $_REQUEST['id'];
	
	$sql = "SELECT * FROM administradores WHERE id = $id";
	
	$res = $con->query($sql);
	$row = $res->fetch_assoc();
			
	$nombre = $row['nombre'];
	$apellidos = $row['apellidos'];
	$correo = $row['correo'];
	$rol = $row['rol'];
?>


<html>
	<head>
		<title>EDITAR Administrador</title>
		<link rel="stylesheet"  href="Tabla.css">
		<script src="JS/jquery-3.3.1.min.js" type="text/javascript"></script>   
		<script>
		
			function setRol() {
				$('#rol').val(<?php echo $rol ?>);
			}
			
			function validaDatos() {
				<!-- Inicializamos las variables -->
				var Nombre = $('#nombre').val();
				var Apellido = $('#apellidos').val();
				var Email = $('#correo').val();
				var Rol = $('#rol').val();
				
				if(Nombre == null || Nombre.length == 0 || /^\s+$/.test(Nombre) 
							|| Email == null || Email.length == 7 || Apellido == null || Apellido.length == 0 || /^\s+$/.test(Apellido) 
							 || Rol == 0 )
						{
							$('#mensaje3').html('[ERROR] Faltan Campos por llenar!!!');
							setTimeout("$('#mensaje3').html('');", 3000);
							return false;
						}
				document.forma01.submit();
			}
			
			
			function validaMail() {
				var CorreoActual = "<?php echo $correo ?>";
				var Correo = $('#correo').val();
				if(Correo != CorreoActual)
				{
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
			}
				
			function limpiarCampo() {
				$('#mensaje1').html('');
			}
			
			
		</script>
		
		<style>
			
		</style>
	</head>
		
	<body onload="setRol()">
	
		<div class="Titulo2"> <h4> EDITAR ADMINISTRADOR </h4> </div>
		<div class="main_div2">
			<form name="forma01" action="administradores_salva.php" method= "POST" enctype="multipart/form-data">
				<input class="in" type="text" name="nombre" id="nombre" value="<?php echo $nombre?>" placeholder="Escribe tu nombre"><br> 
				<input class="in" type="text" name="apellidos" id="apellidos" value="<?php echo $apellidos?>" placeholder="Escribe tus apellidos"><br>
				<input class="in" type="text" name="correo" id="correo" value="<?php echo $correo?>" placeholder="Escribe tu correo" onBlur="validaMail();">
				<div class="error" id="mensaje2"> </div><br>
					<input class="in" type="password" name="pass" id="pass" placeholder="Escribe tu password">
					<div class="error" id="mensaje4"> *Escribe para CAMBIAR la contraseña</div><br>
				<select class="in" name="rol" id="rol" onChange="valorRol();">
					<option value="0"> Selecciona </option>
					<option value="1"> Gerente </option>
					<option value="2"> Ejecutivo </option>
				</select> <br>
				<input type="file" id="archivo" name="archivo" accept="image/*"><br>
				<input class="in" type="hidden" name="usuarioID" id="usuarioID" value="<?php echo $id ?>"><br>
				<input type="submit" name="Salvar" value="Salvar" onClick="validaDatos(); return false;"><br>
				<div class="error" id="mensaje3"> </div><br>
				
			</form>	
		</div>
		<a href="administradores_lista.php"><img src = "./Imagenes/Regresar.png" width = "150" height = "75" 
				alt = "Regresar al listado de administradores"/></a>
	</body>
	
</html>