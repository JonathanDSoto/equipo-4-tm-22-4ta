<?php 
    include_once "../app/config.php";
    include_once "../app/CouponsController.php";
?> 
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<head>

    <link href="<?= BASE_PATH?>public/libs/dropzone/dropzone.css" rel="stylesheet" type="text/css" />
    <?php include "../layouts/head.template.php"; ?>
    <!-- Plugins css -->

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
                                <h4 class="mb-sm-0">Crear cupón</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item">Cupones</li>
                                        <li class="breadcrumb-item active">Crear cupón</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- Formulario -->
                    <form id="#" autocomplete="off" class="needs-validation " method="POST" action="<?= BASE_PATH ?>Controlador-cupones">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-title-input">Nombre del cupón</label>
                                            <input type="hidden" class="form-control" id="formAction" name="formAction" value="add">
                                            <input type="text" class="form-control d-none" id="product-id-input">
                                            <input type="text" class="form-control" id="product-title-input" placeholder="Ingresa el nombre del cupón" name="name" >
                                            <div class="invalid-feedback">Por favor favor ingresa el nombre del cupón</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Codigo de descuento</h5>
                                    </div>
                                    <!-- end card body -->
                                    <div class="card-body">
                                        <div>
                                        <div class="form-floating">
                                            <input class="form-control" name="code" placeholder="Código de Cupón" id="floatingTextarea"></input>
                                            <label for="floatingTextarea">Ingresa el codigo del descuento</label>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->   
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Porcentaje de descuento</h5>
                                    </div>
                                    <!-- end card body -->
                                    <div class="card-body">
                                        <div>
                                        <div class="form-floating">
                                            <textarea class="form-control" name="percentage_discount" placeholder="Llenar este espacio si el cupón es por porcentaje" id="floatingTextarea"></textarea>
                                            <label for="floatingTextarea">Ingresa el porcentaje de descuento</label>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Minimo de monto requerido</h5>
                                    </div>
                                    <!-- end card body -->
                                    <div class="card-body">
                                        <div>
                                        <div class="form-floating">
                                            <input class="form-control" name="min_amount_required" placeholder="Minimo de monto requerido para usar el cupón" id="floatingTextarea"></input>
                                            <label for="floatingTextarea">Ingresa el minimo de monto requerido</label>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                
                            </div>
                            
                            
                            <div class="col-lg-4">
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Minimo de productos</h5>
                                    </div>
                                    <!-- end card body -->
                                    <div class="card-body">
                                        <div>
                                        <div class="form-floating">
                                            <input class="form-control" name="min_product_required" placeholder="Minimo de productos para usar el cupón" id="floatingTextarea"></input>
                                            <label for="floatingTextarea">Ingresa el minimo de productos</label>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Día de alta</h5>
                                    </div>
                                    <!-- end card body -->
                                    <div class="card-body">
                                        <div>
                                        <div class="input-group mb-3">
                                            <input class=" form-control" type="date" name="start_date" style="color: #1D1D1D; font-size: 14px; border:1px solid #ECF0F1; background-color: white; width:100px">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Día de baja</h5>
                                    </div>
                                    <!-- end card body -->
                                    <div class="card-body">
                                        <div>
                                        <div class="input-group mb-3">
                                            <input class=" form-control" type="date" name="end_date" style="color: #1D1D1D; font-size: 14px; border:1px solid #ECF0F1; background-color: white; width:100px">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Solo para primera compra</h5>
                                    </div>
                                    <!-- end card body -->
                                    <div class="card-body">
                                        <select class="form-control" name="valid_only_first_purchase">
                                            <option><--Selecciona una opción--></option>
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                

                            </div>
                            <!-- end col -->
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Máximo de usos</h5>
                                    </div>
                                    <!-- end card body -->
                                    <div class="card-body">
                                        <div>
                                        <div class="form-floating">
                                            <input class="form-control" name="max_uses" placeholder="Maximo de usos que tendrá el cupón" id="floatingTextarea"></input>
                                            <label for="floatingTextarea">Ingresa el máximo de usos</label>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-title-input">Veces usado</label>
                                            <input type="text" class="form-control" id="product-title-input" name="count_uses" value="0" readonly >
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Tipo de cupón</h5>
                                    </div>
                                    <!-- end card body -->
                                    <div class="card-body">
                                        <select class="form-control" name="couponable_type">
                                            <option><--Selecciona una opción--></option>
                                            <option value="Cupón de descuento">Cupón de descuento</option>
                                            <option value="Cupón de descuento fijo">Cupón de descuento fijo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Monto descuento</h5>
                                    </div>
                                    <!-- end card body -->
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Si su cupón es de un descuento fijo ingrese aqui el monto" name="amount_discount">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group mb-3">
                                            <h5 class="ms-1">Solo para uso de primera compra</h5>
                                            <div class="w-100"></div>
                                            <div class="form-check form-check-inline ms-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="valid_only_first_purchase">
                                                <label class="form-check-label" for="inlineCheckbox1">Si</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="0" name="valid_only_first_purchase">
                                                <label class="form-check-label" for="inlineCheckbox1">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="input-group mb-3">
                                            <h5 class="ms-1" id="basic-addon1">Status del cupón de descuento</h5>
                                            <div class="w-100"></div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="status">
                                                <label class="form-check-label" for="inlineCheckbox1">Activo</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="0" name="status">
                                                <label class="form-check-label" for="inlineCheckbox1">Inactivo</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mb-3 mt-2">
                                    <button type="submit" class="btn btn-success w-sm btn-lg  ">Crear cupón</button>
                                    <input type="hidden" name="action" action="nuevoCupon" value="nuevoCupon">
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