<?php 
	
include_once "config.php";
include_once "connectionController.php";

if (isset($_POST['action'])) {

	$userController = new UserController();

	switch ($_POST['action']) {
		case 'store':
			$name = strip_tags($_POST['name']);
			$last = strip_tags($_POST['last']);
			$email = strip_tags($_POST['email']);
			$pass = strip_tags($_POST['pass']); 

			$userController->store($name,$last,$email,$pass);

		break;
		case 'update': 
			$name = strip_tags($_POST['name']);
			$last = strip_tags($_POST['last']);
			$email = strip_tags($_POST['email']);
			$pass = strip_tags($_POST['pass']);
			$id = strip_tags($_POST['id']);

			$userController->update($name,$last,$email,$pass,$id); 
		break; 
		case 'remove':
			$id = strip_tags($_POST['id']);

			echo json_encode($userController->remove($id)); 
		break;
	}
}

class UserController 
{
	
	function get()
	{
		$conn = connect();
		if (!$conn->connect_error) {
			
			//armado de la consulta
			$query = "select * from user";
			$prepared_query = $conn->prepare($query);
			$prepared_query->execute();

			$results = $prepared_query->get_result();
			$users = $results->fetch_all(MYSQLI_ASSOC);

			return $users;

		}else{
			return array();
		}
	}

	function store($name,$last,$email,$pass){
		$conn = connect();
		if (!$conn->connect_error) {
			if($name!="" && $last!="" && $email!="" && $pass!=""){

				$query = "insert into user (name,lastname,email,password) values (?,?,?,?)";
				$prepared_query = $conn->prepare($query);
				$prepared_query->bind_param('ssss',$name,$last,$email,$pass);
				if ($prepared_query->execute()) {

					$_SESSION['message'] = "Registro creado exitosamente";
					$_SESSION['status'] = "success";
					header("Location: ".$_SERVER['HTTP_REFERER']);
					
				}else{
					$_SESSION['message'] = "El registro no pudo ser completado";
					$_SESSION['status'] = "error";
					header("Location: ".$_SERVER['HTTP_REFERER']);
				}

			}else{
				$_SESSION['message'] = "Verifique la información";
				$_SESSION['status'] = "error";
				header("Location: ".$_SERVER['HTTP_REFERER']);
			}
		}else{
			$_SESSION['message'] = "Problemas con la conexión al servidor";
			$_SESSION['status'] = "error";
			header("Location: ".$_SERVER['HTTP_REFERER']);
		}
	}

	function update($name,$last,$email,$pass,$id){
		$conn = connect();
		if (!$conn->connect_error) {
			if($name!="" && $last!="" && $email!="" && $pass!="" && $id!=""){
				 
				$query = "update user set name = ?, lastname = ?, email = ?, password = ? where id = ?";
				$prepared_query = $conn->prepare($query);
				$prepared_query->bind_param('ssssi',$name,$last,$email,$pass,$id);
				if ($prepared_query->execute()) {

					$_SESSION['message'] = "Registro actualizado exitosamente";
					$_SESSION['status'] = "success";
					header("Location: ".$_SERVER['HTTP_REFERER']);
					
				}else{
					$_SESSION['message'] = "El proceso no pudo ser completado";
					$_SESSION['status'] = "error";
					header("Location: ".$_SERVER['HTTP_REFERER']);
				}

			}else{
				$_SESSION['message'] = "Verifique la información";
				$_SESSION['status'] = "error";
				header("Location: ".$_SERVER['HTTP_REFERER']);
			}
		}else{
			$_SESSION['message'] = "Problemas con la conexión al servidor";
			$_SESSION['status'] = "error";
			header("Location: ".$_SERVER['HTTP_REFERER']);
		}
	}

	function remove($id){
		$conn = connect();
		if (!$conn->connect_error) {
			if($id!=""){
				 
				$query = "delete from user where id = ?";
				$prepared_query = $conn->prepare($query);
				$prepared_query->bind_param('i',$id);

				if ($prepared_query->execute()) {
					$response = array(
						"status" => "success",
						"message" => "Usuario eliminado correctamente",
					);
					return $response;
				}else{
					$response = array(
						"status" => "error",
						"message" => "Ocurrió un error durante el proceso",
					);
					return $response;
				}

			}else{
				$response = array(
					"status" => "error",
					"message" => "Verifique la información",
				);
				return $response;
			}
		}else{
			$response = array(
				"status" => "error",
				"message" => "Problemas con la conexión al servidor",
			);
			return $response; 
		}
	}
}

?>