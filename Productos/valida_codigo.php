<?php
	//valida_correo.php
	require "Funciones/coneccion.php";

	$con = conecta();
	$Ban = 0;
	$codigo = $_REQUEST['codigo'];
	
	$sql = "SELECT * FROM productos
				WHERE codigo = '$codigo'";
				
	$res = mysqli_query($con,$sql);
	$numero_prod = mysqli_num_rows($res);			
	
	if($numero_prod > 0)
	{
		$Ban = 1;
	}


	echo $Ban;
?>