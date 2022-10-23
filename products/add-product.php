<?php 
    include_once "../app/config.php";
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
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Crear producto</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item">Productos</li>
                                        <li class="breadcrumb-item active">Crear producto</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <form id="createproduct-form" autocomplete="off" class="needs-validation " novalidate>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-title-input">Nombre del producto</label>
                                            <input type="hidden" class="form-control" id="formAction" name="formAction" value="add">
                                            <input type="text" class="form-control d-none" id="product-id-input">
                                            <input type="text" class="form-control" id="product-title-input" value="" placeholder="Ingresa el nombre del producto" required>
                                            <div class="invalid-feedback">Please Enter a product title.</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Descripción</h5>
                                    </div>
                                    <!-- end card body -->
                                    <div class="card-body">
                                        <div>
                                        <div class="form-floating">
                                            <textarea class="form-control" name="descripción" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                            <label for="floatingTextarea">Ingresa una descripción</label>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->   
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Caracteristicás</h5>
                                    </div>
                                    <!-- end card body -->
                                    <div class="card-body">
                                        <div>
                                        <div class="form-floating">
                                            <textarea class="form-control" name="descripción" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                            <label for="floatingTextarea">Ingresa las caracteristicás</label>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->  
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Categorias</h5>
                                    </div>
                                    <div class="card-body">
                                            <div class="flex-grow-1">
                                                <select name="tags" class="form-select">
                                                    <option value="Hola">Hola</option>
                                                    <option value="adios">Adios</option>
                                                </select>
                                                <select name="tags" class="form-select mt-2">
                                                    <option value="Hola">Hola</option>
                                                    <option value="adios">Adios</option>
                                                </select>
                                            </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                                
                            </div>
                            
                            <!-- end col -->
                            
                            <div class="col-lg-4">

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Brand</h5>
                                    </div>
                                    <div class="card-body">
                                        <select class="form-select" id="choices-category-input" name="brand" data-choices data-choices-search-false>
                                            <option value="Appliances">Hola</option>
                                            <option value="Appliances">Adios</option>
                                        </select>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Tags</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="hstack gap-3 align-items-start">
                                            <div class="flex-grow-1">
                                                <select name="tags" class="form-select">
                                                    <option value="Hola">Hola</option>
                                                    <option value="adios">Adios</option>
                                                </select>
                                                <select name="tags" class="form-select mt-2">
                                                    <option value="Hola">Hola</option>
                                                    <option value="adios">Adios</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <div class="card mb-5">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Cover</h5>
                                    </div>
                                    <div class="card-body">
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" name="uploadedfile" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                            <div class="w-100">
                                <div class="text-center mb-3">
                                    <button type="submit" class="btn btn-success w-sm btn-lg ">Crear producto</button>
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



    <!-- Modal Crear Brand -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" method="POST" action="<?= BASE_PATH ?>" >
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Nombre</span>
                            <input type="text" class="form-control" placeholder="Nombre" aria-label="Username" aria-describedby="basic-addon1" name="name" v-if="mostrar_inputs_añadir == true">
                            
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Descripción</span>
                            <input type="text" class="form-control" placeholder="Apellidos" aria-label="Username" aria-describedby="basic-addon1" name="lastname" v-if="mostrar_inputs_añadir == true">
                            
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Slug</span>
                            <input type="text" class="form-control" placeholder="example@example.com" aria-label="Username" aria-describedby="basic-addon1" name="email" v-if="mostrar_inputs_añadir == true">
                            
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Numero</span>
                            <input type="text" class="form-control" placeholder="Numero" aria-label="Username" aria-describedby="basic-addon1" name="phone_number" v-if="mostrar_inputs_añadir == true">
                            
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Creado por:</span>
                            <input type="text" class="form-control" placeholder="Creado por" aria-label="Username" aria-describedby="basic-addon1" name="created_by" v-if="mostrar_inputs_añadir == true">
                            
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Rol</span>
                            <input type="text" class="form-control" placeholder="Rol" aria-label="Username" aria-describedby="basic-addon1" name="role" v-if="mostrar_inputs_añadir == true">
                            
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Contraseña</span>
                            <input type="password" class="form-control" placeholder="******" aria-label="Username" aria-describedby="basic-addon1" name="password">
                        </div>
                        <div class="input-group mb-3" v-if="mostrar_añadir_foto == true">
                            <input type="file" class="form-control" name="profile_photo_file" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success" @click="alertaEditar">Guardar </button>
                            <input type="hidden" name="action" :action="accion" :value="accion">
                            <input type="hidden" name="global_token" value="<?= $_SESSION['global_token'] ?>">
                            <input type="hidden" name="id" :value="datos_user.id">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    

    <?php include "../layouts/scripts.template.php";?>
    <!-- ckeditor -->
    <script src="<?= BASE_PATH ?>public/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
    <!-- dropzone js -->
    <script src="<?= BASE_PATH ?>public/libs/dropzone/dropzone-min.js"></script>

    <script src="<?= BASE_PATH ?>public/js/pages/ecommerce-product-create.init.js"></script>

</body>


</html>