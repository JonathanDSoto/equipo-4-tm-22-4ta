<?php 
    include_once "../app/config.php";
    include '..\app\UsersController.php';
    $usuarios = new UsersController();
    $data = $usuarios->getUsuarios();
    $ID_user_editar_foto;
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
    <div class="main-content">
        <?php include '../layouts/bread.templete.php'?>
            
            <button class="btn btn-success ms-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                    <?php foreach($data as $user):?>
                        <tr>
                            
                            <td><a href="#" class="fw-semibold"><?PHP echo $user->id; ?></a></td>
                            <td>                            
                                <div class="d-flex gap-2 align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="<?= $user->avatar; ?>" alt="avatar" class="avatar-xs rounded-circle" />
                                    </div>
                                    <div class="flex-grow-1">
                                    <?PHP echo $user->name; ?>
                                    </div>
                                </div>
                            </td>
                            <td><?PHP echo $user->lastname; ?></td>
                            <!-- <td class="text-danger"><i class="ri-close-circle-line fs-17 align-middle">Cancel</i></td> -->
                            <td><?PHP echo $user->email; ?></td>
                            <td>
                                <?php
                                    if ($user->phone_number == null) {
                                        echo "No Disponible";
                                    } else {
                                        echo $user->phone_number; 
                                    }
                                ?>
                            </td>
                            <td><?PHP echo $user->created_by; ?></td>
                            <td><?PHP echo $user->role; ?></td>
                            <td><?PHP echo $user->created_at; ?></td>
                            <td><?PHP echo $user->updated_at; ?></td>
                            <td class="text-center row">
                                <div class="col row-cols-12">
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal">
                                        <i class="mdi mdi-pencil"></i>
                                        <?= $user->id ?>
                                    </button>
                                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editPhotoModal">
                                        <i class="mdi mdi-camera-flip"></i>
                                        <input type="hidden" name="id_usuario" value="<?= $ID_user_editar_foto = $user->id; ?>">
                                    </button>
                                    
                                    <form method="POST" action="<?= BASE_PATH ?>Controlador-usuarios">
                                        <button type="submit" class="btn btn-danger">
                                            <i class="mdi mdi-trash-can-outline"></i>
                                            <input type="hidden" name="action" action="eliminarUsuario" value="eliminarUsuario">
                                            <input type="hidden" name="id" value="<?= $user->id; ?>">

                                            <input type="hidden" name="global_token" value="<?= $_SESSION['global_token'] ?>">
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <!-- end table -->
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
    <!-- Modal de crear -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Crear usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div id="form"></div>
                    <form enctype="multipart/form-data" method="POST" action="<?= BASE_PATH ?>Controlador-usuarios" >
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Nombre</span>
                            <input type="text" class="form-control" placeholder="Nombre" aria-label="Username" aria-describedby="basic-addon1" name="name">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Apellidos</span>
                            <input type="text" class="form-control" placeholder="Apellidos" aria-label="Username" aria-describedby="basic-addon1" name="lastname">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Email</span>
                            <input type="text" class="form-control" placeholder="example@example.com" aria-label="Username" aria-describedby="basic-addon1" name="email">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Numero</span>
                            <input type="text" class="form-control" placeholder="Numero" aria-label="Username" aria-describedby="basic-addon1" name="phone_number">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Creado por:</span>
                            <input type="text" class="form-control" placeholder="Creado por" aria-label="Username" aria-describedby="basic-addon1" name="created_by">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Rol</span>
                            <input type="text" class="form-control" placeholder="Rol" aria-label="Username" aria-describedby="basic-addon1" name="role">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Contraseña</span>
                            <input type="password" class="form-control" placeholder="******" aria-label="Username" aria-describedby="basic-addon1" name="password">
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="profile_photo_file" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Guardar</button>
                            <input type="hidden" name="action" action="nuevoUsuario" value="nuevoUsuario">
                            <input type="hidden" name="global_token" value="<?= $_SESSION['global_token'] ?>">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal editar -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= BASE_PATH ?>Controlador-usuarios">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Nombre</span>
                            <input type="text" class="form-control" placeholder="Nombre" aria-label="Username" aria-describedby="basic-addon1" name="name" value="<?= $user->name; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Apellidos</span>
                            <input type="text" class="form-control" placeholder="Apellidos" aria-label="Username" aria-describedby="basic-addon1" name="lastname" value="<?= $user->lastname; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Email</span>
                            <input type="text" class="form-control" placeholder="example@example.com" aria-label="Username" aria-describedby="basic-addon1" name="email" value="<?= $user->email; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Numero</span>
                            <input type="text" class="form-control" placeholder="Numero" aria-label="Username" aria-describedby="basic-addon1" name="phone_number" value="<?= $user->phone_number; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Creado por:</span>
                            <input type="text" class="form-control" placeholder="Creado por" aria-label="Username" aria-describedby="basic-addon1" name="created_by" value="<?= $user->created_by; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Rol</span>
                            <input type="text" class="form-control" placeholder="Rol" aria-label="Username" aria-describedby="basic-addon1" name="role" value="<?= $user->role; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Contraseña</span>
                            <input type="password" class="form-control" placeholder="******" aria-label="Username" aria-describedby="basic-addon1" name="password">
                        </div>
                        

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Guardar</button>
                            <input type="hidden" name="action" action="editarUsuario" value="editarUsuario">
                            <input type="hidden" name="id" value="<?= $user->id ?>">
                            <input type="hidden" name="global_token" value="<?= $_SESSION['global_token'] ?>">
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
                            <?php 
                            echo $ID_user_editar_foto;
                            ?>
                            <input type="hidden" name="action" action="editarFotoPerfil" value="editarFotoPerfil">
                            <input type="hidden" name="id" value="<?= $user->id; ?>">
                            <input type="hidden" name="global_token" value="<?= $_SESSION['global_token'] ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <?php include '../layouts/scripts.template.php' ?>
    <!-- swiper js -->
    <script src="assets/libs/swiper/swiper-bundle.min.js"></script>

    <!-- profile init js -->
    <script src="assets/js/pages/profile.init.js"></script>

</body>


</html>



