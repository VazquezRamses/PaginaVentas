	<?php
	// administradores_slava.php
	require "Funciones/coneccion.php";
	
	$con = conecta();
	//RECIBE VARIABLES
	$id = $_POST['usuarioID'];
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$correo = $_POST['correo'];
	$pass = $_POST['pass'];
	//PARA ENCRIPTAR LA COTRASEÑA
	$passEnc = md5($pass);
	$rol = $_POST['rol'];
	
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
	
	$sql_update = "UPDATE administradores 
					SET nombre='$nombre', apellidos ='$apellidos', correo='$correo', rol = '$rol' ";
					
	$sql_final = " WHERE id=$id ";
	
	$sql_pass = " ";
	if(empty($pass) == false)
		$sql_pass = ", pass='$passEnc'";
	
	if($id == 0) {
			$sql = "INSERT INTO administradores
		(nombre, apellidos, correo, pass, rol, archivo_n, archivo)
		VALUES ('$nombre', '$apellidos', '$correo', '$passEnc', '$rol',
				'$archivo_n', '$archivo')";
	}
	else {
			$sql = $sql_update. $sql_pass. $sql_archivos .$sql_final;
		}
		
	$res = $con->query($sql);
	
	header("Location: administradores_lista.php"); //REDIRECCIONA A LA PAGINA
?>