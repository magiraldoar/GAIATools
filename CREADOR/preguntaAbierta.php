
<?php
	session_start();
	include("base/inicioSql.php");
	$mensaje = "";
	$herramienta = "cuestionario";
	$idTipoPregunta = 1;
	require_once("configuracion/clsBD.php");
	$objDatos = new clsDatos();
	$nombre =$_SESSION['usuario'];
	if ($_POST) {
		$pregunta = array_key_exists('pregunta', $_POST) ? $_POST['pregunta'] : null;
		$respuesta = array_key_exists('respuesta', $_POST) ? $_POST['respuesta'] : null;
		if ("cuestionario" == $herramienta ) {

			crearPreguntaCuestionario($pregunta, $respuesta, $idTipoPregunta, $_SESSION['id_cuestionario']);
		}
		header("location:cuestionario.php");
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
		<script type="text/javascript" src="js/arrive.js"></script>
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
					<b><h1>USUARIO:
						<?php
						echo $nombre;
						?></b>
					</h1>
					<div id="tipopreg">
						<div id="abierta" class="selecPreg">Abierta</div>
						<div id="cerrada" class="selecPreg">Cerrada</div>
					</div>
					<div id="pregAbierta">
						<br>
						<header>
							<h2>PREGUNTA ABIERTA</h2>
						</header>
						<form action="preguntaAbierta.php" method="post">
						<p class="pre">
							Pregunta:   
							<input class="pre" type="text" name="pregunta"><br><br>
							<textarea class="textarea1" name="respuesta" rows=automatically cols=automatically placeholder="RESPUESTA"></textarea><br><br>
							<input type="submit" value="guardar"> 
						</p>
						</form>
						<br><br>
						<a  href="preguntaAbierta.php"><img src="mas.png" width="70" heigth="70" align="right">  </a>
						<a  href="principalC.html"><img src="15.png" width="70" heigth="70" align="right"> "  " </a>
						<a  href="registroCuestionario.php"><img src="17.png" width="70" heigth="70" align="right"> </a>
					</div>
					<div id="pregCerrada">
						<br>
						<header>
							<h2>PREGUNTA CERRADA</h2>
						</header>
						<form action="preguntaCerrada.php" method="post">
							<p class="preg">
								
								Pregunta:<br><br>  
								<textarea class="textarea1" name="pregunta" rows=automatically cols=automatically placeholder="¡Escriba aca su pregunta!"></textarea><br><br>
								
								<div class="ans">
								1° opcion:
								<input  type="text" name="1" id="prueba" onchange="myFunction(this.value)"><br><br>
								2° opcion:   
								<input type="text" name="2" onchange="myFunction(this.value)"><br><br>
								3° opcion:   
								<input type="text" name="3" onchange="myFunction(this.value)"><br><br>
								4° opcion:   
								<input type="text" name="4" onchange="myFunction(this.value)"><br><br>
								</div>
								RESPUESTA: <select id="respuesta" name="respuesta"></select>
							</p>
							<input type="button" id="add" value="ADICIONAR OPCION" ><br><br>
							<input type="submit" name="guardar" value="GUARDAR"><br><br>
						</form>
						<a  href="preguntaAbierta.php"><img src="mas.png" width="70" heigth="70" align="right">  </a>
						<a  href="principalC.html"><img src="15.png" width="70" heigth="70" align="right"> "  " </a>
						<a  href="registroCuestionario.php"><img src="17.png" width="70" heigth="70" align="right"> </a>
					</div>					
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
$("#add").click(function(){
	var name = parseInt($(".ans > input").last()[0].name)+1
	$(".ans").append(name+"° opcion: <input type=text name="+name+" onchange=myFunction(this.value)><br><br>")
});

function myFunction(val) {
	$('#respuesta').append('<option value='+val+' selected="selected">'+val+'</option>');
}
</script>