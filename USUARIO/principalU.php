<?php
session_start();
require_once("configuracion/clsBD.php");
$objDatos = new clsDatos();
$nombre =$_SESSION['usuario'];
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>GAIA Tools/Principal </title>
		
		<div class="logo"><a  href="indexU.php"><img src="12.png" width="600" heigth="600"></a></div>
		
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
							<li class="current"><a href="indexU.php" onClick="return confirmClick();">CERRAR SESIÓN</a></li>
						</li>
						
					</ul>
				</li>

			</ul>
		</nav>
	</header>
	<section id="banner">
		<div class="inner">
			<header>
				<b><h1>
					<?php
					echo $nombre;
					?></b>
				</h1>
				<h2>APLICACIONES</h2>
				</nav>
			</header>

					<p>
						
						<a  href="preguntadosO.php"><img src="8.png" width="100" heigth="100"></a>
						<a  href="cuestionarioO.php"><img src="4.png" width="150" heigth="150"></a><br>
						<a  href=""><img src="5.png" width="150" heigth="150"></a>
						<a  href="lectorTextosO.php"><img src="6.png" width="150" heigth="150"></a>

					</p>
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
<script type="text/javascript">
	function confirmClick() {
		if(confirm("desea cerrar sesión?")) {
			return true;
		} else {
			return false;
		}
	};
	</script>