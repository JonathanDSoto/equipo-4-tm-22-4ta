<?php
include_once "config.php";

if (isset($_POST['action'])) {

	if ( isset($_POST['global_token']) && 
		$_POST['global_token'] == $_SESSION['global_token']) {

		switch ($_POST['action']) {
            case 'usuario':
                $usersController = new UsersController();

                $id = strip_tags($_POST['id']);

				$usersController->usuario($id);
            break;
			case 'nuevoUsuario':
				
				$usersController = new UsersController();

                $name = strip_tags($_POST['name']);
				$lastname = strip_tags($_POST['lastname']);
				$email = strip_tags($_POST['email']);
				$phone_number = strip_tags($_POST['phone_number']);
				$created_by = strip_tags($_POST['created_by']);
				$role = strip_tags($_POST['role']);
				$password = strip_tags($_POST['password']);

				$usersController->newUsuario($name,$lasname,$email,$phone_number,$created_by,$role,$password);

			break;
            case 'editarUsuario':
                $usersController = new UsersController();

                $name = strip_tags($_POST['name']);
				$lastname = strip_tags($_POST['lastname']);
				$email = strip_tags($_POST['email']);
				$phone_number = strip_tags($_POST['phone_number']);
				$created_by = strip_tags($_POST['created_by']);
				$role = strip_tags($_POST['role']);
				$password = strip_tags($_POST['password']);
                $id = strip_tags($_POST['id']);

				$usersController->editUsuario($name,$lasname,$email,$phone_number,$created_by,$role,$password,$id);
            break;
            case 'eliminarUsuario':
                $usersController = new UsersController();

                $id = strip_tags($_POST['id']);

				$usersController->deleteUsuario($id);
            break;
            case 'editarFotoPerfil':
                $usersController = new UsersController();

                $id = strip_tags($_POST['id']);

				$usersController->editFotoPerfil($id);
            break;
		}

	}
}


Class UsersController{
    
//Usuarios
    public function getUsuarios()
        {

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer '.$_SESSION['token'],
                    'Cookie: XSRF-TOKEN=eyJpdiI6InZJODdRZEI1THlaVElCSi9VRElycnc9PSIsInZhbHVlIjoiRy82S2xtT2Q2cklKekNWYWlDMjFLb1htOFF
                    LQ3hQeGNNK0J0ZXdLayt3K1dlYUl4SXh5a2VTaW05a1NDRC9WalFOaE4zWmpuT2I0VjcxeVJIS1JndG1UUFI0YUhPU1dSd3BaUkJqRmJtOXZJZHR
                    wdGhhbkJQaHR2WTRwMUwzU2siLCJtYWMiOiIzYzA5Y2UyMzJmOGVmYzgzYTcxNWQ0M2M1MGM5ZmYxMzgxZTI0NWQ0YmVhNThmZTlkMTc0YjNjN2I
                    0YmZkMGY2IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6Ilc5eDFtb0Y5VFNxVUJnQ0o0K0thbmc9PSIsInZhbHVlIjoiTEFZd2s0Ylg
                    wTDJFMnNuRUpiNjhNYVpYUjN4QnpSV3FWYjd2NFE3SEZuUmdyaDBqWWs5K2JPczNRblB1ZHJFYmJLcmhIN1NkbXVaU0tUNHBjS0Q4R0Nnam5BQngr
                    KzJ1SHBvOWhtK2F5amM4QUZOMjNuSUZXNllKaG1ReXBnOWgiLCJtYWMiOiIzN2ZhMDUzM2VlN2E4NWE4MjJiZWMwMDMyMWFkYmQ3NmVmNzkxMWFkN
                    GE2YzllZjdhNTYwZTMzZGUyZmJjN2E5IiwidGFnIjoiIn0%3D'
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
//Nuevo Usuario
	public function newUsuario($name,$lasname,$email,$phone_number,$created_by,$role,$password)
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
            'name' => $name,
            'lastname' => $lasname,
            'email' => $email,
            'phone_number' => $phone_number,
            'created_by' => $created_by,
            'role' => $role,
            'password' => $password,
            'profile_photo_file'=> new CURLFILE($_FILES['profile_photo_file']['tmp_name'])),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$_SESSION['token'],
                'Cookie: XSRF-TOKEN=eyJpdiI6InU0QldtVU8vYVhKOThMOTJQZmVtb3c9PSIsInZhbHVlIjoiVVdPbXdQeks4b0xmYVhsdTJpRGpzTHBjSE5qT2lMVTRDSi91M0tmQlhy
                U2x2c3B4TVE1TFlPZXBRUUV2SEdsV01JTlBCdHVmNUszZnJTUXVTMXhrRGs5aG9sWFJvWERPQUdWb0VvYXUzK0wrZTlVeXdMY0NMcFpvY0JtbDBFaVAiLCJtYWMiOiJiZWIz
                YTVmOTZmZTJjZGFiY2E3OGE1YzhlNDc0NjlmY2JjNDRmMWY3MjYxMWE5MTkwMzhlZGY5ZjkwYjY3OGZlIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6InU3cm9kR
                Dhnb3Z6STUzbWVRUlVOeXc9PSIsInZhbHVlIjoiaUljL0lqQkRBeXR1TmpPdGNCYTNKc1J2N0gvSWhRV3pkajdmd2xsc1FFK1pVVWNHT2V1S0h5WGdhendCcndWbGVmd3lDdEh
                3QU0yLytVbmJlUUFoeE9QR3JmUjB0YitXWm15Q1U3ZkVnTlB6T3pCQUhjeTdHM3Zwb1RrWm9GQmciLCJtYWMiOiJiOTk5YzAxMWQ0MzkyYmNjMWEwM2FkOWI1Y2U1MDFhMjdjY
                jczMGFjMTdhZWIxODNmYmUyYTE4ZTcyYWZlMjkxIiwidGFnIjoiIn0%3D'
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
//Busqueda de usuario por su id Usuario
    public function usuario($id)
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users/'.$id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$_SESSION['token'],
                'Cookie: XSRF-TOKEN=eyJpdiI6InU0QldtVU8vYVhKOThMOTJQZmVtb3c9PSIsInZhbHVlIjoiVVdPbXdQeks4b0xmYVhsd
                TJpRGpzTHBjSE5qT2lMVTRDSi91M0tmQlhyU2x2c3B4TVE1TFlPZXBRUUV2SEdsV01JTlBCdHVmNUszZnJTUXVTMXhrRGs5aG9s
                WFJvWERPQUdWb0VvYXUzK0wrZTlVeXdMY0NMcFpvY0JtbDBFaVAiLCJtYWMiOiJiZWIzYTVmOTZmZTJjZGFiY2E3OGE1YzhlNDc0
                NjlmY2JjNDRmMWY3MjYxMWE5MTkwMzhlZGY5ZjkwYjY3OGZlIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6InU3cm9k
                RDhnb3Z6STUzbWVRUlVOeXc9PSIsInZhbHVlIjoiaUljL0lqQkRBeXR1TmpPdGNCYTNKc1J2N0gvSWhRV3pkajdmd2xsc1FFK1pV
                VWNHT2V1S0h5WGdhendCcndWbGVmd3lDdEh3QU0yLytVbmJlUUFoeE9QR3JmUjB0YitXWm15Q1U3ZkVnTlB6T3pCQUhjeTdHM3Zwb
                1RrWm9GQmciLCJtYWMiOiJiOTk5YzAxMWQ0MzkyYmNjMWEwM2FkOWI1Y2U1MDFhMjdjYjczMGFjMTdhZWIxODNmYmUyYTE4ZTcyYWZlMjkxIiwidGFnIjoiIn0%3D'
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
//Editar Usuario
    public function editUsuario($name,$lasname,$email,$phone_number,$created_by,$role,$password,$id)
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 
            'name='.$name.'&lastname='.$lasname.'&email='.$email.'&phone_number='.$phone_number.'&created_by='.$created_by.'&role='.$role.'&password='.$password.'&id='.$id,
            CURLOPT_HTTPHEADER => array(
              'Authorization: Bearer '.$_SESSION['token'],
              'Content-Type: application/x-www-form-urlencoded',
              'Cookie: XSRF-TOKEN=eyJpdiI6IjlZa1VPZXU5TytYK3hobjhzN2ZTOGc9PSIsInZhbHVlIjoiRC9VNG9VRDI1ZW9
              YcXpSUW5LbWxmeGJOOEo0NVloeVhFZTlTS0FNSE1acU1iYkd0SzhiWGJUUi9xNjdnOFJhclVTMFA3RzgzMlNWbVRkcG
              F6VjAxV1kzWm9FNW5sRHM2UWZiVURMUHptTmJBdTUwQ3p5cWdKRVl3VVo4d1hmc08iLCJtYWMiOiJiMTZkYzdlNDNiNT
              2MjZmYjhkODY4Njk2ZDY3OWEyZmQyZTkzNmI2YThmMTA1Njc2ZmU5ODY1ZmNiZTlhMDZlIiwidGFnIjoiIn0%3D; 
              laravel_session=eyJpdiI6Ilg0R2dEOW8vMStSTDl3WWM5bzYvREE9PSIsInZhbHVlIjoiMStOOEV3bjExeEVmcDNxeDZPaX
              VudTl3UFlrVDNHenJsUjM1d3p5czRremxLMWlRcm9iQWgrM3lESlRVMzNWZTBGMVRSRkY2Y3htZDk3cXJvZzIrNEZCZ0Q0c3RE
              YnhLUyt1QmNIdWlSVXI3ZTIyQjFVNG1NQjE2dlM3YldIbTgiLCJtYWMiOiJiN2VhMmExMGI3OTdiMDg4NDBlNzQzODMyYjQxZTk
              wYmEyNWJmMTk1OGJhMjcxMDk0ZTA2ZDM4NDlhYjZkMzM4IiwidGFnIjoiIn0%3D'
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
//Eliminar Usuario
    public function deleteUsuario($id)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users/'.$id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$_SESSION['token'],
                'Cookie: XSRF-TOKEN=eyJpdiI6IjlZa1VPZXU5TytYK3hobjhzN2ZTOGc9PSIsInZhbHVlIjoiRC9VNG9VRDI1ZW9YcXpSUW5
                LbWxmeGJOOEo0NVloeVhFZTlTS0FNSE1acU1iYkd0SzhiWGJUUi9xNjdnOFJhclVTMFA3RzgzMlNWbVRkcGF6VjAxV1kzWm9FNW5
                sRHM2UWZiVURMUHptTmJBdTUwQ3p5cWdKRVl3VVo4d1hmc08iLCJtYWMiOiJiMTZkYzdlNDNiNTM2MjZmYjhkODY4Njk2ZDY3OWEy
                ZmQyZTkzNmI2YThmMTA1Njc2ZmU5ODY1ZmNiZTlhMDZlIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6Ilg0R2dEOW8vMS
                tSTDl3WWM5bzYvREE9PSIsInZhbHVlIjoiMStOOEV3bjExeEVmcDNxeDZPaXVudTl3UFlrVDNHenJsUjM1d3p5czRremxLMWlRcm9i
                QWgrM3lESlRVMzNWZTBGMVRSRkY2Y3htZDk3cXJvZzIrNEZCZ0Q0c3REYnhLUyt1QmNIdWlSVXI3ZTIyQjFVNG1NQjE2dlM3YldIbTg
                iLCJtYWMiOiJiN2VhMmExMGI3OTdiMDg4NDBlNzQzODMyYjQxZTkwYmEyNWJmMTk1OGJhMjcxMDk0ZTA2ZDM4NDlhYjZkMzM4IiwidGFnIjoiIn0%3D'
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
//Editar foto de perfil
    public function editFotoPerfil($id)
    {

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users/avatar',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('id' => $id,'profile_photo_file'=> new CURLFILE($_FILES['profile_photo_file']['tmp_name'])),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$_SESSION['token'],
                'Cookie: XSRF-TOKEN=eyJpdiI6InBrSUhaSi9qcXR3VTFWYUt1NjJaK0E9PSIsInZhbHVlIjoic1lJYXlicDAwUmIwQmxCSTVCbWFua3IvcG1hNFBZRklyclR
                1ay94aE1ldGxYczh5RHNWYmlORUVYNVdybkk3eEh1YzN4RUtqUzgwcnZxMGhrVDEvNnd3WWUvMXlEM1p1dUNwYkRaTXhpZ3JSYkwrMFJUdzZ2ZTg5anZ0ZEV3NT
                UiLCJtYWMiOiIzNDhkODEyOTQxNWRhYzc2YTlkYzViN2E1ZWE3YjBkOWZjNzA0ZDFjMDZlOGYxMmZlNzMxNDEzNmEzZGRhZGVmIiwidGFnIjoiIn0%3D; laravel
                _session=eyJpdiI6IjV4ZjhHdG1zNXdOMVpXY0N3THZhZEE9PSIsInZhbHVlIjoiV1loazJhRkUrT0gybG9Jb1V1bGxPeGJhV1pwOGw1UklGd2lYNENzS0dBSzZER
                HlYeDZQQlRGTTNRS2FBK3RSaWY5YnRXNmZjSjNKbDlBQmV6RnlxSnpPcCtWK3BIN1NKYVVSbE0vVHpFTTk5MU15VTgwNWFlNWFtL1l6TUdTa0wiLCJtYWMiOiIyOThm
                YzczODNlODliMjg2YTMwNDU1OTQxYWE4Mzc5ODM3YTk5OTYyZWQyYWNjNzg2ZjVlMmQxOTI3MWYwNGIyIiwidGFnIjoiIn0%3D'
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
}


?>