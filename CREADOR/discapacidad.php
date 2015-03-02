<?php
require_once("configuracion/clsBD.php");
$objDatos = new clsDatos();
session_start();
$nombre =$_SESSION['usuario'];
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Seleccionar Discapacidad</title>
		
			<div class="logo"><a  href="indexC.php"><img src="12.png" width="600" heigth="600"></a></div>
		
		
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
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
						<li class="current"><a href="logout.php" onClick="return confirmClick();">CERRAR SESIÓN</a></li>
					</ul>
				</nav>
			</header>

		<!-- Banner -->		
			<section id="banner">
				
				
				<div class="inner">
					
					<header>
						<b><h1>
						<?php
						echo $nombre;
						?></b>
						</h1> 
						<h2> SELECCIONE EL TIPO  <BR> DE NEED  
						</h2>
					</header>
					<p>
						
						<a  href="principalC.php"><img src="ciego.png" width="300" heigth="300"></a>
						<a  href="#"><img src="sordo.png" width="300" heigth="300"></a><br>
						<a  href="#"><img src="mudo.png" width="300" heigth="300"></a>
						<a  href="#"><img src="discapacitado.png" width="300" heigth="300"></a>

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
<script type="text/javascript">
	function confirmClick() {
		if(confirm("desea cerrar sesión?")) {
			return true;
		} else {
			return false;
		}
	};
	</script>