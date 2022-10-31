<?php 
    include_once "../app/config.php";
    include '..\app\CouponsController.php';
    $cupones = new CouponsController();
    $data = $cupones->getCoupons();
    #var_dump($data);
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
    <div class="main-content" id="app">
        
        <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Cupones</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                </div>
                <div class="container-fluid">
                <div class="row">
                        <div class="col-lg-12">
                            <div class="card" >
                                <div class="card-header  border-0">
                                    <div class="d-flex align-items-center">
                                        <h5 class="card-title mb-0 flex-grow-1">Cupones</h5>
                                        <div class="flex-shrink-0">
                                            <a href="<?= BASE_PATH?>cupones/agregar-cupon" type="button" class="btn btn-success add-btn"><i class="ri-add-line align-bottom me-1"></i> Crear cupón</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div>
                                        <ul class="nav nav-tabs nav-tabs-custom nav-success mb-3" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active All py-3" data-bs-toggle="tab" id="All" href="#home1" role="tab" aria-selected="true">
                                                    <i class="ri-store-2-fill me-1 align-bottom" style="text-decoration: none; cursor:default;"></i> Cupones</a>
                                            </li>
                                        </ul>

                                        <div class="table-responsive table-card mb-1">
                                            <table class="table table-nowrap align-middle" id="orderTable">
                                                <thead class="text-muted table-light">
                                                    <tr class="text-uppercase">
                                                        <th>ID</th>
                                                        <th>Nombre</th>
                                                        <th>Codigo</th>
                                                        <th>Descuento</th>
                                                        <th>Monto descuento</th>
                                                        <th>Min. Monto</th>
                                                        <th>Min. productos</th>
                                                        <th>Dia de alta</th>
                                                        <th>Dia de baja</th>
                                                        <th>Usos maximos</th>
                                                        <th>Veces usadas</th>
                                                        <th>Solo primera compra</th>
                                                        <th>Status</th>
                                                        <th>Tipo descuento</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list form-check-all">
                                                    <tr v-for="(cupon, index) in cupones">
                                                        <td><a href="" class="fw-medium link-primary">{{cupon.id}}</a></td>
                                                        <td>{{cupon.name}}</td>
                                                        <td>{{cupon.code}}</td>
                                                        <td>{{cupon.percentage_discount}}</td>
                                                        <td>{{cupon.amount_discount}}</td>
                                                        <td>{{cupon.min_amount_required}}</td>
                                                        <td>{{cupon.min_product_required}}</td>
                                                        <td>{{cupon.start_date}}</td>
                                                        <td>{{cupon.end_date}}</td>
                                                        <td>{{cupon.max_uses}}</td>
                                                        <td>{{cupon.count_uses}}</td>
                                                        <td><p v-if="cupon.valid_only_first_purchase == 1">Válido</p><p v-if="cupon.valid_only_first_purchase == 0">No Válido</p></td>
                                                        <td><p v-if="cupon.status == 1">Activo</p><p v-if="cupon.status == 0">Inactivo</p></td>
                                                        <td>{{cupon.couponable_type}}</td>
                                                        
                                                        <td>
                                                            <ul class="list-inline hstack gap-2 mb-0">
                                                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="View">
                                                                    <a href="<?= BASE_PATH?>cupons/details.php" class="text-primary d-inline-block">
                                                                        <i class="ri-eye-fill fs-16"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                                    <a href="#exampleModal" data-bs-toggle="modal" class="text-primary d-inline-block edit-item-btn" @click="editarCupon(cupon)">
                                                                        <i class="ri-pencil-fill fs-16"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                                                    <a class="text-danger d-inline-block remove-item-btn" data-bs-toggle="modal" href="#deleteOrder" @click="eliminarCupon(cupon)">
                                                                        <i class="ri-delete-bin-5-fill fs-16"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <div class="pagination-wrap hstack gap-2">
                                                <a class="page-item pagination-prev disabled" href="#">
                                                    Previous
                                                </a>
                                                <ul class="pagination listjs-pagination mb-0"></ul>
                                                <a class="page-item pagination-next" href="#">
                                                    Next
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal flip" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title " id="exampleModalLabel">Editar Cupón</h3>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form enctype="multipart/form-data" method="POST" action="<?= BASE_PATH ?>Controlador-cupones" >
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">Nombre</span>
                                                            <input type="text" class="form-control" placeholder="cupon OP 20%" aria-label="Username" aria-describedby="basic-addon1" name="name" :value="datos_cupon.name">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">Codigo</span>
                                                            <input type="text" class="form-control" placeholder="20PERCEN22" aria-label="Username" aria-describedby="basic-addon1" name="code" :value="datos_cupon.code">
                                                            
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">Porcentaje de descuento</span>
                                                            <input type="number" class="form-control" placeholder="20" aria-label="Username" aria-describedby="basic-addon1" name="percentage_discount" :value="datos_cupon.percentage_discount">
                                                        
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">Monto de descuento</span>
                                                            <input type="number" class="form-control" placeholder="1000" aria-label="Username" aria-describedby="basic-addon1" name="amount_discount" :value="datos_cupon.amount_discount">
                                                            
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">Monto minimo</span>
                                                            <input type="number" class="form-control" placeholder="1000" aria-label="Username" aria-describedby="basic-addon1" name="min_amount_required" :value="datos_cupon.min_amount_required">
                                                            
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">Minimo de productos</span>
                                                            <input type="number" class="form-control" placeholder="10" aria-label="Username" aria-describedby="basic-addon1" name="min_product_required" :value="datos_cupon.min_product_required">
                                                            
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">Día de alta</span>
                                                            <input class=" form-control" type="date" name="start_date" :value="datos_cupon.start_date" style="color: #1D1D1D; font-size: 14px; border:1px solid #ECF0F1; background-color: white; width:100px">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">Día de baja</span>
                                                            <input class=" form-control" type="date" name="end_date" :value="datos_cupon.end_date" style="color: #1D1D1D; font-size: 14px; border:1px solid #ECF0F1; background-color: white; width:100px">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">Máximo de usos</span>
                                                            <input type="number" class="form-control" name="max_uses" :value="datos_cupon.max_uses" placeholder="100" aria-label="Username" aria-describedby="basic-addon1" >
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">Veces usado</span>
                                                            <input type="number" class="form-control" name="count_uses" :value="datos_cupon.count_uses" placeholder="0" aria-label="Username" aria-describedby="basic-addon1" >
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">Tipo de cupón</span>
                                                            <select class="form-control" id="" name="couponable_type" :value="datos_cupon.couponable_type">
                                                                <option><--Selecciona una opción--></option>
                                                                <option value="Cupon de descuento">Cupon de descuento</option>
                                                                <option value="Cupon de descuento fijo">Cupon de descuento fijo</option>
                                                            </select>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="input-group mb-3">
                                                                    <h5 class="ms-1">Solo para uso de primera compra</h5>
                                                                    <div class="w-100"></div>
                                                                    <div class="form-check form-check-inline ms-1">
                                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" :value="datos_cupon.valid_only_first_purchase" name="valid_only_first_purchase" value="1">
                                                                        <label class="form-check-label" for="inlineCheckbox1">Si</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ms-1">
                                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" :value="datos_cupon.valid_only_first_purchase" name="valid_only_first_purchase" value="0">
                                                                        <label class="form-check-label" for="inlineCheckbox1">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="input-group mb-3">
                                                                    <h5 class="ms-1" id="basic-addon1">Status del cupón de descuento</h5>
                                                                    <div class="w-100"></div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" :value="datos_cupon.status" name="status" value="1">
                                                                        <label class="form-check-label" for="inlineCheckbox1">Activo</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ms-1">
                                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" :value="datos_cupon.status" name="status" value="0">
                                                                        <label class="form-check-label" for="inlineCheckbox1">Inactivo</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-success">Guardar Cambios</button>
                                                            <input type="hidden" name="action" action="editarCupon" value="editarCupon">
                                                            <input type="hidden" name="global_token" value="<?= $_SESSION['global_token'] ?>">
                                                            <input type="hidden" name="id" :value="datos_cupon.id">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal delete -->
                                    <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body p-5 text-center">
                                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                                                    <div class="mt-4 text-center">
                                                        <h4>Estas seguro que deseas eliminar este cupón?</h4>
                                                        <p class="text-muted fs-15 mb-4">Eliminar el cupón eliminará toda su información de nuestra base de datos.</p>
                                                        <div class="hstack gap-2 justify-content-center remove">
                                                            <button class="btn btn-link link-success fw-medium text-decoration-none" id="deleteRecord-close" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Cerrar</button>
                                                            <form method="POST" action="<?= BASE_PATH ?>Controlador-cupones">
                                                                <button type="submit" class="btn btn-danger" id="delete-record">Si, eliminar
                                                                <input type="hidden" name="action" action="eliminarCupon" value="eliminarCupon">
                                                                <input type="hidden" name="id" :value="id_cupon_eliminar.id">
                                                                <input type="hidden" name="global_token" value="<?= $_SESSION['global_token'] ?>">

                                                                </button>
                                                            </form> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end modal -->
                                </div>
                            </div>

                        </div>
                        <!--end col-->
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © Velzon.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

        
    </div>
        
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
    <script src="assets/libs/swiper/swiper-bundle.min.js"></script>

    <!-- profile init js -->
    <script src="assets/js/pages/profile.init.js"></script>

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
                        cupones: <?= json_encode($data); ?>,
                        id_cupon_eliminar: {id: ""},
                        datos_cupon: {id: "", name: "", code: "", porcentaje_descuento: "", monto_descuento: "", monto_minimo:"", minimo_productos:"", dia_alta:"", dia_baja:"", maximo_usos:"", veces_usado:"", tipo: "", primera_compra:"", status: ""},
                    }
                },
                methods:{
                    eliminarCupon(cupon){
                        this.id_cupon_eliminar = cupon;
                    },
                    editarCupon(cupon){
                        this.datos_cupon = cupon;
                    }
                },
                mounted() {

                },
            }).mount('#app')


        </script>
</body>


</html>



