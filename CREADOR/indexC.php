<?php
session_start();
$mensaje = "";
require_once("configuracion/clsBD.php");
$objDatos = new clsDatos();
if($_POST){
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $id_tipo_usuario = 2;
    if($user == null || $pass == null){
        $mensaje = "El usuario y la clave son obligatorios";
    } else {
        $sql = "SELECT id_usuario, id_tipo_usuario
                FROM usuario u
                WHERE u.usuario ='$user' AND u.clave = MD5('$pass') AND u.id_tipo_usuario='$id_tipo_usuario'";
        $datos_desordenados = $objDatos->hacerConsulta($sql);
        $arreglo_datos = $objDatos->generarArreglo($datos_desordenados);
        $usuario = $arreglo_datos[0];
        $_SESSION['usuario']=$user;
        if($usuario > 0 ) {
        		 
            	 header("Location: discapacidad.php");       
        } else {
            $mensaje = "Usuario o clave invalidos";  
        }
    } 
}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<div class="logo"><a href="indexC.php"><img src="12.png" class="icono" width="600" heigth="600" ></a></div>
		<title>GAIA Tools</title>
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
						<li class="current"><a href="index.html"><font size="5">Quienes Somos</font></a></li>
						<li class="submenu">
							<a href=""><font size="5">HERRAMIENTAS</font></a>
							<ul>
								<li class="sub"><a href="left-sidebar.html"> PREGUNTADOS</a></li>
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
						<h2>INICIAR SESIÓN</h2>
					</header>
					<center>
					<p>
						<form method="post" action="indexC.php">
            			<img src="1.png" width="200" heigth="200"><br><br>
                		<label id="nombre">Usuario</label><br><input type="text" id="user" name="user" required/><br><br>
                		<label id="nombre">Contraseña</label><br><input type="password" id="pass" name="pass" required/><br><br>
                		<label id="mensaj"><?php echo $mensaje; ?></label>
               			<br><br>
                		<input type="submit" value="INICIAR SESION"/><br><br>
            			</form>
            			<input type=button onClick="parent.location='registroC.php'" value="REGISTRARSE"/>
					</p>
					</center>
				
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