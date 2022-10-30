<?php 
// Listo para front
    include_once "../app/config.php";
?> 

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<head>

    <?php include '../layouts/head.template.php' ?>

    <!-- swiper css -->
    <link rel="stylesheet" href="<?= BASE_PATH ?>/libs/swiper/swiper-bundle.min.css">
    <title>Detalle cliente</title>
</head>

<body>

    
    <!-- ========== App Menu ========== -->
    <?php include '../layouts/nav.template.php'?>
    
    <?php include '../layouts/sidebar.template.php' ?>
    
    <div class="vertical-overlay"></div>
    
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    
    <div class="main-content">

        <div class="page-content mt-m-n5">
            <div class="container-fluid">
                <div class="profile-foreground position-relative mx-n4 mt-n4">
                    <div class="profile-wid-bg">
                        <img src="<?= BASE_PATH ?>public/images/bg.jpg" alt="" class="profile-wid-img" />
                    </div>
                </div>
                <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
                    <div class="row g-4">
                        <div class="col-auto">
                            <div class="avatar-lg">
                                <img src="<?= BASE_PATH ?>public/images/avantar.jpg" alt="user-img" class="img-thumbnail rounded-circle" />
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col">
                            <div class="p-2">
                                <h3 class="text-white mb-1">{{Nombre}}</h3>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        
                        <div class="tab-content pt-4 text-muted">
                            <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                <div class="row">
                                    <div class="col-xxl-3">
                                        
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3">Información</h5>
                                                <div class="table-responsive">
                                                    <table class="table table-borderless mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <th class="ps-0" scope="row">Nombre :</th>
                                                                <td class="text-muted">{{nombre}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th class="ps-0" scope="row">E-mail :</th>
                                                                <td class="text-muted">{{nombre}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th class="ps-0" scope="row">Numero celular:</th>
                                                                <td class="text-muted">{{Numero celular}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th class="ps-0" scope="row">Suscripcion :</th>
                                                                <td class="text-muted"><span class="badge text-bg-success">Si</span><span class="badge text-bg-danger">No</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="ps-0" scope="row">Nivel :</th>
                                                                <td class="text-muted"><span class="badge badge-gradient-warning">VIP</span><span class="badge badge-gradient-secondary">NORMAL</span><span class="badge badge-gradient-primary">PREMIUM</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->

                                    </div>
                                </div>
                                
                                <!--end row-->
                            </div>
                        </div>
                        <!--end tab-content-->
                        
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card bg-success card-height-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-light text-success rounded-2 fs-2 shadow">
                                                <i class="bx bx-shopping-bag"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-white-50 mb-3">Ventas totales</p>
                                            <h4 class="fs-4 mb-3 text-white"><span class="counter-value" data-target="2045">0</span></h4>
                                            <p class="text-white-50 mb-0">From 1930 last year</p>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <span class="badge badge-soft-light fs-12"><i class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>6.11 % <span></div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card" id="orderList">
                            <div class="card-body pt-0">
                                
                                <ul class="nav nav-tabs nav-tabs-custom nav-success mb-3" role="tablist">
                                    <li class="nav-item">
                                        
                                        <a href="" class="btn btn-success text-white mt-2" >
                                            Registrar dirección
                                        </a>
                                        
                                        <a class="nav-link active All py-3" data-bs-toggle="tab" id="All" href="#home1" role="tab" aria-selected="true" style="text-decoration: none; cursor:default">
                                            <i class="ri-store-2-fill me-1 align-bottom"></i> Direcciones
                                        </a>
                                    </li>
                                </ul>
                                <div class="table-responsive table-card mb-1">
                                    <table class="table table-nowrap align-middle" id="orderTable">
                                        <thead class="text-muted table-light">
                                            <tr class="text-uppercase">
                                                <th>ID</th>
                                                <th>ID cliente</th>
                                                <td>Nombre</td>
                                                <td>Apellidos</td>
                                                <th>Calle y numero</th>
                                                <th>Codigo Postal</th>
                                                <th>Ciudad</th>
                                                <th>Estado</th>
                                                <th>Numero celular</th>
                                                <th>Direccion de facturado</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            <tr>
                                                <td><a href="#" class="fw-medium link-primary">{{ID}}</a></td>
                                                <td>{{ID cliente}}</td>
                                                <td>{{Nombre}}</td>
                                                <td>{{Apellidos}}</td>
                                                <td>{{Calle y numero}}</td>
                                                <td>{{Codigo Postal}}</td>
                                                <td>{{Ciudad}}</td>
                                                <td>{{Estado}}</td>
                                                <td>{{Numero}}</td>
                                                <td>
                                                    <span class="badge badge-soft-success">1</span>
                                                    <span class="badge badge-soft-danger">2</span>
                                                </td>
                                                <td>
                                                    <ul class="list-inline hstack gap-2 mb-0">
                                                        <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                            <a href="#addressModal" data-bs-toggle="modal" class="text-primary d-inline-block edit-item-btn">
                                                                <i class="ri-pencil-fill fs-16"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                                            <a class="text-danger d-inline-block remove-item-btn" data-bs-toggle="modal" href="#deleteAddress">
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


                                

                                <!-- Modal delete -->
                                <div class="modal fade flip" id="deleteAddress" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body p-5 text-center">
                                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                                                <div class="mt-4 text-center">
                                                    <h4>Estas seguro que deseas eliminar esta dirección?</h4>
                                                    <p class="text-muted fs-15 mb-4">Eliminar su dirección eliminará toda su información de nuestra base de datos.</p>
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
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card" id="orderList">
                            <div class="card-body pt-0">
                                
                                <ul class="nav nav-tabs nav-tabs-custom nav-success mb-3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active All py-3" data-bs-toggle="tab" id="All" href="#home1" role="tab" aria-selected="true" style="text-decoration: none; cursor:default">
                                            <i class="ri-store-2-fill me-1 align-bottom"></i> Ordenes
                                        </a>
                                    </li>
                                </ul>
                                <div class="table-responsive table-card mb-1">
                                    <table class="table table-nowrap align-middle" id="orderTable">
                                        <thead class="text-muted table-light">
                                            <tr class="text-uppercase">
                                                <th>ID</th>
                                                <th>Folio</th>
                                                <th>Pagado</th>
                                                <th>Client id</th>
                                                <th>Addres ID</th>
                                                <th>Status</th>
                                                <th>Tipo de pago</th>
                                                <th>Cupón</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            <tr>
                                                <td><a href="#" class="fw-medium link-primary">{{ID}}</a></td>
                                                <td>{{Nombre}}</td>
                                                <td>{{Email}}</td>
                                                <td>{{Num celular}}</td>
                                                <td>{{AddresID}}</td>
                                                <td>
                                                    <span class="badge rounded-pill badge-outline-primary">1</span>
                                                    <span class="badge rounded-pill badge-outline-secondary">2</span>
                                                    <span class="badge rounded-pill badge-outline-success">3</span>
                                                    <span class="badge rounded-pill badge-outline-info">4</span>
                                                    <span class="badge rounded-pill badge-outline-warning">5</span>
                                                    <span class="badge rounded-pill badge-outline-danger">6</span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-soft-primary">1</span>
                                                    <span class="badge badge-soft-secondary">2</span>
                                                    <span class="badge badge-soft-success">3</span>
                                                </td>
                                                <td>{{Cupon}}</td>
                                                <td>{{Total}}</td>
                                                <td>
                                                    <ul class="list-inline hstack gap-2 mb-0">
                                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="View">
                                                            <a href="#" class="text-primary d-inline-block">
                                                                <i class="ri-eye-fill fs-16"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                            <a href="#showModal" data-bs-toggle="modal" class="text-primary d-inline-block edit-item-btn">
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


                                
                                <!-- Modal ordenes -->
                                <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-light p-3">
                                                <h5 class="modal-title" id="exampleModalLabel">Editar orden</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                            </div>
                                            <form action="#">
                                                <div class="modal-body">
                                                    <input type="hidden" id="id-field" />

                                                    <div class="mb-3" id="modal-id">
                                                        <label for="orderId" class="form-label">Folio</label>
                                                        <input type="text" id="orderId" class="form-control" placeholder="ID" readonly />
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="customername-field" class="form-label">Total</label>
                                                        <input type="text" id="customername-field" class="form-control" placeholder="Enter name" required />
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="productname-field" class="form-label">Pagado</label>
                                                        <select class="form-control" data-trigger name="productname-field" id="productname-field">
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="date-field" class="form-label">Cliente id</label>
                                                        <input type="text" id="amount-field" class="form-control" placeholder="Cliente id" required />
                                                    </div>

                                                    <div class="row gy-4 mb-3">
                                                        <div class="col-md-6">
                                                            <div>
                                                                <label for="amount-field" class="form-label">Dirección id</label>
                                                                <input type="text" id="amount-field" class="form-control" placeholder="Direccion id" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div>
                                                                <label for="payment-field" class="form-label">Metodo de pago</label>
                                                                <select class="form-control" data-trigger name="payment-method" id="payment-field">
                                                                    <option value="Efectivo">Efectivo</option>
                                                                    <option value="Efectivo">Efectivo</option>
                                                                    <option value="Efectivo">Efectivo</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <label for="delivered-status" class="form-label">Status</label>
                                                        <select class="form-control" data-trigger name="delivered-status" id="delivered-status">
                                                            <option value="Pendiente">Pendiente</option>
                                                            <option value="Pendiente">Pendiente</option>
                                                            <option value="Pendiente">Pendiente</option>
                                                            <option value="Pendiente">Pendiente</option>
                                                            <option value="Pendiente">Pendiente</option>
                                                            <option value="Pendiente">Pendiente</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success" id="add-btn">Add Order</button>
                                                        <button type="button" class="btn btn-success" id="edit-btn">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal address -->
                                <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-light p-3">
                                                <h5 class="modal-title" id="exampleModalLabel">Editar direccion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                            </div>
                                            <form action="#">
                                                <div class="modal-body">
                                                    <input type="hidden" id="id-field" />

                                                    <div class="mb-3" id="modal-id">
                                                        <label for="orderId" class="form-label">Nombre</label>
                                                        <input type="text" id="orderId" class="form-control" placeholder="Ingresa el nombre del cliente" required />
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="customername-field" class="form-label">Apellidos</label>
                                                        <input type="text" id="customername-field" class="form-control" placeholder="Ingresa el apellido del cliente" required />
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="productname-field" class="form-label">Calle y Numero</label>
                                                        <input type="text" id="amount-field" class="form-control" placeholder="Ingresa la calle y nomuero del cliente" required />
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="date-field" class="form-label">Codigo postal</label>
                                                        <input type="text" id="amount-field" class="form-control" placeholder="Ingresa el codgio postal del cliente" required />
                                                    </div>

                                                    <div class="row gy-4 mb-3">
                                                        <div class="col-md-6">
                                                            <div>
                                                                <label for="amount-field" class="form-label">Ciudad</label>
                                                                <input type="text" id="amount-field" class="form-control" placeholder="Ingresa la ciudad del cliente" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div>
                                                                <label for="payment-field" class="form-label">Estado</label>
                                                                <input type="text" id="amount-field" class="form-control" placeholder="Ingresa el estado del cliente" required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <label for="delivered-status" class="form-label">Numero Celular</label>
                                                        <input type="text" id="amount-field" class="form-control" placeholder="Ingresa el numero celular del cliente" required />
                                                    </div>
                                                    <div class="mt">
                                                        <label for="delivered-status" class="form-label">Direccion de facturado</label>
                                                        <select class="form-control">
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label for="delivered-status" class="form-label">Client ID</label>
                                                        <input type="text" id="amount-field" class="form-control" placeholder="Ingresa el id del cliente" required/>
                                                        
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success" id="add-btn">Add Order</button>
                                                        <button type="button" class="btn btn-success" id="edit-btn">Update</button>
                                                    </div>
                                                </div>
                                            </form>
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
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div><!-- container-fluid -->
        </div><!-- End Page-content -->
        
        
    </div>
    <!-- end table responsive -->
        
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

</body>


</html>