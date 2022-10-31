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
    <div class="main-content">
        <div class="page-content mb-n5">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Cupones</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
            </div>
            <!-- container-fluid -->
        </div>
        
            <a href="add-cupons.php" class="btn btn-success ms-5">
                Crear cupón
                <i class="mdi mdi-plus-thick"></i>
            </a>
            <div class="table-responsive mx-5 mb-3 table-light">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Codigo</th>
                            <th scope="col">Descuento</th>
                            <th scope="col">Monto descuento</th>
                            <th scope="col">Min. Monto</th>
                            <th scope="col">Min. productos</th>
                            <th scope="col">Dia de alta</th>
                            <th scope="col">Dia de baja</th>
                            <th scope="col">Usos maximos</th>
                            <th scope="col">Veces usadas</th>
                            <th scope="col">Solo primera compra</th>
                            <th scope="col">Status</th>
                            <th scope="col">Tipo descuento</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="#" class="fw-semibold">{{user.id}}</a></td>
                            <td>                            
                                <div class="d-flex gap-2 align-items-center">
                                    <div class="flex-grow-1">
                                    {{name}}
                                    </div>
                                </div>
                            </td>
                            <td>{{code}}</td>
                            <!-- <td class="text-danger"><i class="ri-close-circle-line fs-17 align-middle">Cancel</i></td> -->
                            <td>{{discount}}</td>
                            <td>{{10}}</td>
                            <td>{{min amount}}</td>
                            <td>{{min products}}</td>
                            <td>{{2022-10-27}}</td>
                            <td>{{2022-10-27}}</td>
                            <td>{{max uses}}</td>
                            <td>{{uses}}</td>
                            <td><span class="badge text-bg-success">Si</span><span class="badge text-bg-danger">No</span></td>
                            <td><span class="badge text-bg-success">Activo</span><span class="badge text-bg-danger">Inactivo</span></td>
                            <td>{{cupón de descuento}}</td>
                            <td class="text-center row">
                                <div class="col row-cols-12">
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="mdi mdi-pencil"></i>
                                    </button>
                                    <form method="POST" action="<?= BASE_PATH ?>Controlador-usuarios">
                                        <button type="submit" class="btn btn-danger">
                                            <i class="mdi mdi-trash-can-outline"></i>
                                            <input type="hidden" name="action">
                                            <input type="hidden" name="id" value="">

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
            <nav aria-label="...">
                <ul class="pagination justify-content-end me-5">
                    <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                    </li>
                    
                    <li class="page-item">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item active" aria-current="page">
                        <a class="page-link" href="#">2</a>
                    </li>
                    
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
            <!-- Modal de editar -->
        <div class="modal flip" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title " id="exampleModalLabel">Editar cupón</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" method="POST" action="<?= BASE_PATH ?>Controlador-usuarios" >
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Nombre</span>
                                <input type="text" class="form-control" placeholder="cupon OP 20%" aria-label="Username" aria-describedby="basic-addon1" >
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Codigo</span>
                                <input type="text" class="form-control" placeholder="20PERCEN22" aria-label="Username" aria-describedby="basic-addon1" >
                                
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Porcentaje de descuento</span>
                                <input type="number" class="form-control" placeholder="20" aria-label="Username" aria-describedby="basic-addon1" name="phone_number" >
                               
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Monto de descuento</span>
                                <input type="number" class="form-control" placeholder="1000" aria-label="Username" aria-describedby="basic-addon1" name="email" >
                                
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Monto minimo</span>
                                <input type="number" class="form-control" placeholder="1000" aria-label="Username" aria-describedby="basic-addon1" name="created_by" >
                                
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Minimo de productos</span>
                                <input type="number" class="form-control" placeholder="10" aria-label="Username" aria-describedby="basic-addon1" name="role" >
                                
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Día de alta</span>
                                <input class=" form-control" type="date" name="" value="2018-07-22" style="color: #1D1D1D; font-size: 14px; border:1px solid #ECF0F1; background-color: white; width:100px">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Día de baja</span>
                                <input class=" form-control" type="date" name="" value="2018-07-22" style="color: #1D1D1D; font-size: 14px; border:1px solid #ECF0F1; background-color: white; width:100px">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Máximo de usos</span>
                                <input type="number" class="form-control" placeholder="100" aria-label="Username" aria-describedby="basic-addon1" >
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Veces usado</span>
                                <input type="number" class="form-control" placeholder="0" aria-label="Username" aria-describedby="basic-addon1" >
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Tipo de cupón</span>
                                <select class="form-control" id="">
                                    <option value=""><--Selecciona una opción--></option>
                                    <option value="Cupon de descuento">Cupon de descuento</option>
                                    <option value="Cupon de descuento fijo">Cupon de descuento fijo</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <h5 class="ms-1">Solo para uso de primera compra</h5>
                                        <div class="w-100"></div>
                                        <div class="form-check form-check-inline ms-1">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1">Si</label>
                                        </div>
                                        <div class="form-check form-check-inline ms-1">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <h5 class="ms-1" id="basic-addon1">Status del cupón de descuento</h5>
                                        <div class="w-100"></div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1">Activo</label>
                                        </div>
                                        <div class="form-check form-check-inline ms-1">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1">Inactivo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success">Guardar</button>
                                <input type="hidden" name="action">
                                <input type="hidden" name="global_token" value="<?= $_SESSION['global_token'] ?>">
                                <input type="hidden" name="id" >
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
</body>


</html>



