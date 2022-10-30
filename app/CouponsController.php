<?php
include_once "config.php";
include_once "AuthController.php";

if($_SESSION['acceso']=="acceso"){
    if (isset($_POST['action'])) {

        if ( isset($_POST['global_token']) && 
            $_POST['global_token'] == $_SESSION['global_token']) {

            switch ($_POST['action']) {
                
                case 'nuevoCupon':
                    
                    $couponsController = new CouponsController();

                    $name = strip_tags($_POST['name']);
                    $code = strip_tags($_POST['code']);
                    $percetage_discount = strip_tags($_POST['percetage_discount']);
                    $amount_discount = strip_tags($_POST['amount_discount']);
                    $min_amount_required = strip_tags($_POST['min_amount_required']);
                    $min_product_required = strip_tags($_POST['min_product_required']);
                    $start_date = strip_tags($_POST['start_date']);
                    $end_date = strip_tags($_POST['end_date']);
                    $max_uses = strip_tags($_POST['max_uses']);
                    $count_uses = strip_tags($_POST['count_uses']);
                    $valid_only_first_purchase = strip_tags($_POST['valid_only_first_purchase']);
                    $status = strip_tags($_POST['status']);

                    $couponsController->newCoupon($name,$code,$percetage_discount,$amount_discount,$min_amount_required,$min_product_required,$start_date,$end_date,$max_uses,$count_uses,$valid_only_first_purchase,$status);

                break;
                case 'editarCupon':
                    $couponsController = new CouponsController();

                    $name = strip_tags($_POST['name']);
                    $code = strip_tags($_POST['code']);
                    $percetage_discount = strip_tags($_POST['percetage_discount']);
                    $amount_discount = strip_tags($_POST['amount_discount']);
                    $min_amount_required = strip_tags($_POST['min_amount_required']);
                    $min_product_required = strip_tags($_POST['min_product_required']);
                    $start_date = strip_tags($_POST['start_date']);
                    $end_date = strip_tags($_POST['end_date']);
                    $max_uses = strip_tags($_POST['max_uses']);
                    $count_uses = strip_tags($_POST['count_uses']);
                    $valid_only_first_purchase = strip_tags($_POST['valid_only_first_purchase']);
                    $status = strip_tags($_POST['status']);
                    $id = strip_tags($_POST['id']);

                    $couponsController->editCoupon($name,$code,$percetage_discount,$amount_discount,$min_amount_required,$min_product_required,$start_date,$end_date,$max_uses,$count_uses,$valid_only_first_purchase,$status,$id);

                break;
                case 'eliminarCupon':
                    $couponsController = new CouponsController();

                    $id = strip_tags($_POST['id']);

                    $couponsController->deleteCoupon($id);
                break;
            }

        }
    }


    Class CouponsController{

    //Cupones
        public function getCoupons()
            {

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons',
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
    //Busqueda de cupones por su id Coupons
        public function cupon($id)
        {

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons/'.$id,
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

                header("Location:".BASE_PATH."cupones/");
            }else{
                #var_dump($response);
                header("Location:".BASE_PATH."?error=true");
            }

        }
    //Nueva Coupon
        public function newCoupon($name,$code,$percetage_discount,$amount_discount,$min_amount_required,$min_product_required,$start_date,$end_date,$max_uses,$count_uses,$valid_only_first_purchase,$status)
        {

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'name' => $name,
                    'code' => $code,
                    'percentage_discount' => $percetage_discount,
                    'amount_discount' => $amount_discount,
                    'min_amount_required' => $min_amount_required,
                    'min_product_required' => $min_product_required,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'max_uses' => $max_uses,
                    'count_uses' => $count_uses,
                    'valid_only_first_purchase' => $valid_only_first_purchase,
                    'status' => $status),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer '.$_SESSION['token']
                ),
            ));

            $response = curl_exec($curl); 
            curl_close($curl);
            $response = json_decode($response);

            if ( isset($response->code) && $response->code > 0) {

                header("Location:".BASE_PATH."cupones/");
            }else{
                #var_dump($response);
                header("Location:".BASE_PATH."?error=true");
            }

        }

    //Editar Cupones
        public function editCoupon($name,$code,$percetage_discount,$amount_discount,$min_amount_required,$min_product_required,$start_date,$end_date,$max_uses,$count_uses,$valid_only_first_purchase,$status,$id)
        {

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'PUT',
                CURLOPT_POSTFIELDS => 
                'name=cupon%20OP%2020%25'.$name.'&code='.$code.'&percentage_discount='.$percetage_discount.
                '&amount_discount='.$amount_discount.'&min_amount_required='.$min_amount_required.
                '&min_product_required='.$min_product_required.'&start_date='.$start_date.'&end_date='.$end_date.
                '&max_uses='.$max_uses.'&count_uses='.$count_uses.'&valid_only_first_purchase='.$valid_only_first_purchase.
                '&status='.$status.'&id='.$id,
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer '.$_SESSION['token'],
                    'Content-Type: application/x-www-form-urlencoded'
                ),
            ));

            $response = curl_exec($curl); 
            curl_close($curl);
            $response = json_decode($response);

            if ( isset($response->code) && $response->code > 0) {

                header("Location:".BASE_PATH."cupones/");
            }else{
                #var_dump($response);
                header("Location:".BASE_PATH."?error=true");
            }

        }
    //Eliminar Cupones
        public function deleteCoupon($id)
        {

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons/'.$id,
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

                header("Location:".BASE_PATH."cupones/");
            }else{
                #var_dump($response);
                header("Location:".BASE_PATH."?error=true");
            }

        }

    }
}else{
	header("Location:".BASE_PATH."iniciar-sesion/");
}

?>