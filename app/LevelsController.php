<?php
include_once "config.php";
include_once "AuthController.php";

if($_SESSION['acceso']=="acceso"){
	if (isset($_POST['action'])) {

		if ( isset($_POST['global_token']) && 
			$_POST['global_token'] == $_SESSION['global_token']) {

			switch ($_POST['action']) {
				
				case 'nuevaLevel':
					
					$levelsController = new LevelsController();

					$name = strip_tags($_POST['name']);
					$percentage_discount = strip_tags($_POST['percentage_discount']);

					$levelsController->newLevel($name,$percentage_discount);

				break;
				case 'editarLevel':
					$levelsController = new LevelsController();

					$id = strip_tags($_POST['id']);
					$name = strip_tags($_POST['name']);
					$percentage_discount = strip_tags($_POST['percentage_discount']);
					

					$levelsController->editLevel($id,$name,$percentage_discount);
				break;
				case 'eliminarLevel':
					$levelsController = new LevelsController();

					$id = strip_tags($_POST['id']);

					$levelsController->deleteLevel($id);
				break;
			}

		}
	}
	Class LevelsController
	{
	//Todos los levels
		public function getLevels()
		{
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/levels',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer '.$_SESSION['token']
			),
			));

			$response = curl_exec($curl); 
			curl_close($curl);
			$response = json_decode($response);

			if ( isset($response->code) && $response->code > 0) {
				
				return $response->data;
			}else{

				return array();
			}
		}
	//Busqueda de level por su id Levels
		public function idLevel($id)
		{
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/levels'.$id,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer '.$_SESSION['token']
			),
			));

			$response = curl_exec($curl); 
			curl_close($curl);
			$response = json_decode($response);

			if ( isset($response->code) && $response->code > 0) {
				
				return $response->data;
			}else{

				return array();
			}
		}
	//Nuevo Level
	public function newLevel($name,$percentage_discount)
	{

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/levels',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => array('name' => $name,'percentage_discount' => $percentage_discount),
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer '.$_SESSION['token']
			),
		));

		$response = curl_exec($curl); 
		curl_close($curl);
		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {

			header("Location:".BASE_PATH."productos");
		}else{
			#var_dump($response);
			header("Location:".BASE_PATH."?error=true");
		}

	}

	//Editar Level
	public function editLevel($id,$name,$percentage_discount)
	{

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/levels',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'PUT',
			CURLOPT_POSTFIELDS => 'id='.$id.'&name='.$name.'&percentage_discount='.$percentage_discount,
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer '.$_SESSION['token'],
			'Content-Type: application/x-www-form-urlencoded'
			),
		));

		$response = curl_exec($curl); 
		curl_close($curl);
		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {

			header("Location:".BASE_PATH."productos");
		}else{
			#var_dump($response);
			header("Location:".BASE_PATH."?error=true");
		}

	}
	//Eliminar Level
	public function deleteBrand($id)
	{

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/levels/'.$id,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'DELETE',
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer '.$_SESSION['token']
			),
		));

		$response = curl_exec($curl); 
		curl_close($curl);
		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {

			header("Location:".BASE_PATH."productos");
		}else{
			#var_dump($response);
			header("Location:".BASE_PATH."?error=true");
		}

	}

	}
}else{
	header("Location:".BASE_PATH."iniciar-sesion");
}

?>