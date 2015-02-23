<?php
    require_once("configuracion/clsBD.php");
    $result;
    $objDatos = new clsDatos();

    $sql = 'SELECT * 
    		FROM resultado';
    $resultado = $objDatos->hacerConsulta($sql);
    $raws = pg_fetch_all($resultado);

    if ($_GET) {

	$idRespuesta = array_key_exists('resp', $_GET) ? $_GET['resp'] : null;
		if($idRespuesta==1){ 
			print '<script language="JavaScript">'; 
			print 'alert("Respuesta correcta");'; 
			print '</script>';
			$resultadoResp = true;
		}else{
			print '<script language="JavaScript">'; 
			print 'alert("Respuesta incorrecta");'; 
			print '</script>';
			$resultadoResp = false;
		}
}

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
						<h2>RESULTADOS</h2>
					</header>
					<form action="preguntados.php" method="post">

							<table border="1">
						        
						            <tr>
						                <th>ID PREGUNTADOS</th>
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
						                <td><?php echo $raw['id_preguntados']; ?></td>
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
							
						
						
					</form>
					<!--<header>
						<h1>BIENVENIDO A PREGUNTADOS
						<?php
						echo $nombre;
						?>
						</h1>
						<h2>PREGUNTADOS</h2>
						
					</header>
					<H3>ACONTINUACION MUESTRA LOS PREGUNTADOS DISPONIBLES EN EL MOMENTO </H3>
					<div id="ta">
					<p>
					<?php
					listarPreguntados();
					?>
					</p>
					
					</div>-->
				
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