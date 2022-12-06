<?php
	require "../Administradores/header.php";		
?>
<html>
	<head>
		<title>Ingresar Nuevo Producto</title>
		<link rel="stylesheet"  href="Tabla.css">
		<script src="JS/jquery-3.3.1.min.js" type="text/javascript"></script>   
		<script>
			
			function validaDatos() {
				<!-- Inicializamos las variables -->
				var Nombre = $('#nombre').val();
				var Codigo = $('#codigo').val();
				var Descripcion = $('#descripcion').val();
				var Costo = $('#costo').val();
				var Stock = $('#stock').val();
				var Archivo = $('#archivo').val();
				
				
				if(Nombre == null || Nombre.length == 0 || /^\s+$/.test(Nombre) 
							|| Codigo == null ||/^\s+$/.test(Codigo) || Descripcion == null || Descripcion.length == 0 || /^\s+$/.test(Descripcion)
							|| Costo == null || Stock == null || Archivo.length == 0)
						{
							$('#mensaje3').html('[ERROR] Faltan Campos por llenar!!!');
							setTimeout("$('#mensaje3').html('');", 3000);
							return false;
						}
				
				document.forma01.submit();
			}
			
			
			function validaCodigo() {
				var Codigo = $('#codigo').val();
				$.ajax({
							url		: 'valida_codigo.php?codigo='+Codigo,
							type	: 'post',
							dataType: 'text',
							success	: function(res) {
									if(res == 1) {
										
										$('#mensaje2').html('El producto con codigo '+Codigo+' ya existe D:');
										$('#codigo').val('');
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
		<div class="Titulo2"> <h4>ALTA DE PRODUCTOS </h4> </div>
		<div class="main_div2">
			<form name="forma01" action="Productos_salva.php" method= "POST" enctype="multipart/form-data">		
				<input class="in" type="text" name="nombre" id="nombre" placeholder="Nombre del Producto"><br> 
				<input class="in" type="text" name="codigo" id="codigo" placeholder="Codigo del Producto" onBlur="validaCodigo();">
				<div class="error" id="mensaje2"> </div><br>
				<div class="in2">DESCRIPCION: </div>
				<textarea class="textar" name="descripcion" id="descripcion"></textarea><br><br>
				<div class="in2">COSTO: </div>
				<input class="in" type="number" name="costo" id="costo"><br>
				<div class="in2">STOCK: </div>
				<input class="in" type="number" name="stock" id="stock"><br>
				<input type="file" id="archivo" name="archivo" accept="image/*"><br>
				<input class="in" type="hidden" name="productoID" id="productoID" value="0"><br>
				<input type="submit" name="Salvar" value="Salvar" onClick="validaDatos(); return false;"><br>
				<div class="error" id="mensaje3"> </div><br>
				
			</form>	
		</div>
		<a href="Productos_lista.php"><img src = "./Imagenes/Regresar.png" width = "150" height = "75" 
				alt = "Regresar al listado de productos"/></a>
	</body>
	
</html>