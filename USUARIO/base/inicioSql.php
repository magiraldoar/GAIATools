
	<?php 
 
	require_once("configuracion/clsBD.php");
	$objDatos = new clsDatos();

	//ES UTILIZdo por crear usuario 
	function crearUsu($idNombre, $idApellido, $idCorreo, $idSexo, $idPais, $idTipo, $idFecha, $idUsuario, $idClave, $institucion, $estudios, $Need){
		$objUsuar = new clsDatos();	


		$sql= "INSERT INTO usuario (usuario, clave, nombre, apellido, correo, sexo, pais, fecha_nacimiento, institucion, id_tipo_usuario, estudios, id_need)

		 VALUES ('$idUsuario', MD5('$idClave'), '$idNombre', '$idApellido',  '$idCorreo', '$idSexo', '$idPais', '$idFecha', '$institucion', '$idTipo', '$estudios', '$Need')";
		$objUsuar->operacionesCrud($sql);
		
	}

	function crearPreguntados($idNombre, $idDescripcion, $idArea, $idAutor){
		$objUsuar = new clsDatos();

		$sql= "INSERT INTO preguntados (nombre, descripcion, area, autor, id_ha)

		 VALUES ('$idNombre', '$idDescripcion', '$idArea', '$idAutor', 1)";
		$objUsuar->operacionesCrud($sql);
		
	}
	function crearPregunta($pregunta, $respuesta){
		$objUsuar = new clsDatos();	
		$sql= "INSERT INTO pregunta (pregunta, respuesta)
		 VALUES ('$pregunta', '$respuesta')";
		$objUsuar->operacionesCrud($sql);
		
	}

	function listarPreguntados(){
	$objUsuar = new clsDatos();
	$sql = "SELECT (nombre,descripcion,area,autor) FROM preguntados";
	$datos = $objUsuar->executeQuery($sql);
	if($datos){#si hay datos entra al condicional si no entonces no entra
		echo "<p>LISTADO DE PREGUNTADOS</p><br>";
		echo "<table id='tabl'>";#estooy creando una tabla para ordenar la vista de los datos
		foreach ($datos as $value){ #esta cargando cada registro
			echo "<tr>";#crea una fila de la tabla
			foreach($value as $field){#accede a cada uno de los atributos de la tupla
				echo "<td>$field</td>";#accede a una celda o a cada una de las columnas de la tabla
			}
			echo "</tr>";#cierra la fila creada en la tabla
		    }
             echo "</table clas=\"celda\"><br><br>";#cierra la tabla
        	}else{
	     	echo "<p>No se encontraron juegos de Preguntados disponibles </p>";
	        }
    }

	function listarCuestionario(){
	$objUsuar = new clsDatos();
	$sql = "SELECT (nombre,descripcion,area,autor) FROM cuestionario";
	$datos = $objUsuar->executeQuery($sql);
	if($datos){#si hay datos entra al condicional si no entonces no entra
		echo "<p>LISTADO DE PREGUNTADOS</p><br>";
		echo "<table id='tabl'>";#estooy creando una tabla para ordenar la vista de los datos
		foreach ($datos as $value){ #esta cargando cada registro
			echo "<tr>";#crea una fila de la tabla
			foreach($value as $field){#accede a cada uno de los atributos de la tupla
				echo "<td>$field</td>";#accede a una celda o a cada una de las columnas de la tabla
			}
			echo "</tr>";#cierra la fila creada en la tabla
		    }
             echo "</table clas=\"celda\"><br><br>";#cierra la tabla
        	}else{
	     	echo "<p>No se encontraron cuestionario</p>";
	        }
    }

function listarlectorTextos(){
	$objUsuar = new clsDatos();
	$sql = "SELECT (nombre,descripcion,area,autor) FROM editor_texto";
	$datos = $objUsuar->executeQuery($sql);
	if($datos){#si hay datos entra al condicional si no entonces no entra
		echo "<p>LISTADO DE PREGUNTADOS</p><br>";
		echo "<table id='tabl'>";#estooy creando una tabla para ordenar la vista de los datos
		foreach ($datos as $value){ #esta cargando cada registro
			echo "<tr>";#crea una fila de la tabla
			foreach($value as $field){#accede a cada uno de los atributos de la tupla
				echo "<td>$field</td>";#accede a una celda o a cada una de las columnas de la tabla
			}
			echo "</tr>";#cierra la fila creada en la tabla
		    }
             echo "</table clas=\"celda\"><br><br>";#cierra la tabla
        	}else{
	     	echo "<p>No se encontraron textos </p>";
	        }
    }
	function crearOpcion($opcion, $idPregunta){
		$objUsuar = new clsDatos();	

		$sql= "INSERT INTO opcion (opcion, id_pregunta)
		 VALUES ('".$opcion."', $idPregunta)";
		$objUsuar->operacionesCrud($sql);

		
	}

	// Elimirna un usuario
	function eliminaUsu($idUsuario){
		$objUsuar = new clsDatos();

		$sql = "DELETE FROM usuario WHERE id_usuario=".$idUsuario;
		$objUsuar->operacionesCrud($sql);
	}

	// ModificarUsuario
	function modUsu($idUsuario, $idNombre, $idApellido, $idCedula, $idDependencia, $idCargo, $idRol ){
		$objUsuar = new clsDatos();	
		
		$sql= "UPDATE usuario SET id_usuario=".$idUsuario;

		if ($idNombre != null) {$sql .= ", nombre='$idNombre'";}
		if ($idApellido != null) {$sql .= ", apellido='$idApellido'";}
		if ($idCedula != null) {$sql .= ", cedula=".$idCedula;}
		if ($idDependencia != null) {$sql .= ", dependencia='$idDependencia'";}
		if ($idCargo != null) {$sql .= ", cargo='$idCargo'";}
		if ($idRol != "Seleccione") {$sql .= ", id_rol_usu=".$idRol;}
		$sql .= " WHERE id_usuario=".$idUsuario;
		$objUsuar->operacionesCrud($sql);

	}
?>
