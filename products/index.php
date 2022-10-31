<?php 
    include_once "../app/config.php";
    include '..\app\ProductsController.php';
      $producto = new ProductsController();
      $data = $producto->getProducts();
      #error_reporting(0);
?> 

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

	<?php include "../layouts/head.template.php"; ?>

    <!-- nouisliderribute css -->
    <link rel="stylesheet" href="<?= BASE_PATH ?>public/libs/nouislider/nouislider.min.css">

    <!-- gridjs css -->
    <link rel="stylesheet" href="<?= BASE_PATH ?>public/libs/gridjs/theme/mermaid.min.css">

    <!-- Vue js -->
    <script src="https://unpkg.com/vue@3"></script>
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper" >

    	<?php include "../layouts/nav.template.php"; ?>
        
        <!-- ========== App Menu ========== -->
        <?php include "../layouts/sidebar.template.php"; ?>
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
                                <h4 class="mb-sm-0">Productos</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                </div>
                <!-- container-fluid -->
            </div>
            <a href="<?=BASE_PATH?>agregar-producto" class="btn btn-success ms-5 mb-4" >Agregar producto<i class="mdi mdi-plus-thick"></i></a>

            <div class="mt-1 ms-5 me-5 mb-5 ">
                <div class="row row-cols-1 row-cols-md-5 g-4" >

                    <div class="col" v-for="(producto, index) in productos">
                        <div class="card h-100" >
                            <img :src="producto.cover" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{producto.name}}</h5>
                                <p :class="classTruncate">{{producto.description}}</p><a @click="cambiarClass(index)" href="#">Ver Más</a>
                                <hr>
                                <p class="text-end me-4  text-dark"></p>
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

    <script type="text/javascript">
            const { createApp } = Vue
            const app = createApp({
                data(){
                    return {
                        productos: <?= json_encode($data);?>,
                        classTruncate:'card-text text-truncate d-block',
                        mas: 'más',
                    }
                },
                methods:{
                    cambiarClass(index){
                        if (this.classTruncate == 'card-text text-truncate d-block') {
                            this.classTruncate = 'card-text';
                            mas = 'menos';
                        } else {
                            this.classTruncate = 'card-text text-truncate d-block';
                            mas = 'más';
                        }
                    },
                },
                mounted() {
                },
            }).mount('#app')


        </script>


</body>


</html>