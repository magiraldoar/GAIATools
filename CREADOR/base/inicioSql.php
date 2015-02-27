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
		$sql= "INSERT INTO preguntados(nombre, descripcion, area, autor, id_ha)
		 VALUES ('$idNombre', '$idDescripcion', '$idArea', '$idAutor', 1)";
		$objUsuar->operacionesCrud($sql);
		
	}
	function crearEditorTextos($idNombre, $idArea, $idDescripcion, $autor){
		$objUsuar = new clsDatos();
		$sql= "INSERT INTO editor_texto(nombre, descripcion, area, autor, id_ha)
		 VALUES ('$idNombre', '$idDescripcion', '$idArea', '$autor', 1)";
		$objUsuar->operacionesCrud($sql);
	}
	function crearCuestionario($idNombre, $idDescripcion, $idArea, $autor){
		$objUsuar = new clsDatos();
		$sql= "INSERT INTO cuestionario(nombre, descripcion, area, autor, id_ha)
		 VALUES ('$idNombre', '$idDescripcion', '$idArea', '$autor', 1)";
		$objUsuar->operacionesCrud($sql);
	}
	function crearPregunta($pregunta, $respuesta, $id_preguntados){
		$objUsuar = new clsDatos();	
		$sql= "INSERT INTO pregunta (pregunta, respuesta, id_preguntados)
		 VALUES ('$pregunta', '$respuesta', $id_preguntados)";
		 echo $sql;
		$objUsuar->operacionesCrud($sql);
		
	}
	function crearPreguntaCuestionario($pregunta, $respuesta, $idTipoPregunta, $id_cuestionario){
		$objUsuar = new clsDatos();	
		$sql= "INSERT INTO pregunta (pregunta, respuesta, id_tipo_pregunta, id_cuestionario)
		 VALUES ('$pregunta', '$respuesta', '$idTipoPregunta', '$id_cuestionario')";
		$objUsuar->operacionesCrud($sql);
		
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