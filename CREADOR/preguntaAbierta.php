
<?php
	session_start();
	include("base/inicioSql.php");
	$mensaje = "";
	$idCuestionario= $_SESSION['idCuestionario'];
	$herramienta = "cuestionario";
	$idTipoPregunta = 1;
	require_once("configuracion/clsBD.php");
	$objDatos = new clsDatos();
	if ($_POST) {
		$pregunta = array_key_exists('pregunta', $_POST) ? $_POST['pregunta'] : null;
		$respuesta = array_key_exists('respuesta', $_POST) ? $_POST['respuesta'] : null;
		if ("cuestionario" == $herramienta ) {

			crearPreguntaCuestionario($pregunta, $respuesta, $idTipoPregunta);
		}
	}

?>
<!DOCTYPE HTML>
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
	
	
		<!-- Header -->
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
						<h2>PREGUNTA ABIERTA</h2>
					</header>
					<form action="preguntaAbierta.php" method="post">
					<p class="pre">
						pregunta:   
						<input class="pre" type="text" name="pregunta"><br><br>
						<textarea class="textarea1" name="respuesta" rows=automatically cols=automatically placeholder="RESPUESTA"></textarea><br><br>
						<input type="submit" value="guardar"> 
					</form>
					<br><br>
					<a  href="preguntaAbierta.php"><img src="mas.png" width="70" heigth="70" align="right">  </a>
					<a  href="principalC.html"><img src="15.png" width="70" heigth="70" align="right"> "  " </a>
					<a  href="registroCuestionario.php"><img src="17.png" width="70" heigth="70" align="right"> </a>
					</p>
					
				</div>

			</section>
		
			<footer id="footer">
			
				<ul class="icons">
					<li><a href="https://twitter.com/GaiaTools" class="icon circle fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon circle fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon circle fa-google-plus"><span class="label">Google+</span></a></li>
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