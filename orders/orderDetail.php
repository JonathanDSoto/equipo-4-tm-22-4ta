<?php 
// Listo para front
    include_once "../app/config.php";
?> 
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">



<head>

    
    <?php include "../layouts/head.template.php"?>
    <!-- Sweet Alert css-->
    <link href="<?=BASE_PATH?>public/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    
    <title>Ordenes</title>


</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        
        <!-- ========== App Menu ========== -->
        <?php include "../layouts/nav.template.php"?>
        <?php include "../layouts/sidebar.template.php"?>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
               
            
            </div>
        <!-- end main content-->

        </div>
    <!-- END layout-wrapper -->
    <?= include "../layouts/footer.template.php"?>
    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <?php include "../layouts/scripts.template.php"?>

    <!-- list.js min js -->
    <script src="<?=BASE_PATH?>public/libs/list.js/list.min.js"></script>

    <!--list pagination js-->
    <script src="<?=BASE_PATH?>public/libs/list.pagination.js/list.pagination.min.js"></script>

    <!-- ecommerce-order init js -->
    <script src="<?=BASE_PATH?>public/js/pages/ecommerce-order.init.js"></script>

    <!-- Sweet Alerts js -->
    <script src="<?=BASE_PATH?>public/libs/sweetalert2/sweetalert2.min.js"></script>

    <script src="<?=BASE_PATH?>public/js/genInputs.js"></script>


</body>


</html>