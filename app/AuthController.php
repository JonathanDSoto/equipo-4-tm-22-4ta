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
			case 'passwordRecuperado':
				$authController = new AuthController();


				$email = strip_tags($_POST['email']);

				$authController->forgotPassword($email);
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
			$_SESSION['avatar']= $response->data->avatar;
			$_SESSION['token']= $response->data->token;

			header("Location:".BASE_PATH."products");
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
			$_SESSION['avatar']= $response->data->avatar;
			$_SESSION['token']= $response->data->token;

			header("Location:".BASE_PATH."products");
		}else{
			#var_dump($response);
			header("Location:".BASE_PATH."?error=true");
		}

	}
	//Recuperar contraseña
	public function forgotPassword($email){
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/forgot-password',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => array('email' => $email),
			CURLOPT_HTTPHEADER => array(
			  'Cookie: XSRF-TOKEN=eyJpdiI6IlJ4U29JTXBpWGZwMWpja3pGc3p2Y3c9PSIsInZhbHVlIjoic0hxSU51ZUcvdFpCc1o4S3JMcTVHRStad2YvWE9XQnEwQ3FreDU4e
			  DZ4Y041UktaU2ZJaGsxcEdCbUhGL0RncW9ZVWJ6UG5Da0FaOFZRVEhxbGk4THZpNEdLSnk1WEFRcjZmbmx3dVFIQjV0Rll2d0F5cXR1a0VaaFhTWmx4TW0iLCJtYWMiOi
			  I2ZDJmNzI0ZTVkZjQwNzFmN2Y5M2UyNjM3MWRkOWI3ZGU5MTJmNjJiZTgzZTgyNGQxZmYxYWU2ZWU4YmExYTUxIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6
			  Im5LN2o4S1dVb1h6RkJpRXRJOHFqRmc9PSIsInZhbHVlIjoiSHMrTjBNelU1aFZuWGJjcTJDbkFMVFhlZjE3L3R2UDJkSnhDRlJkREVYMUd1UE1ydGw5bTIvckN4NHpvemV
			  lNlpja2RoNzVBVG1VY1BEWm11QzZGcTlIYjNOdTJyUXFhb0wveUtEVytiNFlXazlmMFNaSnJaSzJJSTVRY21LNXYiLCJtYWMiOiI0ZjUzY2Q0MTY1YTkwMjg2ZjRkMjNlZW
			  UwOTc5NjRiYzYxZGQxNjI3MTJiMDljOTQ0YmYzZjk4M2FkMWMzMTk3IiwidGFnIjoiIn0%3D'
			),
		  ));
		$response = curl_exec($curl); 
		curl_close($curl);
		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {
			header("Location:".BASE_PATH."products");
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
			CURLOPT_POSTFIELDS => array('email' => $email),
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer '.$_SESSION['token'],
				'Cookie: XSRF-TOKEN=eyJpdiI6IlJ4U29JTXBpWGZwMWpja3pGc3p2Y3c9PSIsInZhbHVlIjoic0hxSU51ZUcvdFpCc1o4S3JMcTVHRStad2YvWE9XQnEwQ3FreD
				U4eDZ4Y041UktaU2ZJaGsxcEdCbUhGL0RncW9ZVWJ6UG5Da0FaOFZRVEhxbGk4THZpNEdLSnk1WEFRcjZmbmx3dVFIQjV0Rll2d0F5cXR1a0VaaFhTWmx4TW0iLCJtY
				WMiOiI2ZDJmNzI0ZTVkZjQwNzFmN2Y5M2UyNjM3MWRkOWI3ZGU5MTJmNjJiZTgzZTgyNGQxZmYxYWU2ZWU4YmExYTUxIiwidGFnIjoiIn0%3D; laravel_session=ey
				JpdiI6Im5LN2o4S1dVb1h6RkJpRXRJOHFqRmc9PSIsInZhbHVlIjoiSHMrTjBNelU1aFZuWGJjcTJDbkFMVFhlZjE3L3R2UDJkSnhDRlJkREVYMUd1UE1ydGw5bTIvckN4
				NHpvemVlNlpja2RoNzVBVG1VY1BEWm11QzZGcTlIYjNOdTJyUXFhb0wveUtEVytiNFlXazlmMFNaSnJaSzJJSTVRY21LNXYiLCJtYWMiOiI0ZjUzY2Q0MTY1YTkwMjg2ZjRkMjN
				lZWUwOTc5NjRiYzYxZGQxNjI3MTJiMDljOTQ0YmYzZjk4M2FkMWMzMTk3IiwidGFnIjoiIn0%3D'
			),
		  ));
		$response = curl_exec($curl); 
		curl_close($curl);
		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {
			header("Location:".BASE_PATH);
		}else{
			#var_dump($response);
			header("Location:".BASE_PATH."?error=true");
		}
	}
}











?>