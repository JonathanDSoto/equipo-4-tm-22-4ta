<?php 
    include_once "../app/config.php";
    include '..\app\ClientsController.php';
    $clientes = new ClientsController();
    $data = $clientes->getClientes();
    #var_dump($data);
?> 

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<head>

    <?php include '../layouts/head.template.php' ?>

    <!-- swiper css -->
    <link rel="stylesheet" href="<?= BASE_PATH ?>/libs/swiper/swiper-bundle.min.css">
    <title>Clientes</title>


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
                                <h4 class="mb-sm-0">Clientes</h4>
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
                                        <h5 class="card-title mb-0 flex-grow-1">Clientes</h5>
                                        <div class="flex-shrink-0">
                                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal" @click="añadirCliente"><i class="ri-add-line align-bottom me-1"></i> Registrar cliente</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div>
                                        <ul class="nav nav-tabs nav-tabs-custom nav-success mb-3" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active All py-3" data-bs-toggle="tab" id="All" href="#home1" role="tab" aria-selected="true">
                                                    <i class="ri-store-2-fill me-1 align-bottom" style="text-decoration: none; cursor:default;"></i> Clientes</a>
                                            </li>
                                        </ul>

                                        <div class="table-responsive table-card mb-1">
                                            <table class="table table-nowrap align-middle" id="orderTable">
                                                <thead class="text-muted table-light">
                                                    <tr class="text-uppercase">
                                                        <th>ID</th>
                                                        <th>Nombre</th>
                                                        <th>Email</th>
                                                        <th>Numero celular</th>
                                                        <th>Suscripción</th>
                                                        <th>Nivel</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list form-check-all">
                                                    <tr v-for="(cliente, index) in clientes">
                                                        <td><a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">{{cliente.id}}</a></td>
                                                        <td>{{cliente.name}}</td>
                                                        <td>{{cliente.email}}</td>
                                                        <td>{{cliente.phone_number}}</td>
                                                        <td><span class="badge text-bg-success" v-if="cliente.is_suscribed == 1">Si</span><span class="badge text-bg-danger" v-if="cliente.is_suscribed == 0">No</span></td>
                                                        <td><span class="badge badge-gradient-warning" v-if="cliente.level_id == 3">>VIP</span><span class="badge badge-gradient-secondary" v-if="cliente.level_id == 1">NORMAL</span><span class="badge badge-gradient-primary" v-if="cliente.level_id == 2">PREMIUM</span></td>
                                                        
                                                        </td>
                                                        <td>
                                                            <ul class="list-inline hstack gap-2 mb-0">
                                                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="View">
                                                                    <a :href="'<?= BASE_PATH?>clientes/cliente='+cliente.id" class="text-primary d-inline-block">
                                                                        <i class="ri-eye-fill fs-16"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit" @click="editarCliente(cliente)">
                                                                    <a href="#showModal" data-bs-toggle="modal" class="text-primary d-inline-block edit-item-btn">
                                                                        <i class="ri-pencil-fill fs-16"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove" @click="eliminarCliente(cliente)">
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
                                    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-light p-3">
                                                <h5 class="modal-title" id="exampleModalLabel">{{titulo_modal}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                            </div>
                                            <form method="POST" action="<?= BASE_PATH ?>Controlador-clientes">
                                                <div class="modal-body">
                                                    <input type="hidden" id="id-field" />

                                                    <div class="mb-3" id="modal-id">
                                                        <label for="orderId" class="form-label">Nombre</label>
                                                        <input type="text" id="orderId" class="form-control" placeholder="Nombre del cliente" name="name" v-if="mostrar_inputs_añadir == true">

                                                        <input type="text" id="orderId" class="form-control" placeholder="Nombre del cliente" name="name" v-if="mostrar_inputs_editar == true" :value="datos_cliente.name">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="customername-field" class="form-label">Email</label>
                                                        <input type="text" id="customername-field" class="form-control" placeholder="Correo" name="email" v-if="mostrar_inputs_añadir == true">

                                                        <input type="text" id="customername-field" class="form-control" placeholder="Correo" name="email" v-if="mostrar_inputs_editar == true" :value="datos_cliente.email">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="productname-field" class="form-label">Numero</label>
                                                        
                                                        <input type="text" id="amount-field" class="form-control" placeholder="Número de contacto" name="phone_number" v-if="mostrar_inputs_añadir == true">

                                                        <input type="text" id="amount-field" class="form-control" placeholder="Número de contacto" name="phone_number" v-if="mostrar_inputs_editar == true" :value="datos_cliente.phone_number">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="productname-field" class="form-label">Contraseña</label>
                                                        
                                                        <input type="text" id="amount-field" class="form-control" placeholder="Contraseña" name="password" v-if="mostrar_inputs_añadir == true">

                                                        <input type="text" id="amount-field" class="form-control" placeholder="Contraseña" name="password" v-if="mostrar_inputs_editar == true" :value="datos_cliente.password">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="date-field" class="form-label">Suscripción</label>
                                                        <select class="form-control" data-trigger name="is_suscribed" id="productname-field" v-if="mostrar_inputs_añadir == true">
                                                            <option>Está Suscrito?</option>
                                                            <option value="1">Si</option>
                                                            <option value="0">No</option>
                                                        </select>

                                                        <select class="form-control" data-trigger name="is_suscribed" id="productname-field" v-if="mostrar_inputs_editar == true" :value="datos_cliente.is_suscribed">
                                                            <option value="1">Si</option>
                                                            <option value="0">No</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div>
                                                            <label for="amount-field" class="form-label">Nivel</label>
                                                            <select class="form-control" data-trigger name="level_id" id="productname-field" v-if="mostrar_inputs_añadir == true">
                                                                <option>Seleccione Nivel de Suscripción</option>
                                                                <option value="1">Normal</option>
                                                                <option value="3">Vip</option>
                                                                <option value="2">Premium</option>
                                                            </select>
                                                            <select class="form-control" data-trigger name="level_id" id="productname-field" v-if="mostrar_inputs_editar == true" :value="datos_cliente.level_id">
                                                                <option value="1">Normal</option>
                                                                <option value="3">Vip</option>
                                                                <option value="2">Premium</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                
                                                <div class="modal-footer">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-success" id="add-btn">{{btn_guardar_cambios}}
                                                        <input type="hidden" name="action" :action="accion" :value="accion">
                                                        <input type="hidden" name="global_token" value="<?= $_SESSION['global_token'] ?>">
                                                        <input type="hidden" name="id" :value="datos_cliente.id">
                                                        </button>
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
                                                        <h4>Estas seguro que deseas eliminar este cliente?</h4>
                                                        <p class="text-muted fs-15 mb-4">Eliminar el clilente eliminará toda su información de nuestra base de datos.</p>
                                                        <div class="hstack gap-2 justify-content-center remove">
                                                            <button class="btn btn-link link-success fw-medium text-decoration-none" id="deleteRecord-close" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Cerrar</button>
                                                            <form method="POST" action="<?= BASE_PATH ?>Controlador-clientes">
                                                            <button type="submit" class="btn btn-danger" id="delete-record">Si, eliminar
                                                            <input type="hidden" name="action" action="eliminarCliente" value="eliminarCliente">
                                                            <input type="hidden" name="id" :value="id_cliente_eliminar.id">
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
                        clientes: <?php echo json_encode($data); ?>,
                        id_cliente_eliminar: {id: ""},
                        datos_cliente: {id: "", name:"", email:"",phone:"", suscribed:"", level:"", password:""},
                        titulo_modal: "",
                        accion: "",
                        mostrar_inputs_editar: true,
                        mostrar_inputs_añadir: true,
                        btn_guardar_cambios: "",
                        
                    }
                },
                methods:{
                    eliminarCliente(cliente){
                        this.id_cliente_eliminar = cliente;
                    },
                    añadirCliente(){
                        this.titulo_modal = "Añadir Nuevo Cliente";
                        this.accion = "crearCliente";
                        this.btn_guardar_cambios = "Guardar";
                        this.mostrar_inputs_añadir = true;
                        this.mostrar_inputs_editar = false;

                    },
                    editarCliente(cliente){
                        this.datos_cliente = cliente;
                        this.titulo_modal = "Editar Cliente";
                        this.accion = "actualizarCliente";
                        this.btn_guardar_cambios = "Guardar Cambios";
                        this.mostrar_inputs_añadir = false;
                        this.mostrar_inputs_editar = true;
                    }
                    
                },
                mounted() {

                },
            }).mount('#app')
        </script>


</body>


</html>



