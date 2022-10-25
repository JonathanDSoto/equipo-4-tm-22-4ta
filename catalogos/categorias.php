<?php 
    include_once "../app/config.php";
    include '..\app\CategoriasController.php';
    $categorias = new CategoriasController();
    $data = $categorias->getCategoria();
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
    
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content" id="app">
        <div class="page-content mb-n5">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Categoria</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
            </div>
            <!-- container-fluid -->
        </div>
            
            <button class="btn btn-success ms-5" data-bs-toggle="modal" data-bs-target="#exampleModal" @click="agregarCategoria">
                Crear categoria
                <i class="mdi mdi-plus-thick"></i>
            </button>
            <div class="table-responsive mx-5 mb-5">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Slug</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(categoria, index) in categorias">
                
                            <td><a href="#" class="fw-semibold">{{categoria.id}}</a></td>
                            <td>                            
                                <div class="d-flex gap-2 align-items-center">
                                    <div class="flex-grow-1">
                                    {{categoria.name}}
                                    </div>
                                </div>
                            </td>
                            <td>{{categoria.description}}</td>
                            <!-- <td class="text-danger"><i class="ri-close-circle-line fs-17 align-middle">Cancel</i></td> -->
                            <td>{{categoria.slug}}</td>
                            <td class="text-center row">
                                <div class="col row-cols-12">
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" @click="editCategoria(categoria)">
                                        <i class="mdi mdi-pencil"></i>
                                    </button>
                                    <form method="POST" action="<?= BASE_PATH ?>Controlador-categorias">
                                        <button type="submit" class="btn btn-danger" @click="alertaEliminar">
                                            <i class="mdi mdi-trash-can-outline"></i>
                                            <input type="hidden" name="action" action="eliminarCategoria" value="eliminarCategoria">
                                            <input type="hidden" name="id" :value="categoria.id">
                                            <input type="hidden" name="global_token" value="<?= $_SESSION['global_token'] ?>">
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <!-- end table -->
            </div>
            <!-- Modal de crear -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{titulo_modal}}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?= BASE_PATH ?>Controlador-categorias">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Nombre</span>
                                <input type="text" class="form-control" placeholder="Nombre" aria-label="Username" aria-describedby="basic-addon1" v-if="mostrar_inputs_añadir == true" name="name" >
                                <input type="text" class="form-control" placeholder="Nombre" aria-label="Username" aria-describedby="basic-addon1" v-if="mostrar_inputs_editar == true" name="name" :value="datos_categoria.name">
                                
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Descripción</span>
                                <input type="text" class="form-control" placeholder="Descripción" aria-label="Username" aria-describedby="basic-addon1" v-if="mostrar_inputs_añadir == true" name="description">
                                <input type="text" class="form-control" placeholder="Descripción" aria-label="Username" aria-describedby="basic-addon1" v-if="mostrar_inputs_editar == true" name="description" :value="datos_categoria.description">
                                
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Slug</span>
                                <input type="text" class="form-control" placeholder="Slug" aria-label="Username" aria-describedby="basic-addon1" v-if="mostrar_inputs_añadir == true" name="slug">
                                <input type="text" class="form-control" placeholder="Slug" aria-label="Username" aria-describedby="basic-addon1" v-if="mostrar_inputs_editar == true" name="slug" :value="datos_categoria.slug">
                            
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success" @click="alertaEditar">Guardar {{btn_guardar_cambios}}</button>
                                <input type="hidden" name="action" :action="accion" :value="accion">
                                <input type="hidden" name="global_token" value="<?= $_SESSION['global_token'] ?>">
                                <input type="hidden" name="id" :value="datos_categoria.id">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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

                        categorias: <?php echo json_encode($data);?>,
                        datos_categoria: {id: "",nombre: "", descripcion: "", slug: ""},
                        titulo_modal: "",
                        accion: "",
                        mostrar_inputs_editar: true,
                        mostrar_inputs_añadir: true,
                        btn_guardar_cambios: "",
                    }
                },
                methods:{
                    editCategoria(categoria){
                        this.titulo_modal = "Editar Categoria";
                        this.datos_categoria = categoria;
                        this.accion = "actualizarCategoria";
                        this.btn_guardar_cambios = "Cambios";
                        this.mostrar_inputs_editar = true;
                        this.mostrar_inputs_añadir = false;
                    },
                    agregarCategoria(){
                        this.titulo_modal = "Agregar Categoria Nueva";
                        this.accion = "crearCategoria";   
                        this.mostrar_añadir_foto = true;
                        this.btn_guardar_cambios = "";
                        this.mostrar_inputs_editar = false;
                        this.mostrar_inputs_añadir = true;
                    },
                    alertaEditar(){
                        Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Cambios Guardados',
                        showConfirmButton: false,
                        timer: 10000
                        })
                    },
                    alertaEliminar(){
                        Swal.fire({
                        position: 'center',
                        icon: 'info',
                        title: 'Categoria Eliminada',
                        showConfirmButton: false,
                        timer: 15000
                        })
                    },
                },
                mounted() {

                },
            }).mount('#app')


        </script>

</body>


</html>



