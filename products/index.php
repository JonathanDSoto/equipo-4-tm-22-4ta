<?php 
    include_once "../app/config.php";
?> 

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

	<?php include "../layouts/head.template.php"; ?>

    <!-- nouisliderribute css -->
    <link rel="stylesheet" href="<?= BASE_PATH ?>public/libs/nouislider/nouislider.min.css">

    <!-- gridjs css -->
    <link rel="stylesheet" href="<?= BASE_PATH ?>public/libs/gridjs/theme/mermaid.min.css">
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

    	<?php include "../layouts/nav.template.php"; ?>
        
        <!-- ========== App Menu ========== -->
        <?php include "../layouts/sidebar.template.php"; ?>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <?php include '../layouts/bread.templete.php'?>

            <div class="mt-1 ms-5 me-5 mb-5 ">
                <div class="row row-cols-1 row-cols-md-5 g-4">


                    <!-- CARTA INICIO -->
                    
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?=BASE_PATH?>/public/images/mac-img.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center">Nombre producto</h5>
                                <p class="card-text text-truncate d-block">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet suscipit beatae totam facere eligendi similique sequi ratione ipsum hic cupiditate.</p><a href="#" id="">Ver más</a>
                                <hr>
                                <p class="text-end me-4  text-dark">$999</p>
                                <div class="row">
                                    <button type="button" class="btn btn-warning col-6">Editar</button>
                                    <button type="button" class="btn btn-danger col-6">Eliminar</button>
                                    <button type="button" class="btn btn-info col-12">Ver más</button>
                                </div>
                            </div>  
                        </div>
                    </div>




                </div>
            </div>

            <?php include "../layouts/footer.template.php"; ?>
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
 

    <?php include "../layouts/scripts.template.php"; ?>

    <!-- nouisliderribute js -->
    <script src="<?= BASE_PATH ?>public/libs/nouislider/nouislider.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/wnumb/wNumb.min.js"></script>

    <!-- gridjs js -->
    <script src="<?= BASE_PATH ?>public/libs/gridjs/gridjs.umd.js"></script>
    <script src="../../../../unpkg.com/gridjs%405.1.0/plugins/selection/dist/selection.umd.js"></script>
    <!-- ecommerce product list -->
    <script src="<?= BASE_PATH ?>public/js/pages/ecommerce-product-list.init.js"></script>


</body>


</html>