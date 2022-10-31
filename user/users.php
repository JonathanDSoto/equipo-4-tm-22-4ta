<?php 
    include_once "../app/config.php";
    include '..\app\UsersController.php';
    $usuarios = new UsersController();
    $data = $usuarios->getUsuarios();
    #var_dump($data);
?> 

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<head>

    <?php include '../layouts/head.template.php' ?>

    <!-- swiper css -->
    <link rel="stylesheet" href="<?= BASE_PATH ?>/libs/swiper/swiper-bundle.min.css">



</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?php include '../layouts/nav.template.php'?>
    </div>
    <!-- ========== App Menu ========== -->
    
    <?php include '../layouts/sidebar.template.php' ?>
    
    <div class="vertical-overlay"></div>
    
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content" id="app">
        <div class="page-content mb-n5">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Usuarios</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active">Usuarios</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
            </div>
            <!-- container-fluid -->
        </div>
            
            <button class="btn btn-success ms-5" data-bs-toggle="modal" data-bs-target="#exampleModal" @click="agregarUser">
                Crear usuario
                <i class="mdi mdi-plus-thick"></i>
            </button>
            <div class="table-responsive mx-5 mb-5">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Numero telefonico</th>
                            <th scope="col">Creado por:</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Fecha de creación</th>
                            <th scope="col">Fecha de actualización</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(user, index) in users">
                            
                            <td><a :href="'<?= BASE_PATH?>usuarios/usuario='+user.id" class="fw-semibold">{{user.id}}</a></td>
                            <td>                            
                                <div class="d-flex gap-2 align-items-center">
                                    <div class="flex-shrink-0">
                                        <img :src="user.avatar" alt="avatar" class="avatar-xs rounded-circle" />
                                    </div>
                                    <div class="flex-grow-1">
                                    {{user.name}}
                                    </div>
                                </div>
                            </td>
                            <td>{{user.lastname}}</td>
                            <!-- <td class="text-danger"><i class="ri-close-circle-line fs-17 align-middle">Cancel</i></td> -->
                            <td>{{user.email}}</td>
                            <td>{{user.phone_number ? user.phone_number : "No disponible" }}</td>
                            <td>{{user.created_by}}</td>
                            <td>{{user.role}}</td>
                            <td>{{user.created_at}}</td>
                            <td>{{user.updated_at}}</td>
                            <td class="text-center row">
                                <div class="col row-cols-12">
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" @click="editUser(user)">
                                        <i class="mdi mdi-pencil"></i>
                                    </button>
                                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editPhotoModal" @click="editarFotoUser(user)">
                                        <i class="mdi mdi-camera-flip"></i>
                                    </button>
                                    
                                    <form method="POST" action="<?= BASE_PATH ?>Controlador-usuarios">
                                        <button type="submit" class="btn btn-danger" @click="alertaEliminar">
                                            <i class="mdi mdi-trash-can-outline"></i>
                                            <input type="hidden" name="action" action="eliminarUsuario" value="eliminarUsuario">
                                            <input type="hidden" name="id" :value="user.id">

                                            <input type="hidden" name="global_token" value="<?= $_SESSION['global_token'] ?>">
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <!-- end table -->
            </div>
            <!-- Modal de crear -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{titulo_modal}}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" method="POST" action="<?= BASE_PATH ?>Controlador-usuarios" >
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Nombre</span>
                                <input type="text" class="form-control" placeholder="Nombre" aria-label="Username" aria-describedby="basic-addon1" name="name" v-if="mostrar_inputs_añadir == true">
                                <input type="text" class="form-control" placeholder="Nombre" aria-label="Username" aria-describedby="basic-addon1" v-if="mostrar_inputs_editar == true" name="name" :value="datos_user.name">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Apellidos</span>
                                <input type="text" class="form-control" placeholder="Apellidos" aria-label="Username" aria-describedby="basic-addon1" name="lastname" v-if="mostrar_inputs_añadir == true">
                                <input type="text" class="form-control" placeholder="Apellidos" aria-label="Username" aria-describedby="basic-addon1" name="lastname" v-if="mostrar_inputs_editar == true" :value="datos_user.lastname">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Email</span>
                                <input type="text" class="form-control" placeholder="example@example.com" aria-label="Username" aria-describedby="basic-addon1" name="email" v-if="mostrar_inputs_añadir == true">
                                <input type="text" class="form-control" placeholder="example@example.com" aria-label="Username" aria-describedby="basic-addon1" name="email" v-if="mostrar_inputs_editar == true" :value="datos_user.email">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Numero</span>
                                <input type="text" class="form-control" placeholder="Numero" aria-label="Username" aria-describedby="basic-addon1" name="phone_number" v-if="mostrar_inputs_añadir == true">
                                <input type="text" class="form-control" placeholder="Numero" aria-label="Username" aria-describedby="basic-addon1" name="phone_number" v-if="mostrar_inputs_editar == true" :value="datos_user.phone_number">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Creado por:</span>
                                <input type="text" class="form-control" placeholder="Creado por" aria-label="Username" aria-describedby="basic-addon1" name="created_by" v-if="mostrar_inputs_añadir == true">
                                <input type="text" class="form-control" placeholder="Creado por" aria-label="Username" aria-describedby="basic-addon1" name="created_by" v-if="mostrar_inputs_editar == true" :value="datos_user.created_by">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Rol</span>
                                <input type="text" class="form-control" placeholder="Rol" aria-label="Username" aria-describedby="basic-addon1" name="role" v-if="mostrar_inputs_añadir == true">
                                <input type="text" class="form-control" placeholder="Rol" aria-label="Username" aria-describedby="basic-addon1" name="role" v-if="mostrar_inputs_editar == true" :value="datos_user.role">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Contraseña</span>
                                <input type="password" class="form-control" placeholder="******" aria-label="Username" aria-describedby="basic-addon1" name="password">
                            </div>
                            <div class="input-group mb-3" v-if="mostrar_añadir_foto == true">
                                <input type="file" class="form-control" name="profile_photo_file" aria-label="Username" aria-describedby="basic-addon1">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success" @click="alertaEditar">Guardar {{btn_guardar_cambios}}</button>
                                <input type="hidden" name="action" :action="accion" :value="accion">
                                <input type="hidden" name="global_token" value="<?= $_SESSION['global_token'] ?>">
                                <input type="hidden" name="id" :value="datos_user.id">

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal editar foto -->
        <div class="modal fade" id="editPhotoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar foto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" method="POST" action="<?= BASE_PATH ?>Controlador-usuarios" >
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="profile_photo_file" aria-label="Username" aria-describedby="basic-addon1">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success">Guardar</button>
                                <input type="hidden" name="action" action="editarFotoPerfil" value="editarFotoPerfil">
                                <input type="hidden" name="id" :value="id_user.id">
                                <input type="hidden" name="global_token" value="<?= $_SESSION['global_token'] ?>">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end table responsive -->
        
        <?php include '../layouts/footer.template.php' ?>    
    
    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    



    <?php include '../layouts/scripts.template.php' ?>
    <!-- swiper js -->
    <script src="assets/libs/swiper/swiper-bundle.min.js"></script>

    <!-- profile init js -->
    <script src="assets/js/pages/profile.init.js"></script>

    <!-- Vue js -->
    <script src="https://unpkg.com/vue@3"></script>

    <!--SweetAlert-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--script vue -->
    <script>
            const { createApp } = Vue
            const app = createApp({
                data(){
                    return {

                        users: <?php echo json_encode($data);?>,
                        datos_user: {id: "",nombre: "", apellido: "", correo: "", numero: "", creado: "", rol: ""},
                        titulo_modal: "",
                        accion: "",
                        mostrar_añadir_foto: true,
                        id_user: {id: ""},
                        mostrar_inputs_editar: true,
                        mostrar_inputs_añadir: true,
                        btn_guardar_cambios: "",
                    }
                },
                methods:{
                    editUser(user){
                        this.titulo_modal = "Editar usuario";
                        this.datos_user = user;
                        this.accion = "editarUsuario";
                        this.mostrar_añadir_foto = false;
                        this.btn_guardar_cambios = "Cambios";
                        this.mostrar_inputs_editar = true;
                        this.mostrar_inputs_añadir = false;
                    },
                    agregarUser(){
                        this.titulo_modal = "Agregar usuario";
                        this.accion = "nuevoUsuario";   
                        this.mostrar_añadir_foto = true;
                        this.btn_guardar_cambios = "";
                        this.mostrar_inputs_editar = false;
                        this.mostrar_inputs_añadir = true;
                    },
                    editarFotoUser(user){
                        this.id_user = user;
                    },
                    alertaEditar(){
                        Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Cambios Guardados',
                        showConfirmButton: false,
                        timer: 10000
                        })
                    },
                    alertaEliminar(){
                        Swal.fire({
                        position: 'center',
                        icon: 'info',
                        title: 'Usuario Eliminado',
                        showConfirmButton: false,
                        timer: 15000
                        })
                    },
                },
                mounted() {

                },
            }).mount('#app')


        </script>



</body>


</html>



