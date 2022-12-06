	<?php
	// administradores_slava.php
	require "Funciones/coneccion.php";
	
	$con = conecta();
	
	$id = $_POST['productoID'];
	$nombre = $_POST['nombre'];
	$codigo = $_POST['codigo'];
	$descripcion = $_POST['descripcion'];
	$costo = $_POST['costo'];
	$stock = $_POST['stock'];
	
	$file_name = $_FILES['archivo']['name']; //Nombre real del archivo
	$archivo = $file_name;
	$sql_archivos = " ";
	
	
	if(empty($file_name) == false) //SI EL CAMPO DEL ARCHIVO CONTINEN ALGO 
	{
		$file_tmp = $_FILES['archivo']['tmp_name']; //Nombre temporal del archivo
		$cadena = explode(".", $file_name); //SEPARAR EL NOMBRE DE LA EXTENSION
		$ext = $cadena[1]; //EXTENSION
		$Extensiones_permitidas = array('jpg', 'png', 'jpeg'); //LISTA DE EXTENSIONES PERMITIDAS
		$dir = "Archivos/"; //CARPETA DONDE SE GUARDARAN LOS ARCHIVOS
		$file_enc = md5_file($file_tmp); //NOMBRE DEL ARCHIVO ENCRIPTADO 
		
		if(in_array($ext, $Extensiones_permitidas)) { //SI LA EXTENSION DEL ARCHIVO SE ENCUENTRA EN LA LISTA
			$nuevoNombre = "$file_enc.$ext"; //NUEVO NOMBRE DEL ARCHIVO
			copy($file_tmp, $dir.$nuevoNombre);
			$archivo_n = $nuevoNombre;
			$sql_archivos = ", archivo_n ='$archivo_n', archivo='$archivo'";
		}
		
	}
	
	$sql_update = "UPDATE productos
					SET nombre='$nombre', codigo ='$codigo', descripcion='$descripcion', costo = '$costo', stock = '$stock' ";
					
	$sql_final = " WHERE id=$id ";
	

	if($id == 0) {
			$sql = "INSERT INTO productos
		(nombre, codigo, descripcion, costo, stock, archivo_n, archivo)
		VALUES ('$nombre', '$codigo', '$descripcion', '$costo', '$stock', '$archivo_n', '$archivo')";
	}
	else {
			$sql = $sql_update. $sql_archivos .$sql_final;
		}
		
		
		
	$res = $con->query($sql);
	
	header("Location: Productos_lista.php"); //REDIRECCIONA A LA PAGINA
?>