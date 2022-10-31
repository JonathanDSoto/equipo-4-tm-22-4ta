<?php
    include "../app/config.php"
?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<head>

    <?php include "../layouts/head.template.php"?>
    <title>Detalles cupón</title>
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php include "../layouts/nav.template.php"?>
        <?php include "../layouts/sidebar.template.php"?>
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Detalles cupón</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a>Cupones</a></li>
                                        <li class="breadcrumb-item active">Detalle cupón</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="alert alert-success alert-dismissible alert-solid alert-label-icon shadow fade show" role="alert">
                        <i class="ri-check-double-line label-icon"></i><strong>¡Accion exitosa!</strong> - La acción fue realizada correctamente
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <!-- Danger Alert -->
                    <div class="alert alert-danger alert-dismissible alert-solid alert-label-icon shadow fade show" role="alert">
                        <i class="ri-error-warning-line label-icon"></i><strong>¡Accion no exitosa!</strong> - La acción no fue realizada, ocurrio un error
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                <!-- container-fluid -->

                <div class="row">
                    <div class="col-xxl-3 col-md-6">
                        <div class="card card-height-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-danger text-white rounded-2 fs-2 shadow">
                                            <i class="bx bxs-badge-dollar"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="text-uppercase fw-medium text-muted mb-3">Total de dinero descontado por el cupón</p>
                                        <h4 class="fs-4 mb-3">
                                            <span class="counter-value" data-target="7522">
                                                0
                                            </span>
                        </div>
                                </div>
                            </div><!-- end card body -->
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                            <div class="card card-height-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-info text-white rounded-2 fs-2 shadow">
                                                <i class="bx bx-store-alt"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3 mt-3">
                                            <p class="text-uppercase fw-medium text-muted mb-3">Órdenes que utilizan este cupón</p>
                                            <h4 class="fs-4 mb-3"><span class="counter-value" data-target="405">0</span></h4>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div>
                    <div class="w-100"></div>
                            <!--end col-->
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="text-end">
                                    <h4 class="card-title mb-0 flex-grow-1 text-start">Detalles del cupón</h4>
                                    <a href="#editModal" data-bs-toggle="modal" class="btn btn-light shadow-lg"><i class=" ri-pencil-fill"></i></a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table mb-0 table-borderless">
                                        <tbody>
                                            <tr>
                                                <th><span class="fw-medium">Nombre cupón</span></th>
                                                <td>{{Nombre cupón}}</td>
                                            </tr>
                                            <tr>
                                                <th><span class="fw-medium">Codigo del cupón</span></th>
                                                <td>{{Codigo del cupón}}</td>
                                            </tr>
                                            <tr>
                                                <th><span class="fw-medium">Porcentaje de descuento</span></th>
                                                <td>{{Porcentaje de descuento}}</td>
                                            </tr>
                                            <tr>
                                                <th><span class="fw-medium">Monto de descuento</span></th>
                                                <td>{{Monto de descuento}}</td>
                                            </tr>
                                            <tr>
                                                <th><span class="fw-medium">Minimo monto requerido</span></th>
                                                <td>{{Minimo monto requerido}}</td>
                                            </tr>
                                            <tr>
                                                <th><span class="fw-medium">Minimo de productos requeridos</span></th>
                                                <td>{{Minimo de productos requeridos}}</td>
                                            </tr>
                                            <tr>
                                                <th><span class="fw-medium">Fecha de alta</span></th>
                                                <td>{{Fecha de alta}}</td>
                                            </tr>
                                            <tr>
                                                <th><span class="fw-medium">Fecha de vencimiento</span></th>
                                                <td>{{Fecha de vencimiento}}</td>
                                            </tr>
                                            <tr>
                                                <th><span class="fw-medium">Maximo de usos</span></th>
                                                <td>{{Maximo de usos}}</td>
                                            </tr>
                                            <tr>
                                                <th><span class="fw-medium">Tipo de cupón</span></th>
                                                <td>{{Tipo de cupón}}</td>
                                            </tr>
                                            <tr>
                                                <th><span class="fw-medium">Status</span></th>
                                                <td>{{Status}}</td>
                                            </tr>
                                            <tr>
                                                <th><span class="fw-medium">Valido solo en primer compra</span></th>
                                                <td>{{Valido solo en primer compra}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                                
                                <!--end card-body-->
                                
                            </div>
                            <!--end card-->
                            
                        
                        <div class="col-xxl-12">
                            <table class="table table-nowrap ">
                                <thead>
                                    <tr>
                                        <th scope="col">Folio</th>
                                        <th scope="col">Productos</th>
                                        <th scope="col">Total de la orden</th>
                                        <th scope="col">Estado de pago</th>
                                        <th scope="col">Tipo de pago</th>
                                        <th scope="col">Cupón</th>
                                        <th scope="col">Dirección</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"><a href="#" class="fw-semibold">{{Folio}}</a></th>
                                        <td>{{Productos}}</td>
                                        <td>{{Total de la orden}}</td>
                                        <td>{{Estado de pago}}</td>
                                        <td>{{Tipo de pago}}</td>
                                        <td>{{Cupón}}</td>
                                        <td>{{Dirección}}</td>
                                        <td>{{Status}}</td>
                                        <td><a href="#" class="link-success">Ver más <i class="ri-arrow-right-line align-middle"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                </div>
                    <!--end row-->

            </div>
            

            <?php include "../layouts/footer.template.php"?>
        </div>
        <!-- end main content-->

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
</body>


</html>