<!DOCTYPE HTML>

<?php
session_start();
	include("base/inicioSql.php");
	$mensaje = "";
	require_once("configuracion/clsBD.php");
	$objDatos = new clsDatos();
	$nombre =$_SESSION['usuario'];
	if ($_POST) { 
		$idNombre = array_key_exists('nombre', $_POST) ? $_POST['nombre'] : null;
		$idDescripcion = array_key_exists('descripcion', $_POST) ? $_POST['descripcion'] : null;
		$idArea = array_key_exists('area', $_POST) ? $_POST['area'] : null;

		//crearPreguntados($idNombre, $idDescripcion, $idArea, $autor);
		$sql= "INSERT INTO preguntados(nombre, descripcion, area, autor, id_ha)
		 VALUES ('$idNombre', '$idDescripcion', '$idArea', '$idAutor', 1) returning id_preguntados";
		$datos_desordenados = $objDatos->hacerConsulta($sql);
    	$arreglo_datos = $objDatos->generarArreglo($datos_desordenados);
    	$usuario = $arreglo_datos[0]['id_preguntados'];
    	$_SESSION['id_preguntados'] = $usuario;
		header("location:preguntados.php");
	}
?>
<html>
	<head>
		<title>GAIA Tools</title>
		
			<div class="logo"><a  href="indexC.php"><img src="12.png" width="600" heigth="600"></a></div>
		
		
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/jquery.scrolly.min.js"></script>
		<script src="js/jquery.scrollgress.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
			<link rel="stylesheet" href="css/style-noscript.css" />
		</noscript>
	</head>
	<body class="index">
			<header id="header" class="alt">
				<nav id="nav">
					<ul>
						<li class="current"><a href="index.html">Quienes Somos</a></li>
						<li class="submenu">
							<a href="">HERRAMIENTAS</a>
							<ul>
								<li><a href="left-sidebar.html">PREGUNTADOS</a></li>
								<li><a href="right-sidebar.html">DICCIONARIO</a></li>
								<li><a href="no-sidebar.html">LECTOR Y EDITOR DE TEXTO</a></li>
								<li><a href="contact.html">CUESTIONARIO</a></li>
							</ul>
						</li>
						
					</ul>
				</nav>
			</header>
			<section>
			</section>
			<section id="banner">
				<div id="content" class="inner">
					
					<header>
						<b><h1>
						<?php
						echo $nombre;
						?></b>
						</h1>
						<h2>PREGUNTADOS</h2>
					</header>
					<form action="registroPreguntados.php?" method="post">
					
						<p>
						<form action="registroPreguntados.php" method="post">
						Nombre:<br>
						<input type="text" name="nombre" id="nombre" required><br><BR>
						Descripcion:<br><input type="text" name="descripcion" id="descripcion" required><br>
						<br>
						Area:<br>
						<input type="text" name="area" id="area" required><br><br>
						
						
						<input type="submit" value="REGISTRAR"><br>
						</form>
					</p>
					</form>
						
					
				</div>
			</section>
		
			<footer id="footer">
			
				<ul class="icons">
					<li><a href="https://twitter.com/GaiaTools" class="icon circle fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="https://www.facebook.com/profile.php?id=100008665686426" class="icon circle fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="https://plus.google.com/u/0/113682527762090886264/posts" class="icon circle fa-google-plus"><span class="label">Google+</span></a></li>
				</ul>
				
				<ul class="copyright">
					<li>GAIA (Grupo de Ambientes Inteligentes Adaptativos)</li>
				</ul>
			
			</footer>
	
	</body>
</html>
<?php
    $objDatos->cerrarConexion();
?>