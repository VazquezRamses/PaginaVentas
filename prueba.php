<?php
	require "Funciones/coneccion.php"; 		
	$con = conecta();
	
	function random() {
		$sql = "SELECT * FROM banners";
		$resultado = mysqli_query($con, $sql);
		
		while($mostrar = $resultado->fetch_array()) {
					$imagen = $mostrar['archivo'];
					$arr[] = $imagen;
				}
					
		$res = mysqli_query($con,$sql);
		$numero_banners = mysqli_num_rows($res);				
		$random = rand(0,$numero_banners);
		$imagen = $arr[$random];
		return $imagen;
	}
	
		
	
?>

