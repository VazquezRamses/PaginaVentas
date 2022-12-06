<?php
	//valida_correo.php
	require "Funciones/coneccion.php";

	$con = conecta();
	$Ban = 0;
	$correo = $_REQUEST['correo'];
	
	$sql = "SELECT * FROM administradores
				WHERE correo = '$correo'";
				
	$res = mysqli_query($con,$sql);
	$numero_correos = mysqli_num_rows($res);			
	
	if($numero_correos > 0)
	{
		$Ban = 1;
	}


	echo $Ban;
?>