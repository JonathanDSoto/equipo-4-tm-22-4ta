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
                                <img src="#" alt="user-img" class="img-thumbnail rounded-circle" />
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col">
                            <div class="p-2">
                                <h3 class="text-white mb-1">{{Nombre}}</h3>
                                <p class="text-white-75">{{rol}}</p>
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
                                                                    <td class="text-muted">{{nombre}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Numero celular :</th>
                                                                    <td class="text-muted">{{Numero celular}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Correo electrónico :</th>
                                                                    <td class="text-muted">{{Email}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Rol</th>
                                                                    <td class="text-muted">{{Rol}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Creado por:</th>
                                                                    <td class="text-muted">{{Creado por:}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Fecha de creación</th>
                                                                    <td class="text-muted">{{Fecha de creación}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Fecha de actualización</th>
                                                                    <td class="text-muted">{{Fecha de actualización}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
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
    <script src="<?= BASE_PATH?>public/libs/swiper/swiper-bundle.min.js"></script>

    <!-- profile init js -->
    <script src="<?= BASE_PATH?>public/js/pages/profile.init.js"></script>

</body>


</html>