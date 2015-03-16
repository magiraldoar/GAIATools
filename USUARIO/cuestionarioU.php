	<?php
	session_start();
	$nombre =$_SESSION['usuario'];
	require_once("configuracion/clsBD.php");

	$result;
	$constPos='a';
	$len= array_key_exists('posPreg', $_POST) ? $_POST['posPreg'] : $constPos;


	if ($_GET) {
		$id=$_GET['id'];
		$_SESSION['id'] = $id;
	}
	else{
		$id = $_SESSION['id'];
	}


	if ($len!=$constPos) {	
		$pos=strlen($len)-1;

	}else{
		$pos=0;
	}

	$objDatos = new clsDatos();
	$sql = 'SELECT pregunta, id_pregunta FROM pregunta p WHERE id_cuestionario='.$id;
	//echo $id;
	$result = $objDatos->hacerConsulta($sql);
	$arreglo_datos = $objDatos->generarArreglo($result);
	    //echo var_dump($arreglo_datos);
		$tam=count($arreglo_datos);
		if ($pos==$tam) {
			$pregunta = $arreglo_datos[$pos-1];	
		}else{	
			$pregunta = $arreglo_datos[$pos];
		}

		if ($pos>0) {
			$respu = $arreglo_datos[$pos-1];
		}else{
			$respu = $arreglo_datos[$pos];
		}

		$sqls = 'SELECT * 
		FROM opcion, pregunta
		WHERE opcion.id_pregunta=pregunta.id_pregunta and pregunta.id_pregunta = '.$pregunta['id_pregunta'];
		$resultado = $objDatos->hacerConsulta($sqls);
		$raws = $objDatos->generarArreglo($resultado);
		//echo var_dump($raws);

		$sqlt = 'SELECT id_tipo_pregunta
		FROM pregunta
		WHERE pregunta.id_cuestionario ='.$id.' AND pregunta.id_pregunta ='.$pregunta['id_pregunta'];
		$cuest = $objDatos->hacerConsulta($sqlt);
		$cuesti = $objDatos->generarArreglo($cuest);
		foreach ($cuesti as $cu ) {
			$idCuest = $cu['id_tipo_pregunta'];
		}
		echo $idCuest;

	if ($_POST) {
		if($_POST['idCuestionario']==1){
			?>
			<script>
		var pos=0;
		
		function changeColor(pos){
			var colores =["#FF0000","#DF0101","#DF3A01",//"#FF4000",
			"#DF7401","#FF8000","#DBA901",//"#FFBF00",
			"#D7DF01","#FFFF00","#F7FE2E",
			"#A5DF00","#74DF00","#3ADF00","#01DF01","#01DF3A"];//,"#00FF00"];
			document.getElementById('panel').style.backgroundColor = colores[pos];
		}

		function calificar(){
			var string = $("#texto").val();
			var palClaves = $("#clave").val();
			normalizar(string, palClaves);
		}

		function normalizar(string, palClaves){
			//var segimiento="";
			var j=0, pal, tamEst, tamPro, tamMin, dOverlap, contRep=0;
			var respuEstud, respuProfe;
			var analEstud = new Array();
			var analProfe = new Array();
			//convertir la cadena en minuscula
			string = string.toLowerCase();
			palClaves = palClaves.toLowerCase();
			//quita tildes y caracteres especiales ademas de signos de puntuacion, agrupacion, admiracion y otros
			string = normalize(string);
			palClaves = normalize(palClaves);

			//palabras es un arreglo separador de palabras
			respuEstud = string.split(" ");
			respuProfe = palClaves.split(" ");

			//Retirar espacios en blanco, y palabras de union (a, de, en, un...) StopWord
			for (var i in respuEstud) {
				pal=respuEstud[i];
				if ( !invalidas(pal) ) {
					analEstud[j]=respuEstud[i];
					j++;
				}
			}
			j=0;
			for (var i in respuProfe) {
				pal=respuProfe[i];
				if ( !invalidas(pal) ) {
					analProfe[j]=respuProfe[i];
					j++;
				}
			}

			//ordenar el arreglo
			analEstud.sort();
			analProfe.sort();

			for (var i in analEstud ) {
				for (var k in analProfe ) {
					if (analEstud[i]==analProfe[k]) {
						contRep = contRep + 1;
					}
				}
			}

			//tamaños de las cadenas
			tamEst = analEstud.length;
			tamPro = analProfe.length;

			if (tamEst>tamPro) {
				tamMin = tamEst;
			}else{
				tamMin = tamPro;
			}
			
			//alert("cont "+contRep+" tamMin "+tamMin);
			dOverlap = contRep/tamMin;
			
			document.getElementById("resultNormalizacion").innerHTML = dOverlap;
		}

		function normalize (str) {
			var from = "ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÇç´'`,;.:-_^¨{}[]*+~¡?¿!#$%&/()=°!|ºª";
			var to   = "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuucc";
			var mapping = {};

			for(var i = 0, j = from.length; i < j; i++ ){
				mapping[ from.charAt( i ) ] = to.charAt( i );
			}

			var ret = [];
			for( var i = 0, j = str.length; i < j; i++ ) {
				var c = str.charAt( i );
				if( mapping.hasOwnProperty( str.charAt( i ) ) )
					ret.push( mapping[ c ] );
				else
					ret.push( c );
			}      
			return ret.join( '' );
		}

		function invalidas(str){
			var i, es;
			var prepos = ['a','ante','bajo','con','de','desde','durante','en','entre','excepto','hacia','hasta','mediante','para','por','salvo','segun','sin','sobre','tras', 'ellos','pero', 'un', 'una', 'al', 'le', 'la', 'lo', 'el', 'los', ''];
			for (i in prepos ) {
				if (prepos[i] == str) {
					es = true;
					break;
				}else{
					es = false;
				}
			}
			return es;
		}
	</script>
			<?php
		}
		else{
			$idRespuesta = array_key_exists('respuesta', $_POST) ? $_POST['respuesta'] : null;
		$respuesta="";

		if ($idRespuesta!=null) {	
			$resultadoResp;
			$sqlr = "SELECT respuesta
			FROM pregunta
			WHERE pregunta.respuesta = '$idRespuesta' and pregunta.id_pregunta = ".$respu['id_pregunta'];

			$result = $objDatos->hacerConsulta($sqlr);
			$arreglo_datos = $objDatos->generarArreglo($result);
			$respuesta = $arreglo_datos[0]['respuesta'];	
		    	//echo $respuesta;
			if($respuesta){ 
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
				//echo "<input type='hidden' name='posPreg' value='".$len."'>";

		}
		}
		
	}
	//echo "tam".$tam."pos".$pos;
	$len.=$constPos;
	if ($pos==$tam) {
		header("location:ranking.php?resp=".$resultadoResp);	
	}else{
		header("cuestionarioU.php");
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
		<header id="header" class="alt">
			<nav id="nav">
				<ul>
					<li class="current"><a href="indexC.php">Quienes Somos</a></li>
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
				<form action="cuestionarioU.php" method="post">
					<input type='hidden' name='posPreg' value="<?php echo $len ?>">
					<input type='hidden' name='idCuestionario' value="<?php echo $idCuest ?>">
					<?php
					echo "<b> PREGUNTA : ".$pregunta['pregunta']."</b>";
					?><br><br>
					<?php if ($idCuest == 1) {
								echo "<textarea class='textarea1' name='respuesta' rows=automatically cols=automatically placeholder='RESPUESTA'></textarea><br><br>";
						}elseif ($idCuest == 2) {
							echo "<table border='10'>
							<tr>
							<th><H3>ID</H3></th>
							<th><h3>OPCION</h3></th>
							</tr>";
							foreach ($raws as $raw) {
								echo "<tr><th>".$raw['id_opcion']."</th><th>".$raw['opcion']."</th></tr>";
							}
							echo "</table>";
							echo "<b>SELECCIONE SU RESPUESTA:<br></b><br>
							<select name='respuesta' id='respuesta'>";
							foreach ($raws as $raw) {
							echo '<option value="'.$raw['opcion'].'" selected>'.$raw['opcion'].'</option>';
						}
						}elseif ($idCuest == 3) {
							 
							echo"SELECCIONE SU RESPUESTA:<br><br>";
							echo "<select name='respuesta' id='respuesta' placeholder='alguien@example.com' required>";

							      echo "<option value='1'>true</option>";
							      echo "<option value='0'>false</option>";
							   }
							 echo"</select><br><br>";
						
						?>
					</select><br><br>

					<input type="submit" name="guardar" value="RESPONDER"><br><br><br>
				</form>

				<a  href="preguntados.php"><img src="mas.png" width="70" heigth="70" align="right"></a>
				<a  href="principalC.html"><img src="15.png" width="70" heigth="70" align="right"></a>
				<a  href="registroPreguntados.html"><img src="17.png" width="70" heigth="70" align="right"></a>
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
	<script type="text/javascript">
	$("#add").click(function(){
		var name = parseInt($(".ans > input").last()[0].name)+1
		$(".ans").append(name+"° opcion: <input type=text name="+name+" onchange=myFunction(this.value)><br><br>")
	});

	function myFunction(val) {
		$('#respuesta').append('<option value='+val+' selected="selected">'+val+'</option>');
	}
	</script>