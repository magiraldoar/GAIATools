<?php
session_start();
include("base/inicioSql.php");
$mensaje = "";
$herramienta = "cuestionario";
require_once("configuracion/clsBD.php");
$objDatos = new clsDatos();
$nombre =$_SESSION['usuario'];

$sqls = 'SELECT respuesta
		FROM pregunta
		WHERE pregunta.id_tipo_pregunta = 1';
		$resultado = $objDatos->hacerConsulta($sqls);
		$arreglo_datos = $objDatos->generarArreglo($resultado);
		$respuesta = $arreglo_datos[0]['respuesta'];	
	    echo $respuesta;	
?>
<!DOCTYPE html>
<html>
<head>
	<title>LISTA DE ESTUDIANTES</title>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
	<script type='text/javascript' src='js/jquery.js'  ></script>
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
</head>
<body>
	<label>Normalizacion analisis respuestas abiertas</label><br>
	RespEstu<input type="text" id="texto" name="texto" /><br>
	RespProf<input type="text" id="clave" name="clave" value="<?php echo $respuesta; ?>"/><br>
	<button onclick="calificar();">Ver</button><br>
	<p id="resultNormalizacion"></p><br>
	<label>Transicion colores</label><br>
	<div id="panel" style="width:100px;height:100px;background-color:#D8D8D8;" onclick="pos++; changeColor(pos);"></div><br>
</body>
</html>