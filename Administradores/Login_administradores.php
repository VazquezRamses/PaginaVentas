<?php
	//LoginAdministradores
	require "Funciones/coneccion.php";
	session_start(); 
	
	$con = conecta();
	$Ban = 0;
	$correo = $_REQUEST['correo'];
	$pass = $_REQUEST['pass'];
	$passEnc = md5($pass);
	
	$sql = "SELECT * FROM administradores
				WHERE correo = '$correo' and pass = '$passEnc' and status = 1 and eliminado = 0";
				
	$res = mysqli_query($con,$sql);
	$numero_correos = mysqli_num_rows($res);	
	$array = mysqli_fetch_array($res);	
	
	if($numero_correos > 0)
	{
		$id       = $array["ID"];
		$nombre    = $array["nombre"];
        $apellidos     = $array["apellidos"];
        
		$_SESSION['correo_admin'] = $correo;
		$_SESSION['ID_adimn'] = $id;
		$_SESSION['name_adimn'] = $nombre;
		$_SESSION['apellidos_adimn'] = $apellidos;
		$Ban = 1;
	}


	echo $Ban;
?>