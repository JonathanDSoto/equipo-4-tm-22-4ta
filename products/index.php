<?php 
    include_once "../app/config.php";
    include '..\app\ProductsController.php';
      $producto = new ProductsController();
      $data = $producto->getProducts();
      #error_reporting(0);
?> 
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
	<?php include "../layouts/head.template.php"; ?>
    <!-- nouisliderribute css -->
    <link rel="stylesheet" href="<?= BASE_PATH ?>public/libs/nouislider/nouislider.min.css">
    <!-- gridjs css -->
    <link rel="stylesheet" href="<?= BASE_PATH ?>public/libs/gridjs/theme/mermaid.min.css">
    <!-- Vue js -->
    <script src="https://unpkg.com/vue@3"></script>
</head>
<body>
    <!-- Begin page -->
    <div id="layout-wrapper" >
    	<?php include "../layouts/nav.template.php"; ?>
        <!-- ========== App Menu ========== -->
        <?php include "../layouts/sidebar.template.php"; ?>
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
                                <h4 class="mb-sm-0">Productos</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                </div>
                <!-- container-fluid -->
            </div>
            <a href="<?=BASE_PATH?>productos/agregar-producto" class="btn btn-success ms-5 mb-4" >Agregar producto<i class="mdi mdi-plus-thick"></i></a>
            <div class="mt-1 ms-5 me-5 mb-5 ">
                <div class="row row-cols-1 row-cols-md-5 g-4" >
                    <div class="col" v-for="(producto, index) in productos">
                        <div class="card h-100" >
                            <img :src="producto.cover" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{producto.name}}</h5>
                                <p :class="classTruncate">{{producto.description}}</p><a @click="cambiarClass(index)" href="#">Ver Más</a>
                                <hr>
                                <p class="text-end me-4  text-dark"></p>
                                <div class="row">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#editModal" class="btn btn-warning col-6">Editar</button>
                                    <button type="button" class="btn btn-danger col-6">Eliminar</button>
                                    <a href="<?=BASE_PATH?>productos/producto=2=a" type="button" class="btn btn-info col-12">Ver Detalles</a>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            <?php include "../layouts/footer.template.php"; ?>
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
                    <form enctype="multipart/form-data" onsubmit="return validateSubmit()">
                        <div class="row g-3">
                            <div class="col-xxl-12">
                                <div>
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Introducir nombre de producto"
                                        oninput="nameCheck()" onblur="nameCheck()">
                                    <div id="nameErrorDiv" style="display: none" class="alert alert-warning alert-dismissible alert-outline shadow fade show" role="alert">
                                        <strong id="nameError"></strong>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-12">
                                <label for="slugInput" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" placeholder="Introducir Slug"
                                    oninput="slugCheck()" onblur="slugCheck()">
                                <div id="slugErrorDiv" style="display: none" class="alert alert-warning alert-dismissible alert-outline shadow fade show" role="alert">
                                    <strong id="slugError"></strong>
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-12">
                                <div>
                                    <label for="description" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="description" rows="3" oninput="descriptionCheck()" onblur="descriptionCheck()"></textarea>
                                    <div id="descriptionErrorDiv" style="display: none" class="alert alert-warning alert-dismissible alert-outline shadow fade show" role="alert">
                                        <strong id="descriptionError"></strong>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-12">
                                <label for="featureInput" class="form-label">Caracteristicas</label>
                                <textarea class="form-control" id="features" rows="3" oninput="featuresCheck()" onblur="featuresCheck()"></textarea>
                                <div id="featuresErrorDiv" style="display: none" class="alert alert-warning alert-dismissible alert-outline shadow fade show" role="alert">
                                    <strong id="featuresError"></strong>
                                </div>
                            </div><!--end col-->
                            <div class="mb-3 col-xxl-12">
                                <label for="formFile" class="form-label">Imagen</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-success">Agregar</button>
                                    <div id="submitErrorDiv" style="display: none" class="alert alert-warning alert-dismissible alert-outline shadow fade show" role="alert">
                                        <strong id="submitError"></strong>
                                    </div>
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
    <?php include "../layouts/scripts.template.php"; ?>
    <!--Javascript-->
    <script type="text/javascript">
        //El REGEX de todo esto aceptara letras y espacios
        //El slug puede aceptar --
        //Descrip y features acepta ., y numero
        //Verificar Nombre
        function nameCheck(){
            var submitErrorDiv = document.getElementById('submitErrorDiv');
            var nameErrorDiv = document.getElementById('nameErrorDiv');
            var nameError = document.getElementById('nameError');
            var name = document.getElementById('name').value;
            var nameRegex = /^[a-zA-Z 0-9,."/']{5,}$/;
            var correctName = nameRegex.test(name);
            if(name == null || name == ""){
                showNameError(nameErrorDiv, nameError, "El nombre es necesario");
                return false;
            }if(name.length <5){
                showNameError(nameErrorDiv, nameError, "El nombre debe tener 5 o mas caracteres");
                return false;
            }else if(!correctName){
                showNameError(nameErrorDiv, nameError, "El nombre solo puede contener caracteres alfanumericos y caracteres: ,./'");
                return false;
            }
            hideNameError(nameErrorDiv);
            hideSubmitError(submitErrorDiv);
            return true;
        }
        function showNameError(nameErrorDiv, nameError, message){
            nameErrorDiv.style.display = 'block';
            nameError.innerHTML = message;
        }
        function hideNameError(nameErrorDiv){
            nameErrorDiv.style.display = 'none';
        }
        //Verificar Slug
        function slugCheck(){
            var submitErrorDiv = document.getElementById('submitErrorDiv');
            var slugErrorDiv = document.getElementById('slugErrorDiv');
            var slugError = document.getElementById('slugError');
            var slug = document.getElementById('slug').value;
            var slugRegex = /^[a-z0-9-]{5,}$/;
            var correctSlug = slugRegex.test(slug);
            if(slug == null || slug == ""){
                showSlugError(slugErrorDiv, slugError, "El slug es necesario");
                return false;
            }if(slug.length <5){
                showSlugError(slugErrorDiv, slugError, "El slug debe tener 5 o mas caracteres");
                return false;
            }else if(!correctSlug){
                showSlugError(slugErrorDiv, slugError, "El slug solo puede contener caracteres alfabeticos en minuscula, numericos y el caracter: -");
                return false;
            }
            hideSlugError(slugErrorDiv);
            hideSubmitError(submitErrorDiv);
            return true;
        }
        function showSlugError(slugErrorDiv, slugError, message){
            slugErrorDiv.style.display = 'block';
            slugError.innerHTML = message;
        }
        function hideSlugError(slugErrorDiv){
            slugErrorDiv.style.display = 'none';
        }
        //Verificar descripcion
        function descriptionCheck(){
            var submitErrorDiv = document.getElementById('submitErrorDiv');
            var descriptionErrorDiv = document.getElementById('descriptionErrorDiv');
            var descriptionError = document.getElementById('descriptionError');
            var description = document.getElementById('description').value;
            var descriptionRegex = /^[a-zA-Z 0-9,."/']{5,}$/;
            var correctDescription = descriptionRegex.test(description);
            if(description == null || description == ""){
                showDescriptionError(descriptionErrorDiv, descriptionError, "La descripcion es necesaria");
                return false;
            }if(description.length <5){
                showDescriptionError(descriptionErrorDiv, descriptionError, "La descripcion debe tener 5 o mas caracteres");
                return false;
            }else if(!correctDescription){
                showDescriptionError(descriptionErrorDiv, descriptionError, "La descripcion solo puede contener caracteres alfanumericos y caracteres: ,./'");
                return false;
            }
            hideDescriptionError(descriptionErrorDiv);
            hideSubmitError(submitErrorDiv);
            return true;
        }
        function showDescriptionError(descriptionErrorDiv, descriptionError, message){
            descriptionErrorDiv.style.display = 'block';
            descriptionError.innerHTML = message;
        }
        function hideDescriptionError(descriptionErrorDiv){
            descriptionErrorDiv.style.display = 'none';
        }
        //Verificar caracteristicas
        function featuresCheck(){
            var submitErrorDiv = document.getElementById('submitErrorDiv');
            var featuresErrorDiv = document.getElementById('featuresErrorDiv');
            var featuresError = document.getElementById('featuresError');
            var features = document.getElementById('features').value;
            var featuresRegex = /^[a-zA-Z 0-9,."/']{5,}$/;
            var correctFeatures = featuresRegex.test(features);
            if(features == null || features == ""){
                showFeaturesError(featuresErrorDiv, featuresError, "Las caracteristicas son necesarias");
                return false;
            }else if(features.length <5){
                showFeaturesError(featuresErrorDiv, featuresError, "Las caracateristicas debe tener 5 o mas caracteres");
                return false;
            }else if(!correctFeatures){
                showFeaturesError(featuresErrorDiv, featuresError, "Las caracteristicas solo puede contener caracteres alfanumericos y caracteres: ,./'");
                return false;
            }
            hideFeaturesError(featuresErrorDiv);
            hideSubmitError(submitErrorDiv);
            return true;
        }
        function showFeaturesError(featuresErrorDiv, featuresError, message){
            featuresErrorDiv.style.display = 'block';
            featuresError.innerHTML = message;
        }
        function hideFeaturesError(featuresErrorDiv){
            featuresErrorDiv.style.display = 'none';
        }
        //Verificar si todo lo introducido esta correcto o no con el submit button
        function validateSubmit(){
            var submitErrorDiv = document.getElementById('submitErrorDiv');
            var submitError = document.getElementById('submitError');
            var nameErrorDiv = document.getElementById('nameErrorDiv');
            var nameError = document.getElementById('nameError');
            var descriptionErrorDiv = document.getElementById('descriptionErrorDiv');
            var descriptionError = document.getElementById('descriptionError');
            var slugErrorDiv = document.getElementById('slugErrorDiv');
            var slugError = document.getElementById('slugError');
            var featuresErrorDiv = document.getElementById('featuresErrorDiv');
            var featuresError = document.getElementById('featuresError');
            var name = document.getElementById('name').value;
            var nameRegex = /^[a-zA-Z 0-9,."/']+$/;
            var correctName = nameRegex.text(name);
            var slug = document.getElementById('slug').value;
            var slugRegex = /^[a-z0-9-]{5,}$/;
            var correctSlug = slugRegex.test(slug);
            var description = document.getElementById('description').value;
            var descriptionRegex = /^[a-zA-Z 0-9,."/']{5,}$/;
            var correctDescription = descriptionRegex.test(description);
            var features = document.getElementById('features').value;
            var featuresRegex = /^[a-zA-Z0-9,."/']{5,}$/;
            var correctFeatures = featuresRegex.test(features);
            if(!correctName){
                showNameError(nameErrorDiv, nameError, "Este campo es invalido");
            }
            if(!correctSlug){
                showSlugError(slugErrorDiv, slugError, "Este campo es invalido");
            }
            if(!correctDescription){
                showDescriptionError(descriptionErrorDiv, descriptionError, "Este campo es invalido");
            }
            if(!correctFeatures){
                showFeaturesError(featuresErrorDiv, featuresError, "Este campo es invalido");
            }
            if(!correctName || !correctSlug || !correctDescription || !correctFeatures){
                showSubmitError(submitErrorDiv, submitError, "Hay datos incorrectos");
                return false;
            }
            hideNameError(nameErrorDiv);
            hideSlugError(slugErrorDiv);
            hideDescriptionError(descriptionErrorDiv);
            hideFeaturesError(featuresErrorDiv);
            hideSubmitError(submitErrorDiv);
            return true;
        }
        function showSubmitError(submitErrorDiv, submitError, message){
            submitErrorDiv.style.display = 'block';
            submitError.innerHTML = message;
        }
        function hideSubmitError(submitErrorDiv){
            submitErrorDiv.style.display = 'none';
        }
    </script>
    <!-- nouisliderribute js -->
    <script src="<?= BASE_PATH ?>public/libs/nouislider/nouislider.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/wnumb/wNumb.min.js"></script>
    <!-- gridjs js -->
    <script src="<?= BASE_PATH ?>public/libs/gridjs/gridjs.umd.js"></script>
    <script src="../../../../unpkg.com/gridjs%405.1.0/plugins/selection/dist/selection.umd.js"></script>
    <!-- ecommerce product list -->
    <script src="<?= BASE_PATH ?>public/js/pages/ecommerce-product-list.init.js"></script>
    <script type="text/javascript">
        const { createApp } = Vue
        const app = createApp({
            data(){
                return {
                    productos: <?= json_encode($data);?>,
                    classTruncate:'card-text text-truncate d-block',
                    mas: 'más'
                }
            },
            methods:{
                cambiarClass(index){
                    if (this.classTruncate == 'card-text text-truncate d-block') {
                        this.classTruncate = 'card-text';
                        mas = 'menos';
                    } else {
                        this.classTruncate = 'card-text text-truncate d-block';
                        mas = 'más';
                    }
                },
            },
            mounted() {
            },
        }).mount('#app')
    </script>
</body>
</html>