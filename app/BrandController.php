<?php
include_once "config.php";
if (isset($_POST['action'])) {

	if ( isset($_POST['global_token']) && 
		$_POST['global_token'] == $_SESSION['global_token']) {

		switch ($_POST['action']) {
            
			case 'nuevaBrand':
				
				$brandController = new BrandController();

                $name = strip_tags($_POST['name']);
				$description = strip_tags($_POST['description']);
				$slug = strip_tags($_POST['slug']);

				$brandController->newBrand($name,$description,$slug);

			break;
            case 'editarBrand':
                $brandController = new BrandController();

                $name = strip_tags($_POST['name']);
				$description = strip_tags($_POST['description']);
				$slug = strip_tags($_POST['slug']);
                $id = strip_tags($_POST['id']);

				$brandController->editBrand($name,$description,$slug,$id);
            break;
            case 'eliminarBrand':
                $brandController = new BrandController();

                $id = strip_tags($_POST['id']);

				$brandController->deleteBrand($id);
            break;
		}

	}
}

Class BrandController 
{
//Todos los brands
	public function getBrands()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands',
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
//Busqueda de brand por su id Brand
public function brand($id)
{

	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands/'.$id,
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

		header("Location:".BASE_PATH."productos");
	}else{
		#var_dump($response);
		header("Location:".BASE_PATH."?error=true");
	}

}
//Nueva Brand
public function newBrand($name,$description,$slug)
{

	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => array(
			'name' => $name,
			'description' => $description,
			'slug' => $slug),
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

//Editar Brand
public function editBrand($name,$description,$slug,$id)
{

	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'PUT',
		CURLOPT_POSTFIELDS => 'name='.$name.'&description='.$description.'&slug='.$slug.'&id='.$id,
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
//Eliminar Brand
public function deleteBrand($id)
{

	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands/'.$id,
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

?>