<?php
	include_once "app/config.php";
?> 
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
    <meta charset="utf-8" />
    <title>Iniciar sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= BASE_PATH ?>public/images/logo-sm.png">
    <!-- Layout config Js -->
    <script src="<?= BASE_PATH ?>public/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="<?= BASE_PATH ?>public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= BASE_PATH ?>public/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= BASE_PATH ?>public/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?= BASE_PATH ?>public/css/custom.min.css" rel="stylesheet" type="text/css" />
    <!-- Import Vue
    <script src="https://unpkg.com/vue@3"></script>
    -->
</head>
<body>
    <!--Contenedor id="contenedor"-->
    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>
            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>
        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index.html" class="d-inline-block auth-logo">
                                    <!-- <img src="<?= BASE_PATH ?>public/images/logo-light.png" alt="" height="20"> -->
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-5 rounded">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-dark">Bienvenido</h5>
                                    <p class="text-muted">Inicia sesión para ingresar.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="<?= BASE_PATH ?>auth" method="POST" onsubmit="validateLoginSubmit()">
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Correo electrónico</label>
                                            <input type="text" class="form-control" id="email" placeholder="ejemplo@ejemplo.com" name="email" oninput="emailCheck()" onblur="emailCheck()">
                                            <div id="emailErrorDiv" style="display: none" class="alert alert-warning alert-dismissible alert-outline shadow fade show" role="alert">
                                                <strong id="emailError"></strong>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="password-input">Contraseña</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5 password-input" placeholder="*******" id="password" 
                                                    name="password" oninput="passwordCheck()" onblur="passwordCheck()">
                                                <div id="passwordErrorDiv" style="display: none" class="alert alert-warning alert-dismissible alert-outline shadow fade show" role="alert">
                                                    <strong id="passwordError"></strong>
                                                </div>
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted shadow-none password-addon" 
                                                        type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="submit" :disabled='isSubmitDisabled'>Iniciar sesión</button>
                                            <input type="hidden" name="action" action="access" value="access">
                                            <input type="hidden" name="global_token" value="<?= $_SESSION['global_token'] ?>">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>document.write(new Date().getFullYear())</script> Examen Unidad 4 UABCS IDS TM
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script type="text/javascript">
        //Funciones para el checkeo de email
        function emailCheck(){
            var emailErrorDiv = document.getElementById('emailErrorDiv');
            var emailError = document.getElementById('emailError');
            var email = document.getElementById('email').value;
            var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var correctEmail = emailRegex.test(email);
            if(email == null || email == ""){
                showEmailError(emailErrorDiv, emailError, "El correo es necesario");
                return false;
            }else if(!correctEmail){
                showEmailError(emailErrorDiv, emailError, "El correo no es valido");
                return false;
            }
            hideEmailError(emailErrorDiv);
            return true;
        }
        function showEmailError(emailErrorDiv, emailError, message){
            emailErrorDiv.style.display = 'block';
            emailError.innerHTML = message;
        }
        function hideEmailError(emailErrorDiv){
            emailErrorDiv.style.display = 'none';
        }
        //Funciones para el checkeo de password
        function passwordCheck(){
            var passwordErrorDiv = document.getElementById('passwordErrorDiv');
            var passwordError = document.getElementById('passwordError');
            var password = document.getElementById('password').value;
            var passwordRegex = /^[a-zA-Z0-9!@#$%^&*]{14}$/;
            var correctPassword = passwordRegex.test(password);
            if(password == null || password == ""){
                showPasswordError(passwordErrorDiv, passwordError, "La contraseña es necesaria");
                return false;
            }else if(!correctPassword){
                showPasswordError(passwordErrorDiv, passwordError, "La contraseña puede contener solo 14 caracteres alfanumericos y especiales: !@#$%&^*");
                return false;
            }
            hidePasswordError(passwordErrorDiv);
            return true;
        }
        function showPasswordError(passwordErrorDiv, passwordError, message){
            passwordErrorDiv.style.display = 'block';
            passwordError.innerHTML = message;
        }
        function hidePasswordError(passwordErrorDiv){
            passwordErrorDiv.style.display = 'none';
        }
        //Verificar si todo lo introducido esta correcto o no con el submit button
        function validateLoginSubmit(){
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var passwordRegex = /^[a-zA-Z0-9!@#$%^&*]{14}$/;
            var correctEmail = emailRegex.test(email);
            var correctPassword = passwordRegex.test(password);
            if(!correctEmail || !correctPassword){
                alert('Los datos introducidos son invalidos');
                return false;
            }
            return true;
        }
    </script>
    <script src="<?= BASE_PATH ?>public/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/node-waves/waves.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/feather-icons/feather.min.js"></script>
    <script src="<?= BASE_PATH ?>public/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?= BASE_PATH ?>public/js/plugins.js"></script>

    <!-- particles js -->
    <script src="<?= BASE_PATH ?>public/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script src="<?= BASE_PATH ?>public/js/pages/particles.app.js"></script>
    <!-- password-addon init -->
    <script src="<?= BASE_PATH ?>public/js/pages/password-addon.init.js"></script>
</body>
</html>