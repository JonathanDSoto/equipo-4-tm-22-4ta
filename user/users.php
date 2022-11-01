<?php 
    include_once "../app/config.php";
    include '..\app\UsersController.php';
    $usuarios = new UsersController();
    $data = $usuarios->getUsuarios();
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
        <div class="page-content mb-n5">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Usuarios</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active">Usuarios</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- end page title -->
            </div>
        <!-- container-fluid -->
        </div>
            <button class="btn btn-success ms-5" data-bs-toggle="modal" data-bs-target="#exampleModal" @click="agregarUser">
                Crear usuario
                <i class="mdi mdi-plus-thick"></i>
            </button>
            <div class="table-responsive mx-5 mb-5">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Numero telefonico</th>
                            <th scope="col">Creado por:</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Fecha de creación</th>
                            <th scope="col">Fecha de actualización</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(user, index) in users">
                            <td><a :href="'<?= BASE_PATH?>usuarios/usuario='+user.id" class="fw-semibold">{{user.id}}</a></td>
                            <td>                            
                                <div class="d-flex gap-2 align-items-center">
                                    <div class="flex-shrink-0">
                                        <img :src="user.avatar" alt="avatar" class="avatar-xs rounded-circle" />
                                    </div>
                                    <div class="flex-grow-1">
                                    {{user.name ? user.name : "- - - - -"}}
                                    </div>
                                </div>
                            </td>
                            <td>{{user.lastname ? user.lastname : "- - - - -"}}</td>
                            <!-- <td class="text-danger"><i class="ri-close-circle-line fs-17 align-middle">Cancel</i></td> -->
                            <td>{{user.email ? user.email : "Sin correo electronico"}}</td>
                            <td>{{user.phone_number ? user.phone_number : "No disponible" }}</td>
                            <td>{{user.created_by ? user.created_by : "Sin creador"}}</td>
                            <td>{{user.role ? user.role : "Sin rol"}}</td>
                            <td>{{user.created_at ? user.created_at : "Sin fecha de creacion"}}</td>
                            <td>{{user.updated_at ? user.updated_at : "Sin fecha de actualizacion"}}</td>
                            <td class="text-center row">
                                <div class="col row-cols-12">
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" @click="editUser(user)">
                                        <i class="mdi mdi-pencil"></i>
                                    </button>
                                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editPhotoModal" @click="editarFotoUser(user)">
                                        <i class="mdi mdi-camera-flip"></i>
                                    </button>
                                    <form method="POST" action="<?= BASE_PATH ?>Controlador-usuarios">
                                        <button type="submit" class="btn btn-danger" @click="alertaEliminar">
                                            <i class="mdi mdi-trash-can-outline"></i>
                                            <input type="hidden" name="action" action="eliminarUsuario" value="eliminarUsuario">
                                            <input type="hidden" name="id" :value="user.id">
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
        <!-- Modal de crear y editar unidos -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{titulo_modal}}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" method="POST" action="<?= BASE_PATH ?>Controlador-usuarios" onsubmit="return validateSubmit()">
                            <!-- Nombre -->
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Nombre</span>
                                <!-- Input al crear -->
                                <input id="name" type="text" class="form-control" placeholder="Nombre" aria-label="Username" 
                                    aria-describedby="basic-addon1" name="name" v-if="mostrar_inputs_añadir == true"
                                    oninput="nameCheck()" onblur="nameCheck()">
                                <!-- Input al editar -->
                                <input id="nameAlt" type="text" class="form-control" placeholder="Nombre" aria-label="Username" 
                                    aria-describedby="basic-addon1" v-if="mostrar_inputs_editar == true" name="name" :value="datos_user.name"
                                    oninput="nameAltCheck()" onblur="nameAltCheck()">
                            </div>
                            <div id="nameErrorDiv" style="display: none" class="alert alert-warning alert-dismissible alert-outline shadow fade show" role="alert">
                                <strong id="nameError"></strong>
                            </div>
                            <div id="nameAltErrorDiv" style="display: none" class="alert alert-warning alert-dismissible alert-outline shadow fade show" role="alert">
                                <strong id="nameAltError"></strong>
                            </div>
                            <!-- Apellidos -->
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Apellidos</span>
                                <!-- Input al crear -->
                                <input id="lastname" type="text" class="form-control" placeholder="Apellidos" aria-label="Username" 
                                    aria-describedby="basic-addon1" name="lastname" v-if="mostrar_inputs_añadir == true"
                                    oninput="lastnameCheck()" onblur="lastnameCheck()">
                                <!-- Input al editar -->
                                <input id="lastnameAlt" type="text" class="form-control" placeholder="Apellidos" aria-label="Username" 
                                    aria-describedby="basic-addon1" name="lastname" v-if="mostrar_inputs_editar == true" :value="datos_user.lastname"
                                    oninput="lastnameAltCheck()" onblur="AltCheck()">
                            </div>
                            <div id="lastnameErrorDiv" style="display: none" class="alert alert-warning alert-dismissible alert-outline shadow fade show" role="alert">
                                <strong id="lastnameError"></strong>
                            </div>
                            <div id="lastnameAltErrorDiv" style="display: none" class="alert alert-warning alert-dismissible alert-outline shadow fade show" role="alert">
                                <strong id="lastnameAltError"></strong>
                            </div>
                            <!-- Email -->
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Email</span>
                                <!-- Input al crear -->
                                <input id="email" type="text" class="form-control" placeholder="example@example.com" aria-label="Username" 
                                    aria-describedby="basic-addon1" name="email" v-if="mostrar_inputs_añadir == true"
                                    oninput="emailCheck()" onblur="emailCheck()">
                                
                                <!-- Input al editar -->
                                <input id="emailAlt" type="text" class="form-control" placeholder="example@example.com" aria-label="Username" 
                                    aria-describedby="basic-addon1" name="email" v-if="mostrar_inputs_editar == true" :value="datos_user.email"
                                    oninput="emailAltCheck()" onblur="emailAltCheck()">
                                
                            </div>
                            <div id="emailErrorDiv" style="display: none" class="alert alert-warning alert-dismissible alert-outline shadow fade show" role="alert">
                                <strong id="emailError"></strong>
                            </div>
                            <div id="emailAltErrorDiv" style="display: none" class="alert alert-warning alert-dismissible alert-outline shadow fade show" role="alert">
                                <strong id="emailAltError"></strong>
                            </div>
                            <!-- Telefono -->
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Numero</span>
                                <!-- Input al crear -->
                                <input id="phone_number" type="text" class="form-control" placeholder="Numero" aria-label="Username"
                                    aria-describedby="basic-addon1" name="phone_number" v-if="mostrar_inputs_añadir == true"
                                    oninput="phoneNumberCheck()" onblur="phoneNumberCheck()">
                                
                                <!-- Input al editar -->
                                <input id="phone_numberAlt" type="text" class="form-control" placeholder="Numero" aria-label="Username" 
                                    aria-describedby="basic-addon1" name="phone_number" v-if="mostrar_inputs_editar == true" :value="datos_user.phone_number"
                                    oninput="phoneNumberAltCheck()" onblur="phoneNumberAltCheck()">
                            </div>
                            <div id="phoneNumberErrorDiv" style="display: none" class="alert alert-warning alert-dismissible alert-outline shadow fade show" role="alert">
                                <strong id="phoneNumberError"></strong>
                            </div>
                            <div id="phoneNumberAltErrorDiv" style="display: none" class="alert alert-warning alert-dismissible alert-outline shadow fade show" role="alert">
                                <strong id="phoneNumberAltError"></strong>
                            </div>
                            <!-- Creado por -->
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Creado por:</span>
                                <!-- Input al crear -->
                                <input id="created_by" type="text" class="form-control" placeholder="Creado por" aria-label="Username" 
                                    aria-describedby="basic-addon1" name="created_by" v-if="mostrar_inputs_añadir == true"
                                    oninput="createdByCheck()" onblur="createdByCheck()">
                                
                                <!-- Input al editar -->
                                <input id="created_byAlt" type="text" class="form-control" placeholder="Creado por" aria-label="Username" 
                                    aria-describedby="basic-addon1" name="created_by" v-if="mostrar_inputs_editar == true" :value="datos_user.created_by"
                                    oninput="createdByAltCheck()" onblur="createdByAltCheck()">
                                
                            </div>
                            <div id="createdByErrorDiv" style="display: none" class="alert alert-warning alert-dismissible alert-outline shadow fade show" role="alert">
                                <strong id="createdByError"></strong>
                            </div>
                            <div id="createdByAltErrorDiv" style="display: none" class="alert alert-warning alert-dismissible alert-outline shadow fade show" role="alert">
                                <strong id="createdByAltError"></strong>
                            </div>
                            <!-- Rol -->
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Rol</span>
                                <!-- Input al crear -->
                                <input id="role" type="text" class="form-control" placeholder="Rol" aria-label="Username" 
                                    aria-describedby="basic-addon1" name="role" v-if="mostrar_inputs_añadir == true"
                                    oninput="roleCheck()" onblur="roleCheck()">
                                <!-- Input al editar -->
                                <input id="roleAlt" type="text" class="form-control" placeholder="Rol" aria-label="Username" 
                                    aria-describedby="basic-addon1" name="role" v-if="mostrar_inputs_editar == true" :value="datos_user.role"
                                    oninput="roleAltCheck()" onblur="roleAltCheck()">
                            </div>
                            <div id="roleErrorDiv" style="display: none" class="alert alert-warning alert-dismissible alert-outline shadow fade show" role="alert">
                                <strong id="roleError"></strong>
                            </div>
                            <div id="roleAltErrorDiv" style="display: none" class="alert alert-warning alert-dismissible alert-outline shadow fade show" role="alert">
                                <strong id="roleAltError"></strong>
                            </div>
                            <!-- Password -->
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Contraseña</span>
                                <!-- Input para crear y editar -->
                                <input id="password" type="password" class="form-control" placeholder="******" aria-label="Username" 
                                    aria-describedby="basic-addon1" name="password" oninput="passwordCheck()" onblur="passwordCheck()">
                            </div>
                            <div id="passwordErrorDiv" style="display: none" class="alert alert-warning alert-dismissible alert-outline shadow fade show" role="alert">
                                <strong id="passwordError"></strong>
                            </div>
                            <div class="input-group mb-3" v-if="mostrar_añadir_foto == true">
                                <input type="file" class="form-control" name="profile_photo_file" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" id="submitButton" class="btn btn-success">Guardar {{btn_guardar_cambios}}</button>
                                <div id="submitErrorDiv" style="display: none" class="alert alert-danger alert-dismissible alert-outline shadow fade show" role="alert">
                                    <strong id="submitError"></strong>
                                </div>
                                <input type="hidden" name="action" :action="accion" :value="accion">
                                <input type="hidden" name="global_token" value="<?= $_SESSION['global_token'] ?>">
                                <input type="hidden" name="id" :value="datos_user.id">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal editar foto -->
        <div class="modal fade" id="editPhotoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar foto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" method="POST" action="<?= BASE_PATH ?>Controlador-usuarios" >
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="profile_photo_file" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success">Guardar</button>
                                <input type="hidden" name="action" action="editarFotoPerfil" value="editarFotoPerfil">
                                <input type="hidden" name="id" :value="id_user.id">
                                <input type="hidden" name="global_token" value="<?= $_SESSION['global_token'] ?>">
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
    <!--Imports e Includes-->
    <?php include '../layouts/scripts.template.php' ?>
    <!-- swiper js -->
    <script src="assets/libs/swiper/swiper-bundle.min.js"></script>
    <!-- profile init js -->
    <script src="assets/js/pages/profile.init.js"></script>
    <!-- Vue js -->
    <script src="https://unpkg.com/vue@3"></script>
    <!--SweetAlert-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--JAVASCRIPT Validaciones REGEX-->
    <script type="text/javascript">
        // Nombre, Apellido, Correo, Telefono, Creado por, Rol, Password (en ambos)
        //Validaciones en Crear
        //Verificar Nombre
        function nameCheck(){
            var submitErrorDiv = document.getElementById('submitErrorDiv');
            var nameErrorDiv = document.getElementById('nameErrorDiv');
            var nameError = document.getElementById('nameError');
            var name = document.getElementById('name').value;
            var nameRegex = /^[a-zA-Z ]{3,}$/;
            var correctName = nameRegex.test(name);
            if(name == null || name == ""){
                showNameError(nameErrorDiv, nameError, "El nombre es necesario");
                return false;
            }if(name.length <3){
                showNameError(nameErrorDiv, nameError, "El nombre debe tener 3 o mas caracteres");
                return false;
            }else if(!correctName){
                showNameError(nameErrorDiv, nameError, "El nombre solo puede contener caracteres alfabeticos");
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
        function lastnameCheck(){
            var submitErrorDiv = document.getElementById('submitErrorDiv');
            var lastnameErrorDiv = document.getElementById('lastnameErrorDiv');
            var lastnameError = document.getElementById('lastnameError');
            var lastname = document.getElementById('lastname').value;
            var lastnameRegex = /^[a-zA-Z ]{3,}$/;
            var correctLastname = lastnameRegex.test(lastname);
            if(lastname == null || lastname == ""){
                showLastnameError(lastnameErrorDiv, lastnameError, "El apellido es necesario");
                return false;
            }if(lastname.length <3){
                showLastnameError(lastnameErrorDiv, lastnameError, "El apellido debe tener 3 o mas caracteres");
                return false;
            }else if(!correctLastname){
                showLastnameError(lastnameErrorDiv, lastnameError, "El apellido solo puede contener caracteres alfabeticos");
                return false;
            }
            hideLastnameError(lastnameErrorDiv);
            hideSubmitError(submitErrorDiv);
            return true;
        }
        function showLastnameError(lastnameErrorDiv, lastnameError, message){
            lastnameErrorDiv.style.display = 'block';
            lastnameError.innerHTML = message;
        }
        function hideLastnameError(lastnameErrorDiv){
            lastnameErrorDiv.style.display = 'none';
        }
        function emailCheck(){
            var submitErrorDiv = document.getElementById('submitErrorDiv');
            var emailErrorDiv = document.getElementById('emailErrorDiv');
            var emailError = document.getElementById('emailError');
            var email = document.getElementById('email').value;
            var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var correctEmail = emailRegex.test(email);
            if(email == null || email == ""){
                showEmailError(emailErrorDiv, emailError, "El correo es necesario");
                return false;
            }else if(!correctEmail){
                showEmailError(emailErrorDiv, emailError, "El correo es invalido");
                return false;
            }
            hideEmailError(emailErrorDiv);
            hideSubmitError(submitErrorDiv);
            return true;
        }
        function showEmailError(emailErrorDiv, emailError, message){
            emailErrorDiv.style.display = 'block';
            emailError.innerHTML = message;
        }
        function hideEmailError(emailErrorDiv){
            emailErrorDiv.style.display = 'none';
        }
        function phoneNumberCheck(){
            var submitErrorDiv = document.getElementById('submitErrorDiv');
            var phoneNumberErrorDiv = document.getElementById('phoneNumberErrorDiv');
            var phoneNumberError = document.getElementById('phoneNumberError');
            var phoneNumber = document.getElementById('phone_number').value;
            var phoneNumberRegex = /^[0-9]{10}$/;
            var correctPhoneNumber = phoneNumberRegex.test(phoneNumber);
            if(phoneNumber == null || phoneNumber == ""){
                showPhoneNumberError(phoneNumberErrorDiv, phoneNumberError, "El numero telefonico es necesario");
                return false;
            }if(phoneNumber.length != 10){
                showPhoneNumberError(phoneNumberErrorDiv, phoneNumberError, "El numero telefonico debe tener 10 digitos");
                return false;
            }else if(!correctPhoneNumber){
                showPhoneNumberError(phoneNumberErrorDiv, phoneNumberError, "El nombre solo puede contener caracteres numericos");
                return false;
            }
            hidePhoneNumberError(phoneNumberErrorDiv);
            hideSubmitError(submitErrorDiv);
            return true;
        }
        function showPhoneNumberError(phoneNumberErrorDiv, phoneNumberError, message){
            phoneNumberErrorDiv.style.display = 'block';
            phoneNumberError.innerHTML = message;
        }
        function hidePhoneNumberError(phoneNumberErrorDiv){
            phoneNumberErrorDiv.style.display = 'none';
        }
        function createdByCheck(){
            var submitErrorDiv = document.getElementById('submitErrorDiv');
            var createdByErrorDiv = document.getElementById('createdByErrorDiv');
            var createdByError = document.getElementById('createdByError');
            var createdBy = document.getElementById('created_by').value;
            var createdByRegex = /^[a-zA-Z ]{3,}$/;
            var correctCreatedBy = createdByRegex.test(createdBy);
            if(createdBy == null || createdBy == ""){
                showCreatedByError(createdByErrorDiv, createdByError, "El creado por es necesario");
                return false;
            }if(createdBy.length <3){
                showCreatedByError(createdByErrorDiv, createdByError, "El creado por debe tener 3 o mas caracteres");
                return false;
            }else if(!correctCreatedBy){
                showCreatedByError(createdByErrorDiv, createdByError, "El creado por debe contener caracteres alfabeticos");
                return false;
            }
            hideCreatedByError(createdByErrorDiv);
            hideSubmitError(submitErrorDiv);
            return true;
        }
        function showCreatedByError(createdByErrorDiv, createdByError, message){
            createdByErrorDiv.style.display = 'block';
            createdByError.innerHTML = message;
        }
        function hideCreatedByError(createdByErrorDiv){
            createdByErrorDiv.style.display = 'none';
        }
        function roleCheck(){
            var submitErrorDiv = document.getElementById('submitErrorDiv');
            var roleErrorDiv = document.getElementById('roleErrorDiv');
            var roleError = document.getElementById('roleError');
            var role = document.getElementById('role').value;
            var roleRegex = /^[a-zA-Z ]{5,}$/;
            var correctRole = roleRegex.test(role);
            if(role == null || role == ""){
                showRoleError(roleErrorDiv, roleError, "El rol es necesario");
                return false;
            }if(role.length <5){
                showRoleError(roleErrorDiv, roleError, "El rol debe tener 5 o mas caracteres");
                return false;
            }else if(!correctRole){
                showRoleError(roleErrorDiv, roleError, "El rol solo puede contener caracteres alfabeticos");
                return false;
            }
            hideRoleError(roleErrorDiv);
            hideSubmitError(submitErrorDiv);
            return true;
        }
        function showRoleError(roleErrorDiv, roleError, message){
            roleErrorDiv.style.display = 'block';
            roleError.innerHTML = message;
        }
        function hideRoleError(roleErrorDiv){
            roleErrorDiv.style.display = 'none';
        }
        function passwordCheck(){
            var submitErrorDiv = document.getElementById('submitErrorDiv');
            var passwordErrorDiv = document.getElementById('passwordErrorDiv');
            var passwordError = document.getElementById('passwordError');
            var password = document.getElementById('password').value;
            var passwordRegex = /^[a-zA-Z0-9!@#$%^&*]{8,}$/;
            var correctPassword = passwordRegex.test(password);
            if(password == null || password == ""){
                showPasswordError(passwordErrorDiv, passwordError, "La contraseña es necesaria");
                return false;
            }if(password.length <8){
                showPasswordError(passwordErrorDiv, passwordError, "La contraseña debe tener 8 o mas caracteres");
                return false;
            }else if(!correctPassword){
                showPasswordError(passwordErrorDiv, passwordError, "La contraseña solo puede tener caracteres alfanumericos y especiales: !@#$%&^*");
                return false;
            }
            hidePasswordError(passwordErrorDiv);
            hideSubmitError(submitErrorDiv);
            return true;
        }
        function showPasswordError(passwordErrorDiv, passwordError, message){
            passwordErrorDiv.style.display = 'block';
            passwordError.innerHTML = message;
        }
        function hidePasswordError(passwordErrorDiv){
            passwordErrorDiv.style.display = 'none';
        }
        //Validaciones en Editar (Alt)
        //Verificar Nombre
        function nameAltCheck(){
            var submitErrorDiv = document.getElementById('submitErrorDiv');
            var nameAltErrorDiv = document.getElementById('nameAltErrorDiv');
            var nameAltError = document.getElementById('nameAltError');
            var nameAlt = document.getElementById('nameAlt').value;
            var nameAltRegex = /^[a-zA-Z ]{3,}$/;
            var correctNameAlt = nameAltRegex.test(nameAlt);
            if(nameAlt == null || nameAlt == ""){
                showNameAltError(nameAltErrorDiv, nameAltError, "El nombre es necesario");
                return false;
            }if(nameAlt.length <3){
                showNameAltError(nameAltErrorDiv, nameAltError, "El nombre debe tener 3 o mas caracteres");
                return false;
            }else if(!correctNameAlt){
                showNameAltError(nameAltErrorDiv, nameAltError, "El nombre solo puede contener caracteres alfabeticos");
                return false;
            }
            hideNameAltError(nameAltErrorDiv);
            hideSubmitError(submitErrorDiv);
            return true;
        }
        function showNameAltError(nameAltErrorDiv, nameAltError, message){
            nameAltErrorDiv.style.display = 'block';
            nameAltError.innerHTML = message;
        }
        function hideNameAltError(nameAltErrorDiv){
            nameAltErrorDiv.style.display = 'none';
        }
        function lastnameAltCheck(){
            var submitErrorDiv = document.getElementById('submitErrorDiv');
            var lastnameAltErrorDiv = document.getElementById('lastnameAltErrorDiv');
            var lastnameAltError = document.getElementById('lastnameAltError');
            var lastnameAlt = document.getElementById('lastnameAlt').value;
            var lastnameAltRegex = /^[a-zA-Z ]{3,}$/;
            var correctLastnameAlt = lastnameAltRegex.test(lastnameAlt);
            if(lastnameAlt == null || lastnameAlt == ""){
                showNameAltError(lastnameAltErrorDiv, lastnameAltError, "El apellido es necesario");
                return false;
            }if(lastnameAlt.length <3){
                showNameAltError(lastnameAltErrorDiv, lastnameAltError, "El apellido debe tener 3 o mas caracteres");
                return false;
            }else if(!correctLastnameAlt){
                showNameAltError(lastnameAltErrorDiv, lastnameAltError, "El apellido solo puede contener caracteres alfabeticos");
                return false;
            }
            hideLastnameAltError(lastnameAltErrorDiv);
            hideSubmitError(submitErrorDiv);
            return true;
        }
        function showLastnameAltError(lastnameErrorAltDiv, lastnameAltError, message){
            lastnameAltErrorDiv.style.display = 'block';
            lastnameAltError.innerHTML = message;
        }
        function hideLastnameAltError(lastnameAltErrorDiv){
            lastnameAltErrorDiv.style.display = 'none';
        }
        function emailAltCheck(){
            var submitErrorDiv = document.getElementById('submitErrorDiv');
            var emailAltErrorDiv = document.getElementById('emailAltErrorDiv');
            var emailAltError = document.getElementById('emailAltError');
            var emailAlt = document.getElementById('emailAlt').value;
            var emailAltRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var correctEmailAlt = emailAltRegex.test(emailAlt);
            if(emailAlt == null || emailAlt == ""){
                showEmailError(emailAltErrorDiv, emailAltError, "El correo es necesario");
                return false;
            }else if(!correctEmailAlt){
                showEmailError(emailAltErrorDiv, emailAltError, "El correo es invalido");
                return false;
            }
            hideEmailAltError(emailAltErrorDiv);
            hideSubmitError(submitErrorDiv);
            return true;
        }
        function showEmailAltError(emailAltErrorDiv, emailAltError, message){
            emailAltErrorDiv.style.display = 'block';
            emailAltError.innerHTML = message;
        }
        function hideEmailAltError(emailAltErrorDiv){
            emailAltErrorDiv.style.display = 'none';
        }
        function phoneNumberAltCheck(){
            var submitErrorDiv = document.getElementById('submitErrorDiv');
            var phoneNumberAltErrorDiv = document.getElementById('phoneNumberAltErrorDiv');
            var phoneNumberAltError = document.getElementById('phoneNumberAltError');
            var phoneNumberAlt = document.getElementById('phone_numberAlt').value;
            var phoneNumberAltRegex = /^[0-9]{10}$/;
            var correctPhoneNumberAlt = phoneNumberAltRegex.test(phoneNumberAlt);
            if(phoneNumberAlt == null || phoneNumberAlt == ""){
                showPhoneNumberAltError(phoneNumberErrorDiv, phoneNumberAltError, "El numero telefonico es necesario");
                return false;
            }if(phoneNumberAlt.length != 10){
                showPhoneNumberAltError(phoneNumberAltErrorDiv, phoneNumberAltError, "El numero telefonico debe tener 10 digitos");
                return false;
            }else if(!correctPhoneNumberAlt){
                showPhoneNumberAltError(phoneNumberAltErrorDiv, phoneNumberAltError, "El nombre solo puede contener caracteres numericos");
                return false;
            }
            hidePhoneNumberAltError(phoneNumberAltErrorDiv);
            hideSubmitError(submitErrorDiv);
            return true;
        }
        function showPhoneNumberAltError(phoneNumberAltErrorDiv, phoneNumberAltError, message){
            phoneNumberAltErrorDiv.style.display = 'block';
            phoneNumberAltError.innerHTML = message;
        }
        function hidePhoneNumberAltError(phoneNumberAltErrorDiv){
            phoneNumberAltErrorDiv.style.display = 'none';
        }
        function createdByAltCheck(){
            var submitErrorDiv = document.getElementById('submitErrorDiv');
            var createdByAltErrorDiv = document.getElementById('createdByAltErrorDiv');
            var createdByAltError = document.getElementById('createdByAltError');
            var createdByAlt = document.getElementById('created_byAlt').value;
            var createdByAltRegex = /^[a-zA-Z ]{3,}$/;
            var correctCreatedByAlt = createdByAltRegex.test(createdByAlt);
            if(createdByAlt == null || createdByAlt == ""){
                showCreatedByAltError(createdByAltErrorDiv, createdByAltError, "El creado por es necesario");
                return false;
            }if(createdByAlt.length <3){
                showCreatedByAltError(createdByAltErrorDiv, createdByAltError, "El creado por debe tener 3 o mas caracteres");
                return false;
            }else if(!correctCreatedByAlt){
                showCreatedByAltError(createdByAltErrorDiv, createdByAltError, "El creado por debe contener caracteres alfabeticos");
                return false;
            }
            hideCreatedByAltError(createdByAltErrorDiv);
            hideSubmitError(submitErrorDiv);
            return true;
        }
        function showCreatedByAltError(createdByAltErrorDiv, createdByAltError, message){
            createdByAltErrorDiv.style.display = 'block';
            createdByAltError.innerHTML = message;
        }
        function hideCreatedByAltError(createdByAltErrorDiv){
            createdByAltErrorDiv.style.display = 'none';
        }
        function roleAltCheck(){
            var submitErrorDiv = document.getElementById('submitErrorDiv');
            var roleAltErrorDiv = document.getElementById('roleAltErrorDiv');
            var roleAltError = document.getElementById('roleAltError');
            var roleAlt = document.getElementById('roleAlt').value;
            var roleAltRegex = /^[a-zA-Z ]{5,}$/;
            var correctRoleAlt = roleAltRegex.test(roleAlt);
            if(roleAlt == null || roleAlt == ""){
                showRoleAltError(roleAltErrorDiv, roleAltError, "El rol es necesario");
                return false;
            }if(roleAlt.length <5){
                showRoleAltError(roleAltErrorDiv, roleAltError, "El rol debe tener 5 o mas caracteres");
                return false;
            }else if(!correctRoleAlt){
                showRoleError(roleAltErrorDiv, roleAltError, "El rol solo puede contener caracteres alfabeticos");
                return false;
            }
            hideRoleError(roleAltErrorDiv);
            hideSubmitError(submitErrorDiv);
            return true;
        }
        function showRoleAltError(roleAltErrorDiv, roleAltError, message){
            roleAltErrorDiv.style.display = 'block';
            roleAltError.innerHTML = message;
        }
        function hideRoleAltError(roleAltErrorDiv){
            roleAltErrorDiv.style.display = 'none';
        }
        //Verificar si todo lo introducido esta correcto o no con el submit button
        function validateSubmit(){
            var submitType = document.getElementById('submitButton').innerText;
            if(submitType == "Guardar"){
                var submitErrorDiv = document.getElementById('submitErrorDiv');
                var nameErrorDiv = document.getElementById('nameErrorDiv');
                var nameError = document.getElementById('nameError');
                var name = document.getElementById('name').value;
                var nameRegex = /^[a-zA-Z ]{3,}$/;
                var lastnameErrorDiv = document.getElementById('lastnameErrorDiv');
                var lastnameError = document.getElementById('lastnameError');
                var lastname = document.getElementById('lastname').value;
                var lastnameRegex = /^[a-zA-Z ]{3,}$/;
                var emailErrorDiv = document.getElementById('emailErrorDiv');
                var emailError = document.getElementById('emailError');
                var email = document.getElementById('email').value;
                var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                var phoneNumberErrorDiv = document.getElementById('phoneNumberErrorDiv');
                var phoneNumberError = document.getElementById('phoneNumberError');
                var phoneNumber = document.getElementById('phone_number').value;
                var phoneNumberRegex = /^[0-9]{10}$/;
                var createdByErrorDiv = document.getElementById('createdByErrorDiv');
                var createdByError = document.getElementById('createdByError');
                var createdBy = document.getElementById('created_by').value;
                var createdByRegex = /^[a-zA-Z ]{3,}$/;
                var roleErrorDiv = document.getElementById('roleErrorDiv');
                var roleError = document.getElementById('roleError');
                var role = document.getElementById('role').value;
                var roleRegex = /^[a-zA-Z ]{5,}$/;
                var passwordErrorDiv = document.getElementById('passwordErrorDiv');
                var passwordError = document.getElementById('passwordError');
                var password = document.getElementById('password').value;
                var passwordRegex = /^[a-zA-Z0-9!@#$%^&*]{8,}$/;
                var correctName = nameRegex.test(name);
                var correctLastname = lastnameRegex.test(lastname);
                var correctEmail = emailRegex.test(email);
                var correctPhoneNumber = phoneNumberRegex.test(phoneNumber);
                var correctCreatedBy = createdByRegex.test(createdBy);
                var correctRole = roleRegex.test(role);
                var correctPassword = passwordRegex.test(password);
                if(!correctName){
                    showNameError(nameErrorDiv, nameError, "El nombre es invalido");
                }
                if(!correctLastname){
                    showLastnameError(lastnameErrorDiv, lastnameError, "El apellido es invalido");
                }
                if(!correctEmail){
                    showEmailError(emailErrorDiv, emailError, "El correo es invalido");
                }
                if(!correctPhoneNumber){
                    showPhoneNumberError(phoneNumberErrorDiv, phoneNumberError, "El telefono es invalido");
                }
                if(!correctCreatedBy){
                    showCreatedByError(createdByErrorDiv, createdByError, "El creado por es invalido");
                }
                if(!correctRole){
                    showRoleError(roleErrorDiv, roleError, "El rol es invalido");
                }
                if(!correctPassword){
                    showPasswordError(passwordErrorDiv, passwordError, "La contraseña es invalida");
                }
                if(!correctEmail || !correctPassword || !correctName || !correctLastname || !correctPhoneNumber || !correctCreatedBy || !correctRole || !correctPassword){
                    showSubmitError(submitErrorDiv, submitError, "Hay datos incorrectos");
                    return false;
                }
                hideSubmitError(submitErrorDiv);
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Registro Guardado',
                    showConfirmButton: false,
                    timer: 10000
                })
                return true;
            }else{
                var submitErrorDiv = document.getElementById('submitErrorDiv');
                var nameAltErrorDiv = document.getElementById('nameAltErrorDiv');
                var nameAltError = document.getElementById('nameAltError');
                var nameAlt = document.getElementById('nameAlt').value;
                var nameAltRegex = /^[a-zA-Z ]{3,}$/;
                var lastnameAltErrorDiv = document.getElementById('lastnameAltErrorDiv');
                var lastnameAltError = document.getElementById('lastnameAltError');
                var lastnameAlt = document.getElementById('lastnameAlt').value;
                var lastnameAltRegex = /^[a-zA-Z ]{3,}$/;
                var emailAltErrorDiv = document.getElementById('emailAltErrorDiv');
                var emailAltError = document.getElementById('emailAltError');
                var emailAlt = document.getElementById('emailAlt').value;
                var emailAltRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                var phoneNumberAltErrorDiv = document.getElementById('phoneNumberAltErrorDiv');
                var phoneNumberAltError = document.getElementById('phoneNumberAltError');
                var phoneNumberAlt = document.getElementById('phone_numberAlt').value;
                var phoneNumberAltRegex = /^[0-9]{10}$/;
                var createdByAltErrorDiv = document.getElementById('createdByAltErrorDiv');
                var createdByAltError = document.getElementById('createdByAltError');
                var createdByAlt = document.getElementById('created_byAlt').value;
                var createdByAltRegex = /^[a-zA-Z ]{3,}$/;
                var roleAltErrorDiv = document.getElementById('roleAltErrorDiv');
                var roleAltError = document.getElementById('roleAltError');
                var roleAlt = document.getElementById('roleAlt').value;
                var roleAltRegex = /^[a-zA-Z ]{5,}$/;
                var passwordAltErrorDiv = document.getElementById('passwordErrorDiv');
                var passwordAltError = document.getElementById('passwordError');
                var passwordAlt = document.getElementById('password').value;
                var passwordAltRegex = /^[a-zA-Z0-9!@#$%^&*]{8,}$/;
                var correctNameAlt = nameAltRegex.test(nameAlt);
                var correctLastnameAlt = lastnameAltRegex.test(lastnameAlt);
                var correctEmailAlt = emailAltRegex.test(emailAlt);
                var correctPhoneNumberAlt = phoneNumberAltRegex.test(phoneNumberAlt);
                var correctCreatedByAlt = createdByAltRegex.test(createdByAlt);
                var correctRoleAlt = roleAltRegex.test(roleAlt);
                var correctPassword = passwordRegex.test(password);
                if(!correctNameAlt){
                    showNameAltError(nameAltErrorDiv, nameAltError, "El nombre es invalido");
                }
                if(!correctLastnameAlt){
                    showLastnameAltError(lastnameAltErrorDiv, lastnameAltError, "El apellido es invalido");
                }
                if(!correctEmailAlt){
                    showEmailAltError(emailAltErrorDiv, emailAltError, "El correo es invalido");
                }
                if(!correctPhoneNumberAlt){
                    showPhoneNumberAltError(phoneNumberAltErrorDiv, phoneNumberAltError, "El telefono es invalido");
                }
                if(!correctCreatedByAlt){
                    showCreatedByAltError(createdByAltErrorDiv, createdByAltError, "El creado por es invalido");
                }
                if(!correctRoleAlt){
                    showRoleAltError(roleAltErrorDiv, roleAltError, "El rol es invalido");
                }
                if(!correctPassword){
                    showPasswordError(passwordErrorDiv, passwordError, "La contraseña es invalida");
                }
                if(!correctEmailAlt || !correctPasswordAlt || !correctNameAlt || !correctLastnameAlt || !correctPhoneNumberAlt || 
                    !correctCreatedByAlt || !correctRoleAlt || !correctPasswordAlt){
                    showSubmitError(submitErrorDiv, submitError, "Hay datos incorrectos");
                    return false;
                }
                hideSubmitError(submitErrorDiv);
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Cambios Guardados',
                    showConfirmButton: false,
                    timer: 10000
                })
                return true;
            }
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
                    users: <?php echo json_encode($data);?>,
                    datos_user: {id: "",nombre: "", apellido: "", correo: "", numero: "", creado: "", rol: ""},
                    titulo_modal: "",
                    accion: "",
                    mostrar_añadir_foto: true,
                    id_user: {id: ""},
                    mostrar_inputs_editar: true,
                    mostrar_inputs_añadir: true,
                    btn_guardar_cambios: "",
                }
            },
            methods:{
                editUser(user){
                    this.titulo_modal = "Editar usuario";
                    this.datos_user = user;
                    this.accion = "editarUsuario";
                    this.mostrar_añadir_foto = false;
                    this.btn_guardar_cambios = "Cambios";
                    this.mostrar_inputs_editar = true;
                    this.mostrar_inputs_añadir = false;
                },
                agregarUser(){
                    this.titulo_modal = "Agregar usuario";
                    this.accion = "nuevoUsuario";   
                    this.mostrar_añadir_foto = true;
                    this.btn_guardar_cambios = "";
                    this.mostrar_inputs_editar = false;
                    this.mostrar_inputs_añadir = true;
                },
                editarFotoUser(user){
                    this.id_user = user;
                },
                alertaEliminar(){
                    Swal.fire({
                    position: 'center',
                    icon: 'info',
                    title: 'Usuario Eliminado',
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