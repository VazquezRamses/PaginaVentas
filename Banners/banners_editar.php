<?php
	require "../Administradores/header.php";
	require "../Administradores/Funciones/coneccion.php";  
	
	$con = conecta();
	$id = $_REQUEST['id'];
	
	$sql = "SELECT * FROM banners WHERE id = $id";
	
	$res = $con->query($sql);
	$row = $res->fetch_assoc();
			
	$id_banner = $row["ID"];
?>


<html>
	<head>
		<title>EDITAR BANNER</title>
		<link rel="stylesheet"  href="Tabla.css">
		<script src="JS/jquery-3.3.1.min.js" type="text/javascript"></script>   
		<script>
		
			function setRol() {
				
			}
			
			function validaDatos() {
				<!-- Inicializamos las variables -->
				var Archivo = $('#archivo').val();
						alert(Archivo);
				if(Archivo.length == 0)
						{
							$('#mensaje3').html('[ERROR] Faltan Campos por llenar!!!');
							setTimeout("$('#mensaje3').html('');", 3000);
							return false;
						}
								
				document.forma01.submit();		
			}
			
				
			function limpiarCampo() {
				$('#mensaje1').html('');
			}
			
			
		</script>
		
	</head>
		
	<body onload="setRol()">
	
		<div class="Titulo2"> <h4> EDITAR BANNER </h4> </div>
		<div class="main_div2">
			<form name="forma01" action="banners_salva.php" method= "POST" enctype="multipart/form-data">		
				<input type="file" id="archivo" name="archivo" accept="image/*"><br>
				<input class="in" type="hidden" name="bannerID" id="bannerID" value="<?php echo $id_banner ?>"><br>
				<input type="submit" name="Salvar" value="Salvar" onClick="validaDatos(); return false;"><br>
				<div class="error" id="mensaje3"> </div><br>
				
			</form>	
		</div>
		<a href="banners_lista.php"><img src = "./Imagenes/Regresar.png" width = "150" height = "75" 
				alt = "Regresar al listado de producto"/></a>
	</body>
	
</html>