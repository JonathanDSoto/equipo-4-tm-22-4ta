<?php 
    include_once "../app/config.php";
    include '..\app\TagsController.php';
    include '..\app\CategoriasController.php';
    include '..\app\BrandController.php';
    $brands = new BrandController();
    $data_brands = $brands->getBrands();
    $categorias = new CategoriasController();
    $data_categorias = $categorias->getCategoria();
    $tags = new TagsController();
    $data_tags = $tags->getTags();
?> 
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
    <link href="<?= BASE_PATH?>public/libs/dropzone/dropzone.css" rel="stylesheet" type="text/css" />
    <?php include "../layouts/head.template.php"; ?>
    <!-- Plugins css -->
</head>
<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php include "../layouts/nav.template.php"; ?>
        <!-- ========== App Menu ========== -->
        <?php include "../layouts/sidebar.template.php";?>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
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
                                <h4 class="mb-sm-0">Crear producto</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item">Productos</li>
                                        <li class="breadcrumb-item active">Crear producto</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- Formulario -->
                    <form enctype="multipart/form-data" id="createproduct-form" autocomplete="off" class="needs-validation " onsubmit="return validateSubmit()">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label" for="name">Nombre del producto</label>
                                            <input type="hidden" class="form-control" id="formAction" name="formAction" value="add">
                                            <input type="text" class="form-control d-none" id="product-id-input">
                                            <input type="text" class="form-control" id="name" placeholder="Ingresa el nombre del producto" name="name"
                                                oninput="nameCheck()" onblur="nameCheck()">
                                            <div id="nameErrorDiv" style="display: none" class="alert alert-warning alert-dismissible alert-outline shadow fade show" role="alert">
                                                <strong id="nameError"></strong>
                                            </div>
                                            <div class="invalid-feedback">Please Enter a product title.</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Descripción</h5>
                                    </div>
                                    <!-- end card body -->
                                    <div class="card-body">
                                        <div>
                                        <div class="form-floating">
                                            <textarea class="form-control" name="description" placeholder="Leave a comment here" id="description" oninput="descriptionCheck()" onblur="descriptionCheck()"></textarea>
                                            <label for="description">Ingresa una descripción</label>
                                            <div id="descriptionErrorDiv" style="display: none" class="alert alert-warning alert-dismissible alert-outline shadow fade show" role="alert">
                                            <strong id="descriptionError"></strong>
                                        </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->   
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Caracteristicás</h5>
                                    </div>
                                    <!-- end card body -->
                                    <div class="card-body">
                                        <div>
                                        <div class="form-floating">
                                            <textarea class="form-control" name="features" placeholder="Leave a comment here" id="features" oninput="featuresCheck()" onblur="featuresCheck()"></textarea>
                                            <label for="featuresa">Ingresa las caracteristicas</label>
                                            <div id="featuresErrorDiv" style="display: none" class="alert alert-warning alert-dismissible alert-outline shadow fade show" role="alert">
                                                <strong id="featuresError"></strong>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->  
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Categorias</h5>
                                    </div>
                                    <div class="card-body">
                                            <div class="flex-grow-1">
                                                <select name="categoriesUno" class="form-select">
                                                    <option>Selecciona Categoria</option>
                                                    <option v-for="categoria in categories" :value="categoria.id">{{categoria.id}}.-{{categoria.name}}</option>
                                                </select>
                                                <select name="categoriesDos" class="form-select mt-2">
                                                <option>Selecciona Categoria</option>
                                                    <option v-for="categoria in categories" :value="categoria.id">{{categoria.id}}.-{{categoria.name}}</option>
                                                </select>
                                            </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Brand</h5>
                                    </div>
                                    <div class="card-body">
                                        <select class="form-select" id="choices-category-input" name="brand_id" data-choices data-choices-search-false>
                                            <option>Selecciona Brand/Marca</option>
                                            <option v-for="brand in brands" :value="brand.id">{{brand.id}}.-{{brand.name}}</option>
                                        </select>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Tags</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="hstack gap-3 align-items-start">
                                            <div class="flex-grow-1">
                                                <select name="tagsUno" class="form-select">
                                                    <option>Selecciona Tag</option>
                                                    <option v-for="tag in tags" :value="tag.id">{{tag.id}}.-{{tag.name}}</option>
                                                </select>
                                                <select name="tagsDos" class="form-select mt-2">
                                                    <option>Selecciona Tag</option>
                                                    <option v-for="tag in tags" :value="tag.id">{{tag.id}}.-{{tag.name}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Cover</h5>
                                    </div>
                                    <div class="card-body">
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" name="cover" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    </div>
                                </div>
                                <!-- end card -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Slug</h5>
                                    </div>
                                    <!-- end card body -->
                                    <div class="card-body">
                                        <div>
                                        <div class="form-floating">
                                            <input class="form-control" name="slug" placeholder="Leave a comment here" id="slug" oninput="slugCheck()" onblur="slugCheck()">
                                            <label for="slug">Ingresa slug</label>
                                            <div id="slugErrorDiv" style="display: none" class="alert alert-warning alert-dismissible alert-outline shadow fade show" role="alert">
                                                <strong id="slugError"></strong>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->  
                            </div>
                            <!-- end col -->
                            <div class="w-100">
                                <div class="text-center mb-3">
                                    <button type="submit" class="btn btn-success w-sm btn-lg ">Crear producto</button>
                                    <div id="submitErrorDiv" style="display: none" class="alert alert-warning alert-dismissible alert-outline shadow fade show" role="alert">
                                        <strong id="submitError"></strong>
                                    </div>
                                    <input type="hidden" name="action" action="create" value="create">
                                    <input type="hidden" name="global_token" value="<?= $_SESSION['global_token'] ?>">
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </form>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <?php include "../layouts/footer.template.php"; ?>
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

    <?php include "../layouts/scripts.template.php";?>
    <!-- ckeditor -->
    <script src="<?= BASE_PATH ?>public/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
    <!-- dropzone js -->
    <script src="<?= BASE_PATH ?>public/libs/dropzone/dropzone-min.js"></script>
    <script src="<?= BASE_PATH ?>public/js/pages/ecommerce-product-create.init.js"></script>
    <!-- Vue js -->
    <script src="https://unpkg.com/vue@3"></script>
    <!--SweetAlert-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--Javascript-->
    <script type="text/javascript">
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
    <!--script vue -->
    <script>
            const { createApp } = Vue
            const app = createApp({
                data(){
                    return {

                        tags: <?php echo json_encode($data_tags);?>,
                        brands: <?php echo json_encode($data_brands);?>,
                        categories: <?php echo json_encode($data_categorias);?>,

                    }
                },
                methods:{
                },
                mounted() {

                },
            }).mount('#app')


        </script>


</body>


</html>