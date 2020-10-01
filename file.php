<?php 

$mysqli = new mysqli("localhost", "root", "", "clase");

 
if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}else{
	switch ($_POST["operacion"]) {
		case 'insertar':
			$sentencia = $mysqli->prepare("insert into datos(email,contraseña,fecha_nac)values(?,?,?)");
			$sentencia->bind_param("sss",$_POST["correo"],$_POST["contra"],$_POST["fecha"]);
			$sentencia->execute();
			break;
		case 'consultar':
			$consulta = $mysqli->prepare("select * from datos");
		    $consulta->execute();
		    $resultadosConsulta = $consulta->get_result();
		    
		    $email = array();

    
		    foreach ($resultadosConsulta as $indice => $fila)
		    {
		        array_push($email, $fila["email"]);
		    }
		    foreach ($resultadosConsulta as $indice => $fila)
		    {
		        array_push($email, $fila["contraseña"]);
		    }
		    foreach ($resultadosConsulta as $indice => $fila)
		    {
		        array_push($email, $fila["fecha_nac"]);
		    }

		    echo json_encode( $email);
		break;
	}
}
$mysqli->close();

?>