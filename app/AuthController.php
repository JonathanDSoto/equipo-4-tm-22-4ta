<?php
include_once "config.php";

if (isset($_POST['action'])) {

	if ( isset($_POST['global_token']) && 
		$_POST['global_token'] == $_SESSION['global_token']) {

		switch ($_POST['action']) {
			case 'access':
				
				$authController = new AuthController();


				$email = strip_tags($_POST['email']);
				$password = strip_tags($_POST['password']);

				$authController->login($email,$password);

			break; 
			case 'registro':
				$authController = new AuthController();

				$name = strip_tags($_POST['name']);
				$lastname = strip_tags($_POST['lastname']);
				$email = strip_tags($_POST['email']);
				$phone_number = strip_tags($_POST['phone_number']);
				$created_by = strip_tags($_POST['created_by']);
				$role = strip_tags($_POST['role']);
				$password = strip_tags($_POST['password']);
				
				$authController->registroUser($name,$lastname,$email,$phone_number,$created_by,$role,$password);
			break;
			case 'cerrarSesion':
				$authController = new AuthController();


				$email = strip_tags($_POST['email']);

				$authController->logout($email);
			break;
		}

	}
}

//Iniciar sesion
Class AuthController{

	public function login($email,$password)
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => array(
		  	'email' => $email,
		  	'password' => $password
		  ),
		));

		$response = curl_exec($curl); 
		curl_close($curl);
		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {

			$_SESSION['id']= $response->data->id;
			$_SESSION['name']= $response->data->name;
			$_SESSION['lastname']= $response->data->lastname;
			$_SESSION['email']= $response->data->email;
			$_SESSION['phone_number']= $response->data->phone_number;
			$_SESSION['created_by']= $response->data->created_by;
			$_SESSION['role']= $response->data->role;
			$_SESSION['avatar']= $response->data->avatar;
			$_SESSION['token']= $response->data->token;

			header("Location:".BASE_PATH."productos");
		}else{
			#var_dump($response);
			header("Location:".BASE_PATH."?error=true");
		}

	}

	//Registro de usuario (crear cuenta)
	public function registroUser($name,$lastname,$email,$phone_number,$created_by,$role,$password)
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/register',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => array('name' => $name,'lastname' => $lastname,'email' => $email,
			'phone_number' => $phone_number,'created_by' => $created_by,'role' => $role,'password' => $password,
			'profile_photo_file'=> new CURLFILE('/C:/Users/jsoto/Downloads/avatar.jpg')),
		));
		$response = curl_exec($curl); 
		curl_close($curl);
		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {

			$_SESSION['id']= $response->data->id;
			$_SESSION['name']= $response->data->name;
			$_SESSION['lastname']= $response->data->lastname;
			$_SESSION['email']= $response->data->email;
			$_SESSION['phone_number']= $response->data->phone_number;
			$_SESSION['created_by']= $response->data->created_by;
			$_SESSION['role']= $response->data->role;
			$_SESSION['avatar']= $response->data->avatar;
			$_SESSION['token']= $response->data->token;

			header("Location:".BASE_PATH."productos");
		}else{
			#var_dump($response);
			header("Location:".BASE_PATH."?error=true");
		}

	}
	//Cerrar sesion
	public function logout($email){
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/logout',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => array('email' => 'jsoto@uabcs.mx'),
			CURLOPT_HTTPHEADER => array(
			  'Authorization: Bearer 49|Fe0K8JKVeW2hzY9103KmWvpCNebEkfchDuMjQrkS'
			),
		  ));
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/logout',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => array('email' => $email),
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer '.$_SESSION['token']
			),
		  ));
		$response = curl_exec($curl); 
		curl_close($curl);
		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {
			header("Location:".BASE_PATH."iniciar-sesion");
		}else{
			#var_dump($response);
			header("Location:".BASE_PATH."?error=true");
		}
	}
}











?>