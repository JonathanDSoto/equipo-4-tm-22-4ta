<?php 
   
    include_once "../app/config.php";
?> 
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<head>

    <link href="<?= BASE_PATH?>public/libs/dropzone/dropzone.css" rel="stylesheet" type="text/css" />
    <?php include "../layouts/head.template.php"; ?>
    <!-- Plugins css -->
    <title>Agregar cliente</title>
</head>

<body>


    <!-- Begin page -->
    <div id="layout-wrapper">
        
        <?php include "../layouts/nav.template.php"; ?>
        <!-- ========== App Menu ========== -->
        <?php include "../layouts/sidebar.template.php";?>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content" id="app">
            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Registrar cliente</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item">Clientes</li>
                                        <li class="breadcrumb-item active">Registrar cliente</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- Formulario -->
                    <form id="createproduct-form" autocomplete="off" class="needs-validation " method="POST" action="<?= BASE_PATH ?>Controlador-productos">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-title-input">Nombre del cliente</label>
                                            <input type="hidden" class="form-control" id="formAction" name="formAction" value="add">
                                            <input type="text" class="form-control d-none" id="product-id-input">
                                            <input type="text" class="form-control" id="product-title-input" placeholder="Ingresa el nombre del cliente" name="name" >
                                            <div class="invalid-feedback">Por favor ingresa el nombre del cliente</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Email</h5>
                                    </div>
                                    <!-- end card body -->
                                    <div class="card-body">
                                        <div>
                                        <div class="form-floating">
                                            <input type="email" class="form-control" name="slug" placeholder="Leave a comment here" id="floatingTextarea">
                                            <label for="floatingTextarea">Ingresa email del cliente</label>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Numero</h5>
                                    </div>
                                    <!-- end card body -->
                                    <div class="card-body">
                                        <div>
                                        <div class="form-floating">
                                            <input type="number" class="form-control" name="slug" placeholder="Leave a comment here" id="floatingTextarea">
                                            <label for="floatingTextarea">Ingresa numero del cliente</label>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <!-- end col -->
                            
                            <div class="col-lg-4">

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Suscripción</h5>
                                    </div>
                                    <div class="card-body">
                                        <select class="form-select" id="choices-category-input" name="brand_id" data-choices data-choices-search-false>
                                            <option>Selecciona tipo de suscripción</option>
                                            <option>Hola</option>
                                            <option>Hola</option>
                                        </select>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Nivel</h5>
                                    </div>
                                    <div class="card-body">
                                        <select class="form-select" id="choices-category-input" name="brand_id" data-choices data-choices-search-false>
                                            <option>Selecciona nivel</option>
                                            <option>Hola</option>
                                            <option>Hola</option>
                                        </select>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                 
                            </div>
                            <!-- end col -->
                            <div class="w-100">
                                <div class="text-center mb-3">
                                    <button type="submit" class="btn btn-success w-sm btn-lg ">Registrar cliente</button>
                                    <input type="hidden" name="action" action="create" value="create">
                                    <input type="hidden" name="global_token" value="<?= $_SESSION['global_token'] ?>">

                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </form>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

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

    <?php include "../layouts/scripts.template.php";?>
    <!-- ckeditor -->
    <script src="<?= BASE_PATH ?>public/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
    <!-- dropzone js -->
    <script src="<?= BASE_PATH ?>public/libs/dropzone/dropzone-min.js"></script>

    <script src="<?= BASE_PATH ?>public/js/pages/ecommerce-product-create.init.js"></script>

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

                        tags: <?php echo json_encode($data_tags);?>,
                        brands: <?php echo json_encode($data_brands);?>,
                        categories: <?php echo json_encode($data_categorias);?>,

                    }
                },
                methods:{
                },
                mounted() {

                },
            }).mount('#app')


        </script>


</body>


</html>