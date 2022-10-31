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
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Ordenes</h4>

                                <div class="page-title-right">
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                <div class="row">
                        <div class="col-lg-12">
                        

                            

                            <div class="card" >
                                <div class="card-header  border-0">
                                    <div class="d-flex align-items-center">
                                        <h5 class="card-title mb-0 flex-grow-1">Ordenes</h5>
                                        <div class="flex-shrink-0">
                                            <a type="button" href="#createModal" class="btn btn-success add-btn" data-bs-toggle="modal" data-bs-target="#createModal"><i class="ri-add-line align-bottom me-1"></i> Crear orden</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="alert alert-success alert-dismissible alert-solid alert-label-icon shadow fade show" role="alert">
                                        <i class="ri-check-double-line label-icon"></i><strong>¡Accion exitosa!</strong> - La acción fue realizada correctamente
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <!-- Danger Alert -->
                                    <div class="alert alert-danger alert-dismissible alert-solid alert-label-icon shadow fade show" role="alert">
                                        <i class="ri-error-warning-line label-icon"></i><strong>¡Accion no exitosa!</strong> - La acción no fue realizada, ocurrio un error
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <div>
                                        <ul class="nav nav-tabs nav-tabs-custom nav-success mb-3" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active All py-3" data-bs-toggle="tab" id="All" href="#home1" role="tab" aria-selected="true">
                                                    <i class="ri-store-2-fill me-1 align-bottom" style="text-decoration: none; cursor:default;"></i> Órdenes</a>
                                            </li>
                                        </ul>

                                        <div class="table-responsive table-card mb-1">
                                            <table class="table table-nowrap align-middle" id="orderTable">
                                                <thead class="text-muted table-light">
                                                    <tr class="text-uppercase">
                                                        <th class="sort" data-sort="id">Folio</th>
                                                        <th class="sort" data-sort="customer_name">Productos</th>
                                                        <th class="sort" data-sort="product_name">Total de la orden</th>
                                                        <th class="sort" data-sort="date">Estado de pago</th>
                                                        <th class="sort" data-sort="amount">Tipo de pago</th>
                                                        <th class="sort" data-sort="payment">Cupón</th>
                                                        <th class="sort" data-sort="status">Dirección</th>
                                                        <th class="sort" data-sort="city">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list form-check-all">
                                                    <tr>
                                                        <td class="id"><a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">{{Folio}}</a></td>
                                                        <td class="customer_name">{{Productos}}</td>
                                                        <td class="product_name">{{Total de la orden}}</td>
                                                        <td class="date">{{}}</td>
                                                        <td class="amount">
                                                            <span class="badge badge-soft-primary badge-border">1</span>
                                                            <span class="badge badge-soft-secondary badge-border">2</span>
                                                            <span class="badge badge-soft-success badge-border">3</span>
                                                            <span class="badge badge-soft-info badge-border">4</span>
                                                            <span class="badge badge-soft-warning badge-border">5</span>
                                                            <span class="badge badge-soft-danger badge-border">6</span>
                                                        </td>
                                                        <td class="payment">{{Cupón}}</td>
                                                        <td class="status">{{Dirección}}</td>
                                                        <td>
                                                            <ul class="list-inline hstack gap-2 mb-0">
                                                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="View">
                                                                    <a href="<?= BASE_PATH?>" class="text-primary d-inline-block"> <!-- RUTA VER MÁS -->
                                                                        <i class="ri-eye-fill fs-16"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                                    <a href="#editModal" data-bs-toggle="modal" class="text-primary d-inline-block edit-item-btn">
                                                                        <i class="ri-pencil-fill fs-16"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                                                    <a class="text-danger d-inline-block remove-item-btn" data-bs-toggle="modal" href="#deleteOrder">
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

                                    
                                </div>


                               
                                    
                                
                                </div>
                            </div>

                        </div>
                        <!--end col-->
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <!-- Modal editar orden -->
            <div class="modal flip" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title " id="exampleModalLabel">Editar orden</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form enctype="multipart/form-data" method="POST" action="<?= BASE_PATH ?>Controlador-usuarios" >
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Nombre</span>
                                    <input type="text" class="form-control" placeholder="cupon OP 20%" aria-label="Username" aria-describedby="basic-addon1" >
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Codigo</span>
                                    <input type="text" class="form-control" placeholder="20PERCEN22" aria-label="Username" aria-describedby="basic-addon1" >
                                    
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Porcentaje de descuento</span>
                                    <input type="number" class="form-control" placeholder="20" aria-label="Username" aria-describedby="basic-addon1" name="phone_number" >
                                
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Monto de descuento</span>
                                    <input type="number" class="form-control" placeholder="1000" aria-label="Username" aria-describedby="basic-addon1" name="email" >
                                    
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Monto minimo</span>
                                    <input type="number" class="form-control" placeholder="1000" aria-label="Username" aria-describedby="basic-addon1" name="created_by" >
                                    
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Minimo de productos</span>
                                    <input type="number" class="form-control" placeholder="10" aria-label="Username" aria-describedby="basic-addon1" name="role" >
                                    
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Día de alta</span>
                                    <input class=" form-control" type="date" name="" value="2018-07-22" style="color: #1D1D1D; font-size: 14px; border:1px solid #ECF0F1; background-color: white; width:100px">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Día de baja</span>
                                    <input class=" form-control" type="date" name="" value="2018-07-22" style="color: #1D1D1D; font-size: 14px; border:1px solid #ECF0F1; background-color: white; width:100px">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Máximo de usos</span>
                                    <input type="number" class="form-control" placeholder="100" aria-label="Username" aria-describedby="basic-addon1" >
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Veces usado</span>
                                    <input type="number" class="form-control" placeholder="0" aria-label="Username" aria-describedby="basic-addon1" >
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Tipo de cupón</span>
                                    <select class="form-control" id="">
                                        <option value=""><--Selecciona una opción--></option>
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
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                <label class="form-check-label" for="inlineCheckbox1">Si</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                <label class="form-check-label" for="inlineCheckbox1">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group mb-3">
                                            <h5 class="ms-1" id="basic-addon1">Status del cupón de descuento</h5>
                                            <div class="w-100"></div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                <label class="form-check-label" for="inlineCheckbox1">Activo</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                <label class="form-check-label" for="inlineCheckbox1">Inactivo</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                    <input type="hidden" name="action">
                                    <input type="hidden" name="global_token" value="<?= $_SESSION['global_token'] ?>">
                                    <input type="hidden" name="id" >
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                <!-- Modal crear orden -->
            <div class="modal flip" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title " id="exampleModalLabel">Crear orden</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form enctype="multipart/form-data" method="POST" action="<?=BASE_PATH?>" >
                                <div class="row">
                                    <div class="col-8">
                                        <div class="input-group flex-nowrap mb-2">
                                            <span class="input-group-text" id="addon-wrapping">Cliente</span>
                                            <select class="form-control">
                                                <option value=""><-- Selecciona una opción --></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <a id="agregar" class="btn btn-success col-12">Agregar presentación</a>
                                    </div>
                                    <div class="w-100"></div>

                                    <div id="dinamic"></div>
                                    


                                    <div class="col-4">
                                        <div class="input-group flex-nowrap mb-2">
                                            <span class="input-group-text" id="addon-wrapping">Dirección</span>
                                            <select class="form-control">
                                                <option value=""><-- Selecciona una opción --></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group flex-nowrap mb-2">
                                            <span class="input-group-text" id="addon-wrapping">Método de pago</span>
                                            <select class="form-control">
                                                <option ><-- Selecciona una opción --></option>
                                                <option value="no se">no se</option>
                                                <option value="no se">no se</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group flex-nowrap mb-2">
                                            <span class="input-group-text" id="addon-wrapping">Cupón</span>
                                            <select class="form-control">
                                                <option value=""><-- Selecciona una opción --></option>
                                                <option value=""></option>
                                                
                                            </select>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                    <input type="hidden" name="action">
                                    <input type="hidden" name="global_token" value="<?= $_SESSION['global_token'] ?>">
                                    <input type="hidden" name="id">
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
                                <h4>Estas seguro que deseas eliminar esta orden?</h4>
                                <p class="text-muted fs-15 mb-4">Eliminar su orden eliminará toda su información de nuestra base de datos.</p>
                                <div class="hstack gap-2 justify-content-center remove">
                                    <button class="btn btn-link link-success fw-medium text-decoration-none" id="deleteRecord-close" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Cerrar</button>
                                    <button class="btn btn-danger" id="delete-record">Si, eliminar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end modal -->
            


            <?= include "../layouts/footer.template.php"?>
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