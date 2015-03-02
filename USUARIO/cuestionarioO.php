<?php
session_start();
	$nombre =$_SESSION['usuario'];
    require_once("configuracion/clsBD.php");
    $result;
    $objDatos = new clsDatos();

    $sql = 'SELECT * 
    		FROM cuestionario';
    $resultado = $objDatos->hacerConsulta($sql);
    $raws = pg_fetch_all($resultado);
    
 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>GAIA Tools/Principal </title>
		<br>
		<a  href="indexU.php"><img src="12.png" width="600" heigth="600"></a>
		
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
					<header>
						<b><h1>
					<?php
					echo $nombre;
					?></b>
				</h1>
					<h2>LISTA PREGUNTADOS</h2>
					</header>
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

		
			<section id="banner">
				
			
				<div class="inner">
					<header>
					<h2>LISTA DE PREGUNTADOS</h2>
					</header>

							<table border="1">
						        
						            <tr>
						                <th>ID CUESTIONARIO</th>
						                <th>NOMBRE</th>
						                <th>DESCRIPCION</th>
						                <th>AREA</th>
						                <th>AUTOR</th>
						            </tr>
						        
						        <tbody>
						        <?php
						            foreach ($raws as $raw) {
						                    
						        ?>
						            <tr>
						                <td><a href="cuestionarioU.php?id=<?php echo $raw['id_cuestionario']; ?>"><?php echo $raw['id_cuestionario']; ?></td>
						                <td><?php echo $raw['nombre']; ?></td>
						                <td><?php echo $raw['descripcion']; ?></td>
						                <td><?php echo $raw['area']; ?></td>
						                <td><?php echo $raw['autor']; ?></td>
						            </tr>
						        <?php 
						            } 
						        ?>
						        </tbody>
						    </table>
						    <script type="text/javascript">
			function capturadDato(){

				alert("jkjijk");
				var id = $("#idPreguntados").val();
				alert(id);
			}
		</script>
				</div>
			</section>
	</body>
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
	
</html>