<?php
    include "../app/config.php"
?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<head>

    <?php include "../layouts/head.template.php"?>
    <title>Detalles cupón</title>
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php include "../layouts/nav.template.php"?>
        <?php include "../layouts/sidebar.template.php"?>
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Detalles cupón</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a>Cupones</a></li>
                                        <li class="breadcrumb-item active">Detalle cupón</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="alert alert-success alert-dismissible alert-solid alert-label-icon shadow fade show" role="alert">
                        <i class="ri-check-double-line label-icon"></i><strong>¡Accion exitosa!</strong> - La acción fue realizada correctamente
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <!-- Danger Alert -->
                    <div class="alert alert-danger alert-dismissible alert-solid alert-label-icon shadow fade show" role="alert">
                        <i class="ri-error-warning-line label-icon"></i><strong>¡Accion no exitosa!</strong> - La acción no fue realizada, ocurrio un error
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                <!-- container-fluid -->

                














            </div>

            <?php include "../layouts/footer.template.php"?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <?php include "../layouts/scripts.template.php"?>
</body>


</html>