<?php
include_once "config.php";
include_once "AuthController.php";

if($_SESSION['acceso']=="acceso"){
    if (isset($_POST['action'])) {

        if ( isset($_POST['global_token']) && 
            $_POST['global_token'] == $_SESSION['global_token']) {

            switch ($_POST['action']) {
                
                case 'nuevaEtiqueta':
                    
                    $tagsController = new TagsController();

                    $name = strip_tags($_POST['name']);
                    $description = strip_tags($_POST['description']);
                    $slug = strip_tags($_POST['slug']);

                    $tagsController->newTags($name,$description,$slug);

                break;
                case 'editarEtiqueta':
                    $tagsController = new TagsController();

                    $name = strip_tags($_POST['name']);
                    $description = strip_tags($_POST['description']);
                    $slug = strip_tags($_POST['slug']);
                    $id = strip_tags($_POST['id']);

                    $tagsController->editTags($name,$description,$slug,$id);
                break;
                case 'eliminarEtiqueta':
                    $tagsController = new TagsController();

                    $id = strip_tags($_POST['id']);

                    $tagsController->deleteTags($id);
                break;
            }

        }
    }
}else{
    header("Location:".BASE_PATH."iniciar-sesion/");
}

Class TagsController{

    //Etiquetas
        public function getTags()
            {

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://crud.jonathansoto.mx/api/tags',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer '.$_SESSION['token'],
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
    //Busqueda de etiquetas por su id Tags
        public function etiqueta($id)
        {

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/tags/'.$id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$_SESSION['token'],
                ),
            ));

            $response = curl_exec($curl); 
            curl_close($curl);
            $response = json_decode($response);

            if ( isset($response->code) && $response->code > 0) {

                header("Location:".BASE_PATH."catalogos/tags");
            }else{
                #var_dump($response);
                header("Location:".BASE_PATH."?error=true");
            }

        }
    //Nueva Tags
        public function newTags($name,$description,$slug)
        {

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/tags',
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

                header("Location:".BASE_PATH."catalogos/tags");
            }else{
                #var_dump($response);
                header("Location:".BASE_PATH."?error=true");
            }

        }

    //Editar Etiqueta
        public function editTags($name,$description,$slug,$id)
        {

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/tags',
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

                header("Location:".BASE_PATH."catalogos/tags");
            }else{
                #var_dump($response);
                header("Location:".BASE_PATH."?error=true");
            }

        }
    //Eliminar Etiqueta
        public function deleteTags($id)
        {

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/tags/'.$id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'DELETE',
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer '.$_SESSION['token'],
                ),
            ));

            $response = curl_exec($curl); 
            curl_close($curl);
            $response = json_decode($response);

            if ( isset($response->code) && $response->code > 0) {

                header("Location:".BASE_PATH."catalogos/tags");
            }else{
                #var_dump($response);
                header("Location:".BASE_PATH."?error=true");
            }

        }

    }
?>