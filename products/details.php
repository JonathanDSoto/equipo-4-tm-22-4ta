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
                                                <!-- Carousel -->
                                                <div class="carousel slide" id="carousel-01" data-bs-ride="carousel">
                                                    <div class="carousel-inner">

                                                        <div class="carousel-item active">
                                                            <img src="../public/images/comingsoon.png" alt="..." class="d-block w-100">
                                                        </div>

                                                        <div class="carousel-item ">
                                                            <img src="../public/images/brands/github.png" alt="..." class="d-block w-100">
                                                        </div>

                                                        <div class="carousel-item ">
                                                            <img src="../public/images/brands/github.png" alt="..." class="d-block w-100">
                                                        </div>


                                                    </div>
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
                                                            <div><a href="#" class="text-primary d-block">{{NOMBRE BRAND}}</a></div>
                                                            <div class="vr"></div>
                                                            <div class="text-muted">Categoria : <span class="text-body fw-medium">{{Nombre Categoria}}</span></div>
                                                            <div class="vr"></div>
                                                            <div class="text-muted">Tags : <span class="rounded bg-primary"> <i href="#" class="rounded-pill text-light p-2">{{Nombre tag}}</i></span></div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div>
                                                            <a href="apps-ecommerce-add-product.html" class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="ri-pencil-fill align-bottom"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="p-2 border border-dashed rounded">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm me-2">
                                                                    <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                                        <i class="ri-money-dollar-circle-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted mb-1">Precio :</p>
                                                                    <h5 class="mb-0">{{$}}</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="p-2 border border-dashed rounded">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm me-2">
                                                                    <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                                        <i class="ri-stack-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted mb-1">Stock :</p>
                                                                    <h5 class="mb-0">{{Stock}}</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end col -->
                                                    

                                                </div>

                                                

                                                <div class="mt-4 text-muted">
                                                    <h5 class="fs-14">Descripción :</h5>
                                                    <p>{{DESCRIPCIÓN}}</p>
                                                </div>

                                                <div class="mt-4 text-muted">
                                                    <h5 class="fs-14">Features :</h5>
                                                    <p>{{FEATURES}}</p>
                                                </div>


                                                <div class="product-content mt-5">
                                                    <h5 class="fs-14 mb-3">Más :</h5>
                                                    <nav>
                                                        <ul class="nav nav-tabs nav-tabs-custom nav-success" id="nav-tab" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="nav-speci-tab" data-bs-toggle="tab" href="#nav-speci" role="tab" aria-controls="nav-speci" aria-selected="true">Specification</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="nav-detail-tab" data-bs-toggle="tab" href="#nav-detail" role="tab" aria-controls="nav-detail" aria-selected="false">Details</a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                    <div class="tab-content border border-top-0 p-4" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-speci" role="tabpanel" aria-labelledby="nav-speci-tab">
                                                            <div class="table-responsive">
                                                                <table class="table mb-0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row" style="width: 200px;">Category</th>
                                                                            <td>T-Shirt</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Brand</th>
                                                                            <td>Tommy Hilfiger</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Color</th>
                                                                            <td>Blue</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Material</th>
                                                                            <td>Cotton</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Weight</th>
                                                                            <td>140 Gram</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="nav-detail" role="tabpanel" aria-labelledby="nav-detail-tab">
                                                            <div>
                                                                <h5 class="font-size-16 mb-3">Tommy Hilfiger Sweatshirt for Men (Pink)</h5>
                                                                <p>Tommy Hilfiger men striped pink sweatshirt. Crafted with cotton. Material composition is 100% organic cotton. This is one of the world’s leading designer lifestyle brands and is internationally recognized for celebrating the essence of classic American cool style, featuring preppy with a twist designs.</p>
                                                                <div>
                                                                    <p class="mb-2"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> Machine Wash</p>
                                                                    <p class="mb-2"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> Fit Type: Regular</p>
                                                                    <p class="mb-2"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> 100% Cotton</p>
                                                                    <p class="mb-0"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> Long sleeve</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- product-content -->
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
                        <!-- end col -->
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