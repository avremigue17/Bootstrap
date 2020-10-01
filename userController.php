<?php 
	include_once "conectionController.php";

	/**
	 * 
	 */
	class UserController
	{
		
		function get(){
			$conn = connect(){
				if(!$conn->connect_error){
					$query ="select*from users"
					$prepared_query = $conn->prepare($query);
					$prepared_query->execute();

					$results = $prepared_query->get_result();
					$users= $results->fetch_all(MYSQLI_ASSOC);

					return $users
				}else{
					return array();
			}

		}
	}

	function post(){
		
	}
}

?>