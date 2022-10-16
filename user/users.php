<?php 
    include_once "../app/config.php";
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
                        <tr>
                            
                            <td><a href="#" class="fw-semibold">#</a></td>
                            <td>                            
                                <div class="d-flex gap-2 align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="" alt="avatar" class="avatar-xs rounded-circle" />
                                    </div>
                                    <div class="flex-grow-1">
                                        {{Nombre}}
                                    </div>
                                </div>
                            </td>
                            <td>{{Apellidos}}</td>
                            <!-- <td class="text-danger"><i class="ri-close-circle-line fs-17 align-middle">Cancel</i></td> -->
                            <td>{{example@example.com}}</td>
                            <td>{{6121316096}}</td>
                            <td>{{createdBy}}</td>
                            <td>{{admin}}</td>
                            <td>{{15-10-2022}}</td>
                            <td>{{15-10-2022}}</td>
                            <td class="text-center row">
                                <div class="col row-cols-12">
                                    <button class="btn btn-warning">
                                        <i class="mdi mdi-pencil"></i>
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="mdi mdi-trash-can-outline"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Crear usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Nombre</span>
                        <input type="text" class="form-control" placeholder="Nombre" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Apellidos</span>
                        <input type="text" class="form-control" placeholder="Apellidos" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Email</span>
                        <input type="text" class="form-control" placeholder="example@example.com" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Numero</span>
                        <input type="text" class="form-control" placeholder="Numero" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Creado por:</span>
                        <input type="text" class="form-control" placeholder="Creado por" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Rol</span>
                        <input type="text" class="form-control" placeholder="Rol" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Contraseña</span>
                        <input type="password" class="form-control" placeholder="******" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                      <input type="file" class="form-control" name="uploadedfile" aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Gurdar</button>
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



