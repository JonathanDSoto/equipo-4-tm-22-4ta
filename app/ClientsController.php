<?php  
include_once "config.php";

if (isset($_POST['action'])) {

	if ( isset($_POST['global_token']) && 
		$_POST['global_token'] == $_SESSION['global_token']) {

		switch ($_POST['action']) {
			case 'crearCliente':
				
				$name = strip_tags($_POST['name']);
				$email = strip_tags($_POST['email']);
				$password = strip_tags($_POST['password']);
				$phone_number = strip_tags($_POST['phone_number']);
                $is_suscribed = strip_tags($_POST['is_suscribed']);
				$level_id = strip_tags($_POST['level_id']);

				$clientsController = new ClientsController();

				$clientsController->createCliente($name,$email,$password,$phone_number,$is_suscribed,$level_id);
				 
			break; 

			case 'actualizarCliente':
				
				$name = strip_tags($_POST['name']);
				$email = strip_tags($_POST['email']);
				$password = strip_tags($_POST['password']);
				$phone_number = strip_tags($_POST['phone_number']);
				$level_id = strip_tags($_POST['level_id']);
                $id = strip_tags($_POST['id']);


				$clientsController = new ClientsController();

				$clientsController->updateCliente($name,$email,$password,$phone_number,$level_id,$id);
				 
			break;

			case 'eliminarCliente':

				$clientsController = new ClientsController();

				echo json_encode($clientsController->removeCliente($_POST['id']));
			break; 
		}

	}
}

Class ClientsController
{
// Todos los clientes
	public function getClientes()
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
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
//Busqueda de cliente por su id
public function idCliente($id)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients/'.$id,
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

//Crear una cliente
	public function createCliente($name,$email,$password,$phone_number,$is_suscribed,$level_id)
	{
 
		$curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'phone_number' => $phone_number,
            'is_suscribed' => $is_suscribed,
            'level_id' => $level_id),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$_SESSION['token']
            ),
          ));

		$response = curl_exec($curl); 
		curl_close($curl);
		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {

			header("Location:..".BASE_PATH."clientes/success");
		}else{ 
			#var_dump($response);
			header("Location:..".BASE_PATH."clientes/error");
		}

	}
//Actualizar una cliente
	public function updateCategoria($name,$email,$password,$phone_number,$level_id,$id)
	{

		$curl = curl_init();
        
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'PUT',
		  CURLOPT_POSTFIELDS => 'name='.$name.'&email='.$email.'&password='.$password.'&phone_number='.$phone_number.'&level_id='.$level_id.'&id='.$id,
		  CURLOPT_HTTPHEADER => array(
		    'Authorization: Bearer '.$_SESSION['token'],
		    'Content-Type: application/x-www-form-urlencoded'
		  ),
		));

		$response = curl_exec($curl); 
		curl_close($curl);
		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {

			header("Location:..".BASE_PATH."clientes/success");
		}else{ 

			#var_dump($response);
			header("Location:..".BASE_PATH."clientes/error");
		}

	}
//Eliminar una cliente
	public function removeCliente($id)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients/'.$id,
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
			return true;
		}else{
			return false;
		}
	}
}


?>