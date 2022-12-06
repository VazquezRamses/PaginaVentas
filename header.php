
<html>
	<head>
		
		<script src="JS/jquery-3.3.1.min.js" type="text/javascript"></script>   
		
		<style>
			*{
				margin: 0;
				padding: 0;
				list-style: none;
				text-decoration: none;
			}
			
			.header {
				width: 100%;
				heigth: 100px;
				background-color: #2E86C1;
				border: 4px solid #0F2674;
				display: block;
				overflow:hidden;
			}
			
			.inner_header {
				width: 100%;
				heigth: 100%;
				display: flex;
				justify-content: center;
				align-items: center;
				margin: 0 auto;
			}
			
			.logo_container {
				width: 40%;
				heigth: 100%;
				text-align: middle;
				float: left;
				display: table;
				margin: 0px 80px;
			}
			
			.logo_container h1{
				color: black;
				display: table-cell;
				vertical-align: middle;
				heigth: 100%;
				text-align: middle;
				font-family: Consolas; 
				font-size: 32px;
				
			}
			
			.logo_container img {
				heigth: 10px;
				width:60px;
			}
			
			.navigation {
				heigth: 100%;
				text-align: middle;
				float: right;
				display: table;

			}
			
			.navigation a {
				heigth: 100%;
				padding: 8px 20px;
				line-heigth: 200px;
			}
	
			.navigation a {
				display: inline-block;
				border: 2px solid #0F2674 ;	
				vertical-align: middle;
				heigth: 100%;
				color: white;
				font-weight:bold;
				font-size: 15px;
				line-heigth:normal;
				font-family: "Segoe UI";
				margin: 10px auto;
				border-radius: 50px;
				text-align:center;
				-webkit-transition:all 500ms ease;
				-o-transition:all 500ms ease;
				transition:all 500ms ease;
			}
			
			.navigation a:hover{
					background: #3A456A;
			}
			
			
		</style>
	</head>
		
	<body>
		<div class="header"> 
			<div class="inner_header"> 
				<div class="logo_container">
					<img src='Imagenes/Logo.png'>  
					<h1>Libreria - Made in Heaven</h1>
				</div>
				<div class="navigation">
					<a href="index.php"><li>HOME</li></a>
					<a href="productos.php">PRODUCTOS</a>
					<a href="#">CONTACTO</a>
					<a href="carrito01.php">CARRITO</a>
				</div>
			</div>
		</div>
		
	</body>
	
</html>