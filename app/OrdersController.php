<?php
include_once "config.php";
include_once "AuthController.php";

if($_SESSION['acceso']=="acceso"){

	if (isset($_POST['action'])) {
	
		if ( isset($_POST['global_token']) && 
			$_POST['global_token'] == $_SESSION['global_token']) {
	
			switch ($_POST['action']) {
				case 'crearOrden':
					
					$folio = strip_tags($_POST['folio']);
					$total = strip_tags($_POST['total']);
					$is_paid = strip_tags($_POST['is_paid']);
					$client_id = strip_tags($_POST['client_id']);
					$address_id = strip_tags($_POST['address_id']);
					$order_status_id = strip_tags($_POST['order_status_id']);
					$payment_type_id = strip_tags($_POST['payment_type_id']);
					$coupon_id = strip_tags($_POST['coupon_id']);
					$presentationsUno = strip_tags($_POST['presentationsUno']);
					$presentationsDos = strip_tags($_POST['presentationsDos']);
					$presentationsTres = strip_tags($_POST['presentationsTres']);
					$presentationsCuatro = strip_tags($_POST['presentationsCuatro']);

					$ordersController = new OrdersController();
	
					$ordersController->createOrdenes($folio,$total,$is_paid,$client_id,$address_id,$order_status_id,$payment_type_id,$coupon_id,$presentationsUno,$presentationsDos,$presentationsTres,$presentationsCuatro);
					
				break; 
	
				case 'actualizarOrden':
					
					
					$id = strip_tags($_POST['id']);
					$order_status_id = strip_tags($_POST['order_status_id']);
	
					$ordersController = new OrdersController();
	
					$ordersController->updateOrdenes($id,$order_status_id);
					
				break;
	
				case 'eliminarOrden':
	
					$ordersController = new OrdersController();
	
					echo json_encode($ordersController->removeOrdenes($_POST['id']));
				break; 
			}
	
		}
	}

}else{
	header("Location:".BASE_PATH."iniciar-sesion/");
}

Class OrdersController
{
		// Todos los ordenes
			public function getOrdenes()
			{

				$curl = curl_init();
				curl_setopt_array($curl, array(
					CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders',
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
		// Todos los ordenes por date
		public function getOrdenesDate($dateUno,$dateDos)
		{
			curl_setopt_array($curl, array(
				CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders/'.$dateUno.'/'.$dateDos,
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
		//Busqueda de ordenes por su id
		public function idOrdenes($id)
			{
				$curl = curl_init();

				curl_setopt_array($curl, array(
				CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders/'.$id,
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

		//Crear una ordenes
			public function createOrdenes($folio,$total,$is_paid,$client_id,$address_id,$order_status_id,$payment_type_id,$coupon_id,$presentationsUno,$presentationsDos,$presentationsTres,$presentationsCuatro)
			{
				curl_setopt_array($curl, array(
					CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders',
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => '',
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 0,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => 'POST',
					CURLOPT_POSTFIELDS => array(
						'folio' => $folio,
						'total' => $total,
						'is_paid' => $is_paid,
						'client_id' => $client_id,
						'address_id' => $address_id,
						'order_status_id' => $order_status_id,
						'payment_type_id' => $payment_type_id,
						'coupon_id' => $coupon_id,
						'presentations[0][id]' => $presentationsUno,
						'presentations[0][quantity]' => $presentationsDos,
						'presentations[1][id]' => $presentationsTres,
						'presentations[1][quantity]' => $presentationsCuatro),
					CURLOPT_HTTPHEADER => array(
						'Authorization: Bearer '.$_SESSION['token']
					),
				  ));

				$response = curl_exec($curl); 
				curl_close($curl);
				$response = json_decode($response);

				if ( isset($response->code) && $response->code > 0) {

					header("Location:".BASE_PATH."ordenes/");
				}else{ 
					#var_dump($response);
					header("Location:".BASE_PATH."?error=true");
				}

			}
		//Actualizar una ordenes
			public function updateOrdenes($id,$order_status_id)
			{

				$curl = curl_init();
				curl_setopt_array($curl, array(
					CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders',
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => '',
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 0,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => 'PUT',
					CURLOPT_POSTFIELDS => 'id='.$id.'&order_status_id='.$order_status_id,
					CURLOPT_HTTPHEADER => array(
						'Authorization: Bearer '.$_SESSION['token'],
					  'Content-Type: application/x-www-form-urlencoded'
					),
				  ));

				$response = curl_exec($curl); 
				curl_close($curl);
				$response = json_decode($response);

				if ( isset($response->code) && $response->code > 0) {

					header("Location:".BASE_PATH."ordenes/");
				}else{ 

					header("Location:".BASE_PATH."?error=true");
				}

			}
		//Eliminar una ordenes
			public function removeOrdenes($id)
			{
				$curl = curl_init();

				curl_setopt_array($curl, array(
				CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders/'.$id,
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
					header("Location:".BASE_PATH."ordenes/");
				}else{ 
					header("Location:".BASE_PATH."?error=true");
				}
			}
}
?>