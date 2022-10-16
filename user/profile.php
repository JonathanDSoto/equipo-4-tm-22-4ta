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

        <div class="page-content mt-m-n5">
            <div class="container-fluid">
                <div class="profile-foreground position-relative mx-n4 mt-n4">
                    <div class="profile-wid-bg">
                        <img src="<?= BASE_PATH ?>public/images/profile-bg.jpg" alt="" class="profile-wid-img" />
                    </div>
                </div>
                <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
                    <div class="row g-4">
                        <div class="col-auto">
                            <div class="avatar-lg">
                                <img src="<?= $_SESSION['avatar'] ?>" alt="user-img" class="img-thumbnail rounded-circle" />
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col">
                            <div class="p-2">
                                <h3 class="text-white mb-1"><?= $_SESSION['name'] ?></h3>
                                <p class="text-white-75"><?= $_SESSION['role'] ?></p>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <div class="tab-content pt-4 text-muted">
                                <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                    <div class="row">
                                        <div class="col-xxl-3">
                                            
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">Información</h5>
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless mb-0">
                                                            <tbody>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Nombre completo :</th>
                                                                    <td class="text-muted"><?= $_SESSION['name'] ?> <?= $_SESSION['lastname'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Numero celular :</th>
                                                                    <td class="text-muted"><?= $_SESSION['phone_number'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Correo electrónico :</th>
                                                                    <td class="text-muted"><?= $_SESSION['email'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Rol</th>
                                                                    <td class="text-muted"><?= $_SESSION['role'] ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <a class="btn btn-success col-12" href="<?= BASE_PATH ?> editar-perfil">Editar Perfil</a>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->

                                        </div>
                                    </div>
                                    
                                    <!--end row-->
                                </div>
                            </div>
                            <!--end tab-content-->
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

            </div><!-- container-fluid -->
        </div><!-- End Page-content -->
        
        <div class="table-responsive mx-5 mb-5">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        
                        <th scope="col">Folio</th>
                        <th scope="col">Nombre cliente</th>
                        <th scope="col">Numero celular</th>
                        <th scope="col">Cupon</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Pagado</th>
                        <th scope="col">Tipo de pago</th>
                        <th scope="col">Total</th>
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
                        <td>{{Numero celular}}</td>
                        <!-- <td class="text-danger"><i class="ri-close-circle-line fs-17 align-middle">Cancel</i></td> -->
                        <td>{{1-0}}</td>
                        <td class="text-success"><i class="ri-checkbox-circle-line fs-17 align-middle"></i>Pagado</td>
                        <td>{{1-0}}</td>
                        <td>{{tipo pago}}</td>
                        <td>$</td>
                        <td class="text-center row">
                            <div class="col row-cols-12">
                                <button class="btn btn-success">
                                    <i class="mdi mdi-plus-thick"></i>
                                </button>
                                <button class="btn btn-warning">
                                    <i class="mdi mdi-pencil"></i>
                                </button>
                                <button class="btn btn-danger">
                                    <i class="mdi mdi-trash-can-outline"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tfoot class="table-light ">
                        <tr>
                            <td colspan="7">Total</td>
                            <td text-end>$</td>
                            <td colspan="4"></td>
                        </tr>
                    </tfoot>
                    
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

    

    

    

    <?php include '../layouts/scripts.template.php' ?>
    <!-- swiper js -->
    <script src="assets/libs/swiper/swiper-bundle.min.js"></script>

    <!-- profile init js -->
    <script src="assets/js/pages/profile.init.js"></script>

</body>


</html>