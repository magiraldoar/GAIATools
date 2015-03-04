<!DOCTYPE HTML>


<?php
include("base/inicioSql.php");
$mensaje = "";
require_once("configuracion/clsBD.php");
$objDatos = new clsDatos();

if ($_POST) { 
  $idNombre = array_key_exists('nombre', $_POST) ? $_POST['nombre'] : null;
  $idApellido = array_key_exists('apellido', $_POST) ? $_POST['apellido'] : null;
  $idCorreo = array_key_exists('correo', $_POST) ? $_POST['correo'] : null;
  $idSexo = array_key_exists('sexo', $_POST) ? $_POST['sexo'] : null;
  $idPais = array_key_exists('pais', $_POST) ? $_POST['pais'] : null;
  $idTipo = array_key_exists('tipoUsuario', $_POST) ? $_POST['tipoUsuario'] : null;
  $idFecha = array_key_exists('fecha', $_POST) ? $_POST['fecha'] : null;
  $idUsuario = array_key_exists('Usuario', $_POST) ? $_POST['Usuario'] : null;
  $idClave= array_key_exists('clave', $_POST) ? $_POST['clave'] : null;
  $institucion= array_key_exists('institucion', $_POST) ? $_POST['institucion'] : null;
  $estudios= array_key_exists('estudios', $_POST) ? $_POST['estudios'] : null;
  $Need= array_key_exists('tipoNeed', $_POST) ? $_POST['tipoNeed'] : null;

  $sql = 'SELECT usuario
  FROM usuario u
  WHERE u.usuario = "$idUsuario"';
  $datos_desordenados = $objDatos->hacerConsulta($sql);
  $arreglo_datos = $objDatos->generarArreglo($datos_desordenados);
  echo var_dump($arreglo_datos);

  if (count($arreglo_datos) > 0 ) {
    ?>
    <script language="javascript"> 
    alert("este usuario ya existe"); 
    </script> 
    <?php
  }else{
    ?>

    <?php
      crearUsu($idNombre, $idApellido, $idCorreo, $idSexo, $idPais, $idTipo, $idFecha, $idUsuario, $idClave, $institucion, $estudios, $Need);
      header("location:indexU.php");

  }

}
?>

<html>
<head>
	<title>GAIA Tools</title>
	<br>
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
<script>
    var annyangScript = document.createElement('script');
    if (/localhost/.exec(window.location)) {
      annyangScript.src = "./vendor/js/annyang.js"
    } else {
      annyangScript.src = "./vendor/js/annyang.min.js"
    }
    document.write(annyangScript.outerHTML)
  </script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script>
  "use strict";

  // first we make sure annyang started succesfully
  if (annyang) {

      // define our commands.
    // * The key is what you want your users to say say.
    // * The value is the action to do.
    //   You can pass a function, a function name (as a string), or write your function as part of the commands object.
    var commands = {
      'mi nombre es *v' : function(v){
         var nom= document.getElementById('nombre');
         nom.value=v; 
        },
      'mi apellido es *v' : function(v){
         var nom= document.getElementById('apellido');
         nom.value=v; 
        },  
       'mi correo es *v' : function(v){
         var nom= document.getElementById('correo');
         nom.value=v; 
        },   
        'mi sexo es *v' : function(v){
         var nom= document.getElementById('sexo');
        nom.value =v;       
        },  
      };

    // OPTIONAL: activate debug mode for detailed logging in the console
    annyang.debug();
    // Add voice commands to respond to
    annyang.addCommands(commands);
    // OPTIONAL: Set a language for speech recognition (defaults to English)
    annyang.setLanguage('es');
    // Start listening. You can call this here, or attach this call to an event, button, etc.
    annyang.start();
  } else {
    $(document).ready(function() {
      $('#unsupported').fadeIn('fast');
    });
  }

  var scrollTo = function(identifier, speed) {
    $('html, body').animate({
        scrollTop: $(identifier).offset().top
    }, speed || 1000);
  }
  </script>
  <link rel="stylesheet" href="css/main.min.css" />




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
   <h2>REGISTRO</h2>
 </header>
 <p>
   <form action="registroU.php" method="post">
     Nombre:<br>
     <input type="text" name="nombre" id="nombre" required><br><BR>
     Apellido(s):<br>
     <input type="text" name="apellido" id="apellido" required><br>
     <br><br>
     Correo Electrónico:<br>
     <input type="email" name="correo" id="correo"  size="30" placeholder="alguien@example.com"><br><br>
     Sexo:<br>
     <input type="text" name="sexo" id="sexo" value="Masculino" >
    
     
     <br><br>
     País:<br><br>
     <select name="pais" >
      <option value="AF">Afganistán</option> 
      <option value="AL">Albania</option> 
      <option value="DE">Alemania</option> 
      <option value="AD">Andorra</option> 
      <option value="AO">Angola</option> 
      <option value="AI">Anguilla</option> 
      <option value="AQ">Antártida</option> 
      <option value="AG">Antigua y Barbuda</option> 
      <option value="AN">Antillas Holandesas</option> 
      <option value="SA">Arabia Saudí</option> 
      <option value="DZ">Argelia</option> 
      <option value="AR">Argentina</option> 
      <option value="AM">Armenia</option> 
      <option value="AW">Aruba</option> 
      <option value="AU">Australia</option> 
      <option value="AT">Austria</option>  
      <option value="AZ">Azerbaiyán</option>  
      <option value="BS">Bahamas</option>  
      <option value="BH">Bahrein</option>  
      <option value="BD">Bangladesh</option>  
      <option value="BB">Barbados</option>  
      <option value="BE">Bélgica</option>  
      <option value="BZ">Belice</option>  
      <option value="BJ">Benin</option>  
      <option value="BM">Bermudas</option>  
      <option value="BY">Bielorrusia</option>  
      <option value="MM">Birmania</option>  
      <option value="BO">Bolivia</option>  
      <option value="BA">Bosnia y Herzegovina</option>  
      <option value="BW">Botswana</option>  
      <option value="BR">Brasil</option>  
      <option value="BN">Brunei</option>  
      <option value="BG">Bulgaria</option>  
      <option value="BF">Burkina Faso</option>  
      <option value="BI">Burundi</option>  
      <option value="BT">Bután</option>  
      <option value="CV">Cabo Verde</option>  
      <option value="KH">Camboya</option>  
      <option value="CM">Camerún</option>  
      <option value="CA">Canadá</option>  
      <option value="TD">Chad</option>  
      <option value="CL">Chile</option>  
      <option value="CN">China</option>  
      <option value="CY">Chipre</option>  
      <option value="VA">Ciudad del Vaticano (Santa Sede)</option>  
      <option value="CO" selected>Colombia</option>  
      <option value="KM">Comores</option>  
      <option value="CG">Congo</option>  
      <option value="CD">Congo, República Democrática del</option>  
      <option value="KR">Corea</option>  
      <option value="KP">Corea del Norte</option>  
      <option value="CI">Costa de Marfíl</option>  
      <option value="CR">Costa Rica</option>  
      <option value="HR">Croacia (Hrvatska)</option>  
      <option value="CU">Cuba</option>  
      <option value="DK">Dinamarca</option>  
      <option value="DJ">Djibouti</option>  
      <option value="DM">Dominica</option>  
      <option value="EC">Ecuador</option>  
      <option value="EG">Egipto</option>  
      <option value="SV">El Salvador</option>  
      <option value="AE">Emiratos Árabes Unidos</option>  
      <option value="ER">Eritrea</option>  
      <option value="SI">Eslovenia</option>  
      <option value="ES" >España</option>  
      <option value="US">Estados Unidos</option>  
      <option value="EE">Estonia</option>  
      <option value="ET">Etiopía</option>  
      <option value="FJ">Fiji</option>  
      <option value="PH">Filipinas</option>  
      <option value="FI">Finlandia</option>  
      <option value="FR">Francia</option>  
      <option value="GA">Gabón</option>  
      <option value="GM">Gambia</option>  
      <option value="GE">Georgia</option>  
      <option value="GH">Ghana</option>  
      <option value="GI">Gibraltar</option>  
      <option value="GD">Granada</option>  
      <option value="GR">Grecia</option>  
      <option value="GL">Groenlandia</option>  
      <option value="GP">Guadalupe</option>  
      <option value="GU">Guam</option>  
      <option value="GT">Guatemala</option>  
      <option value="GY">Guayana</option>  
      <option value="GF">Guayana Francesa</option>  
      <option value="GN">Guinea</option>  
      <option value="GQ">Guinea Ecuatorial</option>  
      <option value="GW">Guinea-Bissau</option>  
      <option value="HT">Haití</option>  
      <option value="HN">Honduras</option>  
      <option value="HU">Hungría</option>  
      <option value="IN">India</option>  
      <option value="ID">Indonesia</option>  
      <option value="IQ">Irak</option>  
      <option value="IR">Irán</option>  
      <option value="IE">Irlanda</option>  
      <option value="BV">Isla Bouvet</option>  
      <option value="CX">Isla de Christmas</option>  
      <option value="IS">Islandia</option>  
      <option value="KY">Islas Caimán</option>  
      <option value="CK">Islas Cook</option>  
      <option value="CC">Islas de Cocos o Keeling</option>  
      <option value="FO">Islas Faroe</option>  
      <option value="HM">Islas Heard y McDonald</option>  
      <option value="FK">Islas Malvinas</option>  
      <option value="MP">Islas Marianas del Norte</option>  
      <option value="MH">Islas Marshall</option>  
      <option value="UM">Islas menores de Estados Unidos</option>  
      <option value="PW">Islas Palau</option>  
      <option value="SB">Islas Salomón</option>  
      <option value="SJ">Islas Svalbard y Jan Mayen</option>  
      <option value="TK">Islas Tokelau</option>  
      <option value="TC">Islas Turks y Caicos</option>  
      <option value="VI">Islas Vírgenes (EE.UU.)</option>  
      <option value="VG">Islas Vírgenes (Reino Unido)</option>  
      <option value="WF">Islas Wallis y Futuna</option>  
      <option value="IL">Israel</option>  
      <option value="IT">Italia</option>  
      <option value="JM">Jamaica</option>  
      <option value="JP">Japón</option>  
      <option value="JO">Jordania</option>  
      <option value="KZ">Kazajistán</option>  
      <option value="KE">Kenia</option>  
      <option value="KG">Kirguizistán</option>  
      <option value="KI">Kiribati</option>  
      <option value="KW">Kuwait</option>  
      <option value="LA">Laos</option>  
      <option value="LS">Lesotho</option>  
      <option value="LV">Letonia</option>  
      <option value="LB">Líbano</option>  
      <option value="LR">Liberia</option>  
      <option value="LY">Libia</option>  
      <option value="LI">Liechtenstein</option>  
      <option value="LT">Lituania</option>  
      <option value="LU">Luxemburgo</option>  
      <option value="MK">Macedonia, Ex-República Yugoslava de</option>  
      <option value="MG">Madagascar</option>  
      <option value="MY">Malasia</option>  
      <option value="MW">Malawi</option>  
      <option value="MV">Maldivas</option>  
      <option value="ML">Malí</option>  
      <option value="MT">Malta</option>  
      <option value="MA">Marruecos</option>  
      <option value="MQ">Martinica</option>  
      <option value="MU">Mauricio</option>  
      <option value="MR">Mauritania</option>  
      <option value="YT">Mayotte</option>  
      <option value="MX">México</option>  
      <option value="FM">Micronesia</option>  
      <option value="MD">Moldavia</option>  
      <option value="MC">Mónaco</option>  
      <option value="MN">Mongolia</option>  
      <option value="MS">Montserrat</option>  
      <option value="MZ">Mozambique</option>  
      <option value="NA">Namibia</option>  
      <option value="NR">Nauru</option>  
      <option value="NP">Nepal</option>  
      <option value="NI">Nicaragua</option>  
      <option value="NE">Níger</option>  
      <option value="NG">Nigeria</option>  
      <option value="NU">Niue</option>  
      <option value="NF">Norfolk</option>  
      <option value="NO">Noruega</option>  
      <option value="NC">Nueva Caledonia</option>  
      <option value="NZ">Nueva Zelanda</option>  
      <option value="OM">Omán</option>  
      <option value="NL">Países Bajos</option>  
      <option value="PA">Panamá</option>  
      <option value="PG">Papúa Nueva Guinea</option>  
      <option value="PK">Paquistán</option>  
      <option value="PY">Paraguay</option>  
      <option value="PE">Perú</option>  
      <option value="PN">Pitcairn</option>  
      <option value="PF">Polinesia Francesa</option>  
      <option value="PL">Polonia</option>  
      <option value="PT">Portugal</option>  
      <option value="PR">Puerto Rico</option>  
      <option value="QA">Qatar</option>  
      <option value="UK">Reino Unido</option>  
      <option value="CF">República Centroafricana</option>  
      <option value="CZ">República Checa</option>  
      <option value="ZA">República de Sudáfrica</option>  
      <option value="DO">República Dominicana</option>  
      <option value="SK">República Eslovaca</option>  
      <option value="RE">Reunión</option>  
      <option value="RW">Ruanda</option>  
      <option value="RO">Rumania</option>  
      <option value="RU">Rusia</option>  
      <option value="EH">Sahara Occidental</option>  
      <option value="KN">Saint Kitts y Nevis</option>  
      <option value="WS">Samoa</option>  
      <option value="AS">Samoa Americana</option>  
      <option value="SM">San Marino</option>  
      <option value="VC">San Vicente y Granadinas</option>  
      <option value="SH">Santa Helena</option>  
      <option value="LC">Santa Lucía</option>  
      <option value="ST">Santo Tomé y Príncipe</option>  
      <option value="SN">Senegal</option>  
      <option value="SC">Seychelles</option>  
      <option value="SL">Sierra Leona</option>  
      <option value="SG">Singapur</option>  
      <option value="SY">Siria</option>  
      <option value="SO">Somalia</option>  
      <option value="LK">Sri Lanka</option>  
      <option value="PM">St. Pierre y Miquelon</option>  
      <option value="SZ">Suazilandia</option>  
      <option value="SD">Sudán</option>  
      <option value="SE">Suecia</option>  
      <option value="CH">Suiza</option>  
      <option value="SR">Surinam</option>  
      <option value="TH">Tailandia</option>  
      <option value="TW">Taiwán</option>  
      <option value="TZ">Tanzania</option>  
      <option value="TJ">Tayikistán</option>  
      <option value="TF">Territorios franceses del Sur</option>  
      <option value="TP">Timor Oriental</option>  
      <option value="TG">Togo</option>  
      <option value="TO">Tonga</option>  
      <option value="TT">Trinidad y Tobago</option>  
      <option value="TN">Túnez</option>  
      <option value="TM">Turkmenistán</option>  
      <option value="TR">Turquía</option>  
      <option value="TV">Tuvalu</option>  
      <option value="UA">Ucrania</option>  
      <option value="UG">Uganda</option>  
      <option value="UY">Uruguay</option>  
      <option value="UZ">Uzbekistán</option>  
      <option value="VU">Vanuatu</option>  
      <option value="VE">Venezuela</option>  
      <option value="VN">Vietnam</option>  
      <option value="YE">Yemen</option>  
      <option value="YU">Yugoslavia</option>  
      <option value="ZM">Zambia</option>  
      <option value="ZW">Zimbabue</option> 
    </select>
    <br><br>
    Fecha nacimiento:<br><br>
    <input type="date" name="fecha" id="fecha" required>
    <br><br>
    Institución:<br><br>
    <input type="text" name="institucion" id="institucion" required>
    <br><br>
    Estudios:<br><br>
    <select name="estudios" >
      <option value="Primaria">Primaria</option>
      <option value="Secundaria">Secundaria</option>
      <option value="Pregrado">Pregrado</option>
      <option value="Posgrado">Posgrado</option>
      <option value="Maestria">Maestria</option>
      <option value="Doctorado">Doctorado</option>
    </select>
    <br><br>
    Tipo Usuario:<br><br>
    <select name="tipoUsuario" id="TipoUsuario" placeholder="alguien@example.com" required>

      <?php
      $sql = "SELECT id_tipo_usuario, nombre FROM tipo_usuario";
      if ($perfil == 1) {
        $sql .= " WHERE id_tipo_usuario = 1";
      }
      if ($perfil == 2) {
        $sql .= " WHERE id_tipo_usuario = 2 ";
      }
      $arreglo_rol = $objDatos->executeQuery($sql);
      if ($arreglo_rol ) {
       foreach ($arreglo_rol as $value) {
        echo '<option value="'.$value['id_tipo_usuario'].'" selected>'.$value['nombre'].'</option>';
      }
    }else{
     echo '<option>NO HAY VALORES</option>';
   }
   ?>
 </select><br><br>
 Tipo Need:<br><br>
 <select name="tipoNeed" id="TipoNeed" placeholder="alguien@example.com" required>

  <?php
  $sql = "SELECT id_need, nombre FROM need";
  if ($perfil == 1) {
    $sql .= " WHERE id_tipo_usuario = 1";
  }
  if ($perfil == 2) {
    $sql .= " WHERE id_tipo_usuario = 2 ";
  }
  if ($perfil == 3) {
    $sql .= " WHERE id_tipo_usuario = 3 ";
  }
  $arreglo_rol = $objDatos->executeQuery($sql);
  if ($arreglo_rol) {
   foreach ($arreglo_rol as $value) {
    echo '<option value="'.$value['id_need'].'"selected>'.$value['nombre'].'</option>';
  }
}else{
 echo '<option>NO HAY VALORES</option>';
}
?>
</select><br><br>

Nombre Usuario:<br><br>
<input type="text" id="Usuario" name="Usuario" required><br><br>
Contraseña:<br><br>
<input type="Password" name="Clave" id="clave" required><br><br>
<input type="submit" value="REGISTRARSE"><br>

</form>
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
<script>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-24775009-1']);
    _gaq.push(['_trackPageview']);
    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
 <script src="./vendor/js/highlight.pack.js"></script>
  <script>
    hljs.initHighlightingOnLoad();
  </script>

</body>
</html>
<script language="javascript"> 
$("#Usuario").change(function(){
  $.ajax({
    type: "POST",
    url: "verificarUsuario.php",
    data: { name: this.value}
  })
  .done(function( msg ) {
    if(msg == 1){
      alert("El usuario "+$("#Usuario").val()+" ya existe");
      $("#Usuario").val('')
      $("#Usuario").focus()
    }
  });
})
</script>
<?php
    $objDatos->cerrarConexion();
?>