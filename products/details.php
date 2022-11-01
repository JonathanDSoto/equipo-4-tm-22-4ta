<?php 
    include_once "../app/config.php";
?> 

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>    
    <title>Product Details | Velzon - Admin & Dashboard Template</title>
    <?php include "../layouts/head.template.php"?>
    <!--Swiper slider css-->
    <link href="<?= BASE_PATH?>public/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
    <div class="layout-width">
        
    </div>
</header>
        <!-- ========== App Menu ========== -->
        
        
            <?php include "../layouts/nav.template.php"?> 
            <?php include "../layouts/sidebar.template.php"?> 
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
                                <h4 class="mb-sm-0">Detalle de producto</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Productos</a></li>
                                        <li class="breadcrumb-item active">Detalle de producto</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row gx-lg-5">
                                        <div class="col-xl-4 col-md-8 mx-auto">
                                            <div class="row row-cols-1">
                                                <div class="flex-shrink-0 bg-light rounded p-1">
                                                    <img src="../public/images/avantar.jpg" class="img-fluid d-block" alt="img..." width="400px">    
                                                </div>
                                            </div>
                                            <!-- end col -->
                                        </div>

                                        <div class="col-xl-8">
                                            <div class="mt-xl-0 mt-5">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <h4>{{TITULO}}</h4>
                                                        <div class="hstack gap-3 flex-wrap">
                                                            <div><a href="#" class="text-primary d-block">Marca:{{NOMBRE BRAND}}</a></div>
                                                            <div class="vr"></div>
                                                            <div class="text-muted">Categoria : <a href="#" class="">{{Nombre Categoria}}</a></div>
                                                            <div class="vr"></div>
                                                            <div class="text-muted">Etiquetas : <span class="rounded bg-primary"> <i href="#" class="rounded-pill text-light p-2">{{Etiquetas}}</i></span></div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div>
                                                            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-placement="top" title="Edit"><i class="ri-pencil-fill align-bottom"></i></button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-4 text-muted">
                                                    <h5 class="fs-14">Descripción :</h5>
                                                    <p>{{DESCRIPCIÓN}}</p>
                                                </div>

                                                <div class="mt-4 text-muted">
                                                    <h5 class="fs-14">Caracteristicas :</h5>
                                                    <p>{{Caracteristicas}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header border-bottom-dashed">
                                    <h5 class="card-title mb-0">Presentación</h5>
                                </div>
                                <div class="card-header bg-soft-light border-bottom-dashed">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Presentación</span>
                                        <select class="form-control" id="">
                                            <option value=""><--Selecciona una opción--></option>
                                            <option value="opc1">opc1</option>
                                            <option value="opc1">opc1</option>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Cantidad</span>
                                        <div class="row">
                                            <div class="col-5">
                                                <input type="number" class="form-control col-4" placeholder="0" aria-label="Username" aria-describedby="basic-addon1" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-2">
                                    <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                            <tbody>
                                                <tr class="table-active">
                                                    <th>Total:</th>
                                                    <td class="text-end">
                                                        <span class="fw-semibold" id="cart-total">
                                                            $415.96
                                                        </span>
                                                    </td>
                                                </tr>
                                                <td>
                                                    <a href="#" class="btn btn-info col-3 ms-n2"><i class="ri-shopping-cart-line "></i>Agregar</a>
                                                </td>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end table-responsive -->
                                </div>
                            </div>
                        </div>
                        <div class="w-100"></div>
                    </div>
                    <!-- end row -->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php include "../layouts/footer.template.php"?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Editar producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-xxl-12">
                                <div>
                                    <label for="firstName" class="form-label">Id</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="Enter firstname">
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-12">
                                <div>
                                    <label for="lastName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="Enter lastname">
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-12">
                                <label for="genderInput" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="lastName" placeholder="Enter lastname">
                            </div><!--end col-->
                            <div class="col-xxl-12">
                                <div>
                                    <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-12">
                                <label for="genderInput" class="form-label">Caracteristicas</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div><!--end col-->
                            <div class="mb-3 col-xxl-12">
                                <label for="formFile" class="form-label">Imagen</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Agrear</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <?php include "../layouts/scripts.template.php"?>

    <!--Swiper slider js-->
    <script src="<?= BASE_PATH?>public/libs/swiper/swiper-bundle.min.js"></script>

    <!-- ecommerce product details init -->
    <script src="<?= BASE_PATH?>public/js/pages/ecommerce-product-details.init.js"></script>

</body>


</html>