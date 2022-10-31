<?php
    include "../app/config.php"
?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<head>

    <?php include "../layouts/head.template.php"?>
    <title>Detalles orden</title>
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
                                <h4 class="mb-sm-0">Detalles orden</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a>Ordenes</a></li>
                                        <li class="breadcrumb-item active">Detalles orden</li>
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
                    <div class="w-100"></div>
                            <!--end col-->
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="text-end">
                                    <h4 class="card-title mb-0 flex-grow-1 text-start">Detalles de orden #</h4>
                                    <a href="#editModal" data-bs-toggle="modal" class="btn btn-light shadow-lg"><i class=" ri-pencil-fill"></i></a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table mb-0 table-borderless">
                                        <tbody>
                                            <tr>
                                                <th><span class="fw-medium">Folio</span></th>
                                                <td>{{Folio}}</td>
                                            </tr>
                                            <tr>
                                                <th><span class="fw-medium">Nombre del cliente</span></th>
                                                <td>{{Nombre del cliente}}</td>
                                            </tr>
                                            <tr>
                                                <th><span class="fw-medium">Email</span></th>
                                                <td>{{Email}}</td>
                                            </tr>
                                            <tr>
                                                <th><span class="fw-medium">Numero celular</span></th>
                                                <td>{{Numero celular}}</td>
                                            </tr>
                                            <tr>
                                                <th><span class="fw-medium">Nivel</span></th>
                                                <td>{{Nivel}}</td>
                                            </tr>
                                            <tr>
                                                <th><span class="fw-medium">Dirección</span></th>
                                                <td>{{Dirección}}</td>
                                            </tr>
                                            <tr>
                                                <th><span class="fw-medium">Numero celular(Dirección)</span></th>
                                                <td>{{Numero celular(Dirección)}}</td>
                                            </tr>
                                            <tr>
                                                <th><span class="fw-medium">Total:</span></th>
                                                <td>{{Total}}</td>
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
                                        <th scope="col">Producto</th>
                                        <th scope="col">Imagen</th>
                                        <th scope="col">Presentación</th>
                                        <th scope="col">Monto</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">{{Producto}}</th>
                                        <td>
                                            <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                                <img src="" class="img-fluid d-block" alt="img...">    
                                            </div>
                                        </td>
                                        <td>{{Monto}}</td>
                                        <td>{{Estado de pago}}</td>
                                        <td>{{Cantidad}}</td>
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
                                    <span class="input-group-text" id="basic-addon1">ID</span>
                                    <input type="text" class="form-control" placeholder="cupon OP 20%" aria-label="Username" aria-describedby="basic-addon1" >
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Folio</span>
                                    <input type="text" class="form-control" placeholder="20PERCEN22" aria-label="Username" aria-describedby="basic-addon1" >
                                    
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Pagado</span>
                                    <select class="form-control">
                                        <option value=""><--Selecciona una opcion--></option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                        
                                    </select>
                                    
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Client</span>
                                    <input type="number" class="form-control" placeholder="1000" aria-label="Username" aria-describedby="basic-addon1" name="created_by" >
                                    
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Address</span>
                                    <input type="number" class="form-control" placeholder="10" aria-label="Username" aria-describedby="basic-addon1" name="role" >
                                    
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Status</span>
                                    <select class="form-control">
                                        <option value=""><--Selecciona una opcion--></option>
                                        <option value="Activo">Activo</option>
                                        <option value="Inactivo">Inactivo</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Tipo de pago:</span>
                                    <select class="form-control">
                                        <option value=""><--Selecciona una opcion--></option>
                                        <option value="No se">No se</option>
                                        <option value="No se">No se</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Cupón</span>
                                    <input type="number" class="form-control" placeholder="100" aria-label="Username" aria-describedby="basic-addon1" >
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